<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Article>
 */
class ArticleFactory extends Factory
{
    protected $model = Article::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence();

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'excerpt' => fake()->sentence(),
            'body' => fake()->paragraphs(4, true),
            'category' => fake()->randomElement(['Perpajakan', 'Audit', 'Bisnis', 'Keuangan']),
            'tags' => ['pajak', 'UMKM'],
            'is_published' => true,
            'published_at' => now(),
        ];
    }
}
