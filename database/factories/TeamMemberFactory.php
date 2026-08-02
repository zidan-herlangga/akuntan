<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\TeamMember;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<TeamMember>
 */
class TeamMemberFactory extends Factory
{
    protected $model = TeamMember::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->name();

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'position' => fake()->randomElement(['Partner', 'Senior Auditor', 'Konsultan Pajak', 'Konsultan Bisnis']),
            'bio' => fake()->paragraph(),
            'certifications' => ['Akuntan Publik', 'Bersertifikat BKP'],
            'is_active' => true,
        ];
    }
}
