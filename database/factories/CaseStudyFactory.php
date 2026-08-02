<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\CaseStudy;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<CaseStudy>
 */
class CaseStudyFactory extends Factory
{
    protected $model = CaseStudy::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $clientName = fake()->company();

        return [
            'client_name' => $clientName,
            'slug' => Str::slug($clientName),
            'industry' => fake()->randomElement(['Manufaktur', 'Teknologi', 'Ritel', 'Jasa', 'Keuangan']),
            'challenge' => fake()->paragraph(),
            'solution' => fake()->paragraph(),
            'results' => fake()->paragraph(),
            'metrics' => ['omzet' => '+25%', 'efisiensi' => '30%'],
            'nda_compliant' => false,
            'is_active' => true,
        ];
    }
}
