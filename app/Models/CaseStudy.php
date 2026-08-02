<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class CaseStudy extends Model implements HasMedia
{
    /** @use HasFactory<CaseStudyFactory> */
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'client_name',
        'slug',
        'industry',
        'challenge',
        'solution',
        'results',
        'metrics',
        'nda_compliant',
        'is_featured',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'metrics' => 'array',
            'nda_compliant' => 'boolean',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
        ];
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('cover')->singleFile();
    }
}
