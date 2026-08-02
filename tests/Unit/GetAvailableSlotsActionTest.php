<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Actions\Booking\GetAvailableSlotsAction;
use App\Enums\SlotStatus;
use App\Models\Consultant;
use App\Models\ScheduleSlot;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GetAvailableSlotsActionTest extends TestCase
{
    use RefreshDatabase;

    public function test_returns_only_available_future_slots_for_the_given_date(): void
    {
        $consultant = Consultant::factory()->create();

        ScheduleSlot::factory()->create([
            'consultant_id' => $consultant->id,
            'starts_at' => now()->addDays(2)->setTime(9, 0),
            'status' => SlotStatus::Available,
        ]);
        ScheduleSlot::factory()->create([
            'consultant_id' => $consultant->id,
            'starts_at' => now()->addDays(2)->setTime(10, 0),
            'status' => SlotStatus::Booked,
        ]);
        ScheduleSlot::factory()->create([
            'consultant_id' => $consultant->id,
            'starts_at' => now()->addDays(3)->setTime(9, 0),
            'status' => SlotStatus::Available,
        ]);

        $slots = (new GetAvailableSlotsAction)->handle($consultant, now()->addDays(2));

        $this->assertCount(1, $slots);
        $this->assertSame(now()->addDays(2)->setTime(9, 0)->toDateTimeString(), $slots->first()->starts_at->toDateTimeString());
    }

    public function test_past_slots_are_excluded_even_when_available(): void
    {
        $consultant = Consultant::factory()->create();

        ScheduleSlot::factory()->create([
            'consultant_id' => $consultant->id,
            'starts_at' => now()->subDay()->setTime(9, 0),
            'status' => SlotStatus::Available,
        ]);

        $slots = (new GetAvailableSlotsAction)->handle($consultant, now()->subDay());

        $this->assertCount(0, $slots);
    }

    public function test_slots_belonging_to_another_consultant_are_excluded(): void
    {
        $consultant = Consultant::factory()->create();
        $other = Consultant::factory()->create();

        ScheduleSlot::factory()->create([
            'consultant_id' => $other->id,
            'starts_at' => now()->addDays(2)->setTime(9, 0),
            'status' => SlotStatus::Available,
        ]);

        $slots = (new GetAvailableSlotsAction)->handle($consultant, now()->addDays(2));

        $this->assertCount(0, $slots);
    }

    public function test_slots_are_ordered_by_start_time(): void
    {
        $consultant = Consultant::factory()->create();

        ScheduleSlot::factory()->create([
            'consultant_id' => $consultant->id,
            'starts_at' => now()->addDays(2)->setTime(11, 0),
            'status' => SlotStatus::Available,
        ]);
        ScheduleSlot::factory()->create([
            'consultant_id' => $consultant->id,
            'starts_at' => now()->addDays(2)->setTime(9, 0),
            'status' => SlotStatus::Available,
        ]);

        $slots = (new GetAvailableSlotsAction)->handle($consultant, now()->addDays(2));

        $this->assertSame(9, $slots->first()->starts_at->hour);
    }
}
