<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enums\SlotStatus;
use App\Models\Consultant;
use App\Models\ScheduleSlot;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ScheduleSlot>
 */
class ScheduleSlotFactory extends Factory
{
    protected $model = ScheduleSlot::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startsAt = now()->addDays(2)->setTime(9, 0);

        return [
            'consultant_id' => Consultant::factory(),
            'starts_at' => $startsAt,
            'ends_at' => $startsAt->copy()->addMinutes(45),
            'status' => SlotStatus::Available,
        ];
    }
}
