<?php

declare(strict_types=1);

namespace App\Actions\Booking;

use App\Enums\BookingStatus;
use App\Enums\SlotStatus;
use App\Jobs\SendBookingConfirmationJob;
use App\Jobs\SyncBookingToCalendarJob;
use App\Models\Booking;
use App\Models\ScheduleSlot;
use App\Models\Service;
use App\Models\User;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use RuntimeException;

class CreateBookingAction
{
    /**
     * Create a booking inside a transaction with pessimistic locking on the
     * slot to prevent double-booking race conditions.
     *
     * @param  array<string, mixed>  $data
     */
    public function handle(array $data): Booking
    {
        $slotId = (int) $data['schedule_slot_id'];

        $booking = DB::transaction(function () use ($data, $slotId) {
            /** @var ScheduleSlot|null $slot */
            $slot = ScheduleSlot::query()
                ->whereKey($slotId)
                ->lockForUpdate()
                ->first();

            if ($slot === null) {
                throw new RuntimeException('Slot tidak ditemukan.');
            }

            if ($slot->status !== SlotStatus::Available) {
                throw new RuntimeException('Slot yang dipilih sudah tidak tersedia.');
            }

            if ($slot->starts_at->isPast()) {
                throw new RuntimeException('Slot yang dipilih sudah lewat.');
            }

            $service = isset($data['service_id'])
                ? Service::query()->whereKey($data['service_id'])->where('is_active', true)->first()
                : null;

            $booking = Booking::query()->create([
                'booking_number' => $this->generateBookingNumber(),
                'consultant_id' => $slot->consultant_id,
                'service_id' => $service?->id,
                'client_name' => $data['client_name'],
                'client_email' => $data['client_email'],
                'client_phone' => $data['client_phone'],
                'company_name' => $data['company_name'] ?? null,
                'company_npwp' => $data['company_npwp'] ?? null,
                'financial_issue_description' => $data['financial_issue_description'] ?? null,
                'status' => BookingStatus::Pending,
                'source' => $data['source'] ?? 'web',
                'ip_address' => request()->ip(),
                'starts_at' => $slot->starts_at,
                'ends_at' => $slot->ends_at,
            ]);

            $slot->forceFill([
                'status' => SlotStatus::Booked,
                'booking_id' => $booking->id,
            ])->save();

            return $booking;
        });

        $booking->load('consultant', 'service');

        SendBookingConfirmationJob::dispatch($booking);
        SyncBookingToCalendarJob::dispatch($booking);

        $this->notifyAdmins($booking);

        return $booking;
    }

    private function notifyAdmins(Booking $booking): void
    {
        $admins = User::query()
            ->whereHas('roles', fn ($query) => $query->whereIn('name', ['super_admin', 'admin']))
            ->get();

        if ($admins->isEmpty()) {
            return;
        }

        Notification::make()
            ->title('Reservasi Baru')
            ->body('Booking '.$booking->booking_number.' dari '.$booking->client_name.' ('.$booking->consultant?->name.'), '.$booking->starts_at->format('d M Y H:i').'.')
            ->actions([
                Action::make('view')
                    ->url(route('filament.admin.resources.bookings.edit', $booking)),
            ])
            ->sendToDatabase($admins, isEventDispatched: true);
    }

    public function generateBookingNumber(): string
    {
        return 'BK-'.now()->format('Ymd').'-'.Str::upper(Str::random(6));
    }
}
