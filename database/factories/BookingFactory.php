<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enums\BookingStatus;
use App\Models\Booking;
use App\Models\Consultant;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Booking>
 */
class BookingFactory extends Factory
{
    protected $model = Booking::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'booking_number' => 'BK-'.now()->format('Ymd').'-'.strtoupper(Str::random(6)),
            'consultant_id' => Consultant::factory(),
            'service_id' => Service::factory(),
            'client_name' => fake()->name(),
            'client_email' => fake()->safeEmail(),
            'client_phone' => '+6281234567890',
            'company_name' => fake()->company(),
            'company_npwp' => '012345678901234',
            'financial_issue_description' => fake()->sentence(),
            'status' => BookingStatus::Pending,
            'starts_at' => now()->addDays(2)->setTime(9, 45),
            'ends_at' => now()->addDays(2)->setTime(10, 30),
            'source' => 'web',
        ];
    }
}
