<?php

declare(strict_types=1);

namespace App\Actions\Booking;

use App\Enums\BookingStatus;
use App\Enums\SlotStatus;
use App\Models\Booking;
use App\Models\ScheduleSlot;
use Illuminate\Support\Facades\DB;

class CancelBookingAction
{
    public function handle(Booking $booking, string $reason = 'Cancelled by client'): Booking
    {
        DB::transaction(function () use ($booking, $reason) {
            $booking->forceFill([
                'status' => BookingStatus::Cancelled,
                'notes' => trim(($booking->notes ?? '')." \n[Cancel] {$reason}"),
            ])->save();

            ScheduleSlot::query()
                ->where('booking_id', $booking->id)
                ->update([
                    'status' => SlotStatus::Available,
                    'booking_id' => null,
                ]);
        });

        return $booking->refresh();
    }
}
