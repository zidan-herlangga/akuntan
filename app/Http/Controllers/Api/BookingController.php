<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Actions\Booking\CreateBookingAction;
use App\Actions\Booking\GetAvailableSlotsAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookingRequest;
use App\Models\Booking;
use App\Models\Consultant;
use App\Models\ScheduleSlot;
use App\Models\Service;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Validation\ValidationException;
use RuntimeException;

class BookingController extends Controller
{
    public function consultants(): JsonResponse
    {
        $consultants = Consultant::query()
            ->where('is_active', true)
            ->orderBy('name')
            ->get(['id', 'name', 'specialization', 'bio']);

        return response()->json(['data' => $consultants]);
    }

    public function services(): JsonResponse
    {
        $services = Service::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get(['id', 'title', 'summary', 'icon']);

        return response()->json(['data' => $services]);
    }

    public function availability(string $consultant): JsonResponse
    {
        $consultant = Consultant::query()
            ->where('is_active', true)
            ->findOrFail($consultant);

        $days = $consultant->scheduleSlots()
            ->where('status', 'available')
            ->where('starts_at', '>', now())
            ->whereBetween('starts_at', [now()->startOfDay(), now()->addDays(13)->endOfDay()])
            ->get(['starts_at'])
            ->groupBy(fn (ScheduleSlot $slot) => $slot->starts_at->format('Y-m-d'))
            ->map(fn (Collection $group, string $date) => [
                'date' => $date,
                'count' => $group->count(),
            ])
            ->values();

        return response()->json(['data' => $days]);
    }

    public function slots(GetAvailableSlotsAction $action, string $consultant, string $date): JsonResponse
    {
        $consultant = Consultant::query()
            ->where('is_active', true)
            ->findOrFail($consultant);

        try {
            $day = Carbon::parse($date);
        } catch (\Throwable) {
            throw ValidationException::withMessages(['date' => 'Format tanggal tidak valid.']);
        }

        $slots = $action->handle($consultant, $day);

        return response()->json([
            'data' => $slots->map(fn ($slot) => [
                'id' => $slot->id,
                'starts_at' => $slot->starts_at->toIso8601String(),
                'ends_at' => $slot->ends_at->toIso8601String(),
            ]),
        ]);
    }

    public function store(StoreBookingRequest $request, CreateBookingAction $action): JsonResponse
    {
        try {
            $booking = $action->handle($request->validated());
        } catch (RuntimeException $e) {
            throw ValidationException::withMessages([
                'schedule_slot_id' => $e->getMessage(),
            ]);
        }

        return response()->json([
            'message' => 'Reservasi berhasil dibuat.',
            'data' => [
                'booking_number' => $booking->booking_number,
                'consultant' => $booking->consultant?->name,
                'service' => $booking->service?->title,
                'starts_at' => $booking->starts_at->toIso8601String(),
                'ends_at' => $booking->ends_at->toIso8601String(),
            ],
        ], 201);
    }
}
