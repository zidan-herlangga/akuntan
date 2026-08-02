<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Consultant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Consultant>
 */
class ConsultantFactory extends Factory
{
    protected $model = Consultant::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => '+62812345678'.fake()->randomDigit(),
            'specialization' => fake()->randomElement(['Audit', 'Perpajakan', 'Konsultasi Bisnis']),
            'bio' => fake()->paragraph(),
            'is_active' => true,
            'timezone' => 'Asia/Jakarta',
        ];
    }
}
