<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Enums\SlotStatus;
use App\Models\Booking;
use App\Models\Consultant;
use App\Models\ScheduleSlot;
use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class BookingApiTest extends TestCase
{
    use RefreshDatabase;

    private function bookingPayload(array $overrides = []): array
    {
        $slot = $overrides['schedule_slot_id'] ?? null;

        return array_merge([
            'schedule_slot_id' => $slot,
            'service_id' => $slot ? null : null,
            'client_name' => 'Budi Santoso',
            'client_email' => 'budi@example.com',
            'client_phone' => '+6281234567890',
            'company_name' => 'PT Maju Bersama',
            'company_npwp' => '012345678901234',
            'financial_issue_description' => 'Perlu pendampingan pelaporan SPT Tahunan.',
            'source' => 'web',
            'turnstile_token' => 'dummy-token',
        ], $overrides);
    }

    public function test_client_can_book_an_available_slot(): void
    {
        $slot = ScheduleSlot::factory()->create(['starts_at' => now()->addDays(2)->setTime(9, 0)]);

        $response = $this->postJson('/api/booking', $this->bookingPayload(['schedule_slot_id' => $slot->id]));

        $response->assertCreated()
            ->assertJsonPath('data.booking_number', fn ($v) => str_starts_with($v, 'BK-'));

        $this->assertDatabaseHas('bookings', ['client_email' => 'budi@example.com']);

        $this->assertDatabaseHas('schedule_slots', [
            'id' => $slot->id,
            'status' => SlotStatus::Booked,
            'booking_id' => $response->json('data.booking_number') ? $slot->refresh()->booking_id : null,
        ]);

        $this->assertSame(1, Booking::count());
    }

    public function test_booking_number_is_unique_across_bookings(): void
    {
        $first = Booking::factory()->create(['booking_number' => 'BK-20260731-ABC123']);

        $booking = Booking::factory()->create();

        $this->assertNotSame($first->booking_number, $booking->booking_number);
        $this->assertMatchesRegularExpression('/^BK-\d{8}-[A-Z0-9]{6}$/', $booking->booking_number);
    }

    public function test_validation_errors_on_missing_required_fields(): void
    {
        $response = $this->postJson('/api/booking', []);

        $response->assertUnprocessable()
            ->assertJsonValidationErrors(['schedule_slot_id', 'client_name', 'client_email', 'client_phone', 'turnstile_token']);
    }

    public function test_invalid_slot_id_is_rejected(): void
    {
        $response = $this->postJson('/api/booking', $this->bookingPayload(['schedule_slot_id' => 999999]));

        $response->assertUnprocessable()
            ->assertJsonValidationErrors(['schedule_slot_id']);
    }

    public function test_slot_cannot_be_booked_twice(): void
    {
        $slot = ScheduleSlot::factory()->create(['starts_at' => now()->addDays(2)->setTime(10, 0)]);

        $this->postJson('/api/booking', $this->bookingPayload(['schedule_slot_id' => $slot->id]))
            ->assertCreated();

        $second = $this->postJson('/api/booking', $this->bookingPayload(['schedule_slot_id' => $slot->id]));

        $second->assertUnprocessable()
            ->assertJsonValidationErrors(['schedule_slot_id'])
            ->assertJsonPath('errors.schedule_slot_id.0', 'Slot yang dipilih sudah tidak tersedia.');

        $this->assertDatabaseCount('bookings', 1);
        $this->assertDatabaseHas('schedule_slots', ['id' => $slot->id, 'status' => SlotStatus::Booked]);
    }

    public function test_past_slot_cannot_be_booked(): void
    {
        $slot = ScheduleSlot::factory()->create(['starts_at' => now()->subDay()->setTime(9, 0)]);

        $this->postJson('/api/booking', $this->bookingPayload(['schedule_slot_id' => $slot->id]))
            ->assertUnprocessable()
            ->assertJsonValidationErrors(['schedule_slot_id']);

        $this->assertDatabaseCount('bookings', 0);
    }

    public function test_sensitive_fields_are_encrypted_at_rest(): void
    {
        $slot = ScheduleSlot::factory()->create(['starts_at' => now()->addDays(2)->setTime(11, 0)]);

        $this->postJson('/api/booking', $this->bookingPayload(['schedule_slot_id' => $slot->id]))
            ->assertCreated();

        $booking = Booking::firstOrFail();

        $this->assertSame('012345678901234', $booking->company_npwp);
        $this->assertSame('Perlu pendampingan pelaporan SPT Tahunan.', $booking->financial_issue_description);

        $raw = DB::table('bookings')->where('id', $booking->id)->value('company_npwp');
        $this->assertNotSame('012345678901234', $raw);
        $this->assertStringStartsWith('eyJpdiI6', $raw);
    }

    public function test_booking_api_is_rate_limited(): void
    {
        $slot = ScheduleSlot::factory()->create(['starts_at' => now()->addDays(2)->setTime(13, 0)]);

        for ($i = 0; $i < 5; $i++) {
            $this->postJson('/api/booking', $this->bookingPayload(['schedule_slot_id' => $slot->id]))
                ->assertStatus($i === 0 ? 201 : 422);
        }

        $this->postJson('/api/booking', $this->bookingPayload(['schedule_slot_id' => $slot->id]))
            ->assertStatus(429);
    }

    public function test_consultants_endpoint_only_returns_active_consultants(): void
    {
        Consultant::factory()->create(['is_active' => true]);
        Consultant::factory()->create(['is_active' => false]);

        $this->getJson('/api/booking/consultants')
            ->assertOk()
            ->assertJsonCount(1, 'data');
    }

    public function test_services_endpoint_only_returns_active_services(): void
    {
        Service::factory()->create(['is_active' => true, 'sort_order' => 2]);
        Service::factory()->create(['is_active' => false, 'sort_order' => 1]);

        $this->getJson('/api/booking/services')
            ->assertOk()
            ->assertJsonCount(1, 'data')
            ->assertJsonPath('data.0.title', fn ($value) => is_string($value));
    }

    public function test_slots_endpoint_returns_available_future_slots_only(): void
    {
        $consultant = Consultant::factory()->create(['is_active' => true]);

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

        $date = now()->addDays(2)->format('Y-m-d');

        $this->getJson("/api/booking/slots/{$consultant->id}/{$date}")
            ->assertOk()
            ->assertJsonCount(1, 'data');
    }

    public function test_availability_endpoint_groups_future_available_slots_by_date(): void
    {
        $consultant = Consultant::factory()->create(['is_active' => true]);

        ScheduleSlot::factory()->create([
            'consultant_id' => $consultant->id,
            'starts_at' => now()->addDays(2)->setTime(9, 0),
            'status' => SlotStatus::Available,
        ]);
        ScheduleSlot::factory()->create([
            'consultant_id' => $consultant->id,
            'starts_at' => now()->addDays(3)->setTime(10, 0),
            'status' => SlotStatus::Available,
        ]);
        ScheduleSlot::factory()->create([
            'consultant_id' => $consultant->id,
            'starts_at' => now()->addDays(3)->setTime(11, 0),
            'status' => SlotStatus::Booked,
        ]);
        ScheduleSlot::factory()->create([
            'consultant_id' => $consultant->id,
            'starts_at' => now()->subDay()->setTime(9, 0),
            'status' => SlotStatus::Available,
        ]);

        $response = $this->getJson("/api/booking/availability/{$consultant->id}");

        $response->assertOk()
            ->assertJsonCount(2, 'data')
            ->assertJsonPath('data.0.date', now()->addDays(2)->format('Y-m-d'))
            ->assertJsonPath('data.0.count', 1)
            ->assertJsonPath('data.1.date', now()->addDays(3)->format('Y-m-d'))
            ->assertJsonPath('data.1.count', 1);
    }

    public function test_service_booking_binds_service_correctly(): void
    {
        $service = Service::factory()->create(['is_active' => true]);
        $slot = ScheduleSlot::factory()->create(['starts_at' => now()->addDays(2)->setTime(14, 0)]);

        $this->postJson('/api/booking', $this->bookingPayload([
            'schedule_slot_id' => $slot->id,
            'service_id' => $service->id,
        ]))->assertCreated();

        $this->assertDatabaseHas('bookings', ['service_id' => $service->id]);
    }
}
