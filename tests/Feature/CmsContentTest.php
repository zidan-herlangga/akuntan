<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Article;
use App\Models\CaseStudy;
use App\Models\Service;
use App\Models\TeamMember;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CmsContentTest extends TestCase
{
    use RefreshDatabase;

    public function test_cms_pages_render_records_from_database(): void
    {
        $service = Service::factory()->create([
            'title' => 'Konsultasi Audit Uji',
            'slug' => 'konsultasi-audit-uji',
            'summary' => 'Konsultasi audit khusus untuk pengujian CMS.',
        ]);
        $inactiveService = Service::factory()->create([
            'title' => 'Layanan Rahasia',
            'is_active' => false,
        ]);
        $member = TeamMember::factory()->create([
            'name' => 'Andi Permana',
            'position' => 'Partner',
            'certifications' => ['Akuntan Publik', 'BKP'],
        ]);
        $featuredCase = CaseStudy::factory()->create([
            'client_name' => 'PT Uji Dinamis',
            'industry' => 'Teknologi',
            'is_featured' => true,
        ]);
        $gridCase = CaseStudy::factory()->create([
            'client_name' => 'PT Grid Uji',
            'industry' => 'Jasa',
            'is_featured' => false,
        ]);
        $inactiveCase = CaseStudy::factory()->create([
            'client_name' => 'PT Inaktif Saja',
            'is_active' => false,
        ]);
        $article = Article::factory()->create([
            'title' => 'Panduan Uji CMS Terbaru',
            'slug' => 'panduan-uji-cms-terbaru',
            'published_at' => now()->subDay(),
        ]);
        Article::factory()->create([
            'title' => 'Artikel Belum Terbit',
            'slug' => 'artikel-belum-terbit',
            'is_published' => false,
        ]);

        $this->get('/')
            ->assertOk()
            ->assertSee($service->title)
            ->assertSee($member->name)
            ->assertSee($featuredCase->client_name)
            ->assertDontSee($inactiveService->title)
            ->assertDontSee($gridCase->client_name)
            ->assertDontSee($inactiveCase->client_name);

        $this->get('/layanan')
            ->assertOk()
            ->assertSee($service->title)
            ->assertDontSee($inactiveService->title);

        $this->get('/tentang')
            ->assertOk()
            ->assertSee($member->name)
            ->assertSee('Akuntan Publik')
            ->assertDontSee($inactiveService->title);

        $this->get('/portofolio')
            ->assertOk()
            ->assertSee($featuredCase->client_name)
            ->assertSee($gridCase->client_name)
            ->assertDontSee($inactiveCase->client_name);

        $this->get('/blog')
            ->assertOk()
            ->assertSee($article->title)
            ->assertDontSee('Artikel Belum Terbit');

        $this->get('/blog/panduan-uji-cms-terbaru')
            ->assertOk()
            ->assertSee($article->title);
    }

    public function test_cms_pages_render_static_fallback_when_database_empty(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('Tidak ada studi kasus yang tersedia saat ini.')
            ->assertSee('Layanan Utama');

        $this->get('/layanan')
            ->assertOk()
            ->assertSee('Tidak ada layanan yang tersedia saat ini.');

        $this->get('/tentang')
            ->assertOk()
            ->assertSee('Managing Partner · Ak., CPA')
            ->assertSee('Sengketa');

        $this->get('/portofolio')
            ->assertOk()
            ->assertSee('Belum ada studi kasus yang tersedia.');

        $this->get('/blog')
            ->assertOk()
            ->assertSee('Cara Menghitung PPh 21 Terbaru 2026')
            ->assertSee('Belum ada artikel yang tersedia.');

        $this->get('/blog/contoh-artikel')
            ->assertOk()
            ->assertSee('Panduan lengkap menghitung PPh 21 dengan metode tarif efektif');
    }
}
