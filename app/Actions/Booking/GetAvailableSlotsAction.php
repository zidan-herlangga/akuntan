<?php

declare(strict_types=1);

namespace App\Actions\Booking;

use App\Models\Consultant;
use App\Models\ScheduleSlot;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

class GetAvailableSlotsAction
{
    /**
     * List available slots for a consultant on a given date.
     *
     * @return Collection<int, ScheduleSlot>
     */
    public function handle(Consultant $consultant, Carbon $date): Collection
    {
        $dayStart = $date->copy()->startOfDay();
        $dayEnd = $date->copy()->endOfDay();

        return $consultant->scheduleSlots()
            ->with('consultant:id,name')
            ->whereBetween('starts_at', [$dayStart, $dayEnd])
            ->where('status', 'available')
            ->where('starts_at', '>', now())
            ->orderBy('starts_at')
            ->get();
    }
}
