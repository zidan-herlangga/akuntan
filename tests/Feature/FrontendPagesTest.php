<?php

declare(strict_types=1);

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\File;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class FrontendPagesTest extends TestCase
{
    use RefreshDatabase;

    #[DataProvider('publicPages')]
    public function test_public_pages_render(string $path, string $needle): void
    {
        $response = $this->get($path);

        $response->assertOk();
        $this->assertStringContainsString($needle, $response->getContent());
    }

    public static function publicPages(): array
    {
        return [
            'home' => ['/', 'Beranda'],
            'services' => ['/layanan', 'Layanan'],
            'about' => ['/tentang', 'Tentang'],
            'portfolio' => ['/portofolio', 'Portofolio'],
            'blog' => ['/blog', 'Blog'],
            'blog-detail' => ['/blog/contoh-artikel', 'Blog'],
            'booking' => ['/reservasi', 'Reservasi'],
            'contact' => ['/kontak', 'Kontak'],
            'career' => ['/karir', 'Karir'],
        ];
    }

    public function test_internal_links_point_to_route_urls(): void
    {
        $content = $this->get('/')->getContent();

        $this->assertStringNotContainsString('.html"', $content);
        $this->assertStringContainsString('href="/layanan"', $content);
        $this->assertStringContainsString('href="/reservasi"', $content);
        $this->assertStringContainsString('assets/css/style.css', $content);
    }

    public function test_asset_files_are_served(): void
    {
        $this->assertTrue(File::exists(public_path('assets/css/style.css')));
        $this->assertTrue(File::exists(public_path('assets/js/main.js')));
    }

    public function test_unknown_blog_slug_still_renders_detail_page(): void
    {
        $this->get('/blog/artikel-lain')->assertOk();
    }

    public function test_shared_layout_marks_correct_nav_item_active(): void
    {
        $home = $this->get('/')->getContent();
        $this->assertStringContainsString('class="nav-link active"', $home);

        $reservasi = $this->get('/reservasi')->getContent();
        $this->assertStringContainsString('ring-2 ring-white/30', $reservasi);
        $this->assertStringContainsString('id="booking-wizard"', $reservasi);
        $this->assertStringContainsString('id="service-list"', $reservasi);
    }
}
