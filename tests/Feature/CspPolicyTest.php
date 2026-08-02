<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class CspPolicyTest extends TestCase
{
    use RefreshDatabase;

    public function test_public_pages_get_relaxed_policy_without_nonce(): void
    {
        $response = $this->get('/');
        $header = $response->headers->get('Content-Security-Policy');

        $response->assertOk();
        $this->assertNotNull($header);
        $this->assertStringContainsString('script-src', $header);
        $this->assertStringContainsString("'unsafe-inline'", $header);
        $this->assertStringContainsString('https://cdn.tailwindcss.com', $header);
        $this->assertStringContainsString('data:', $header);
        $this->assertStringContainsString('https://fonts.googleapis.com', $header);
        $this->assertStringNotContainsString('nonce-', $header);
    }

    public function test_admin_pages_get_strict_policy(): void
    {
        Role::findOrCreate('super_admin', 'web');
        $admin = User::factory()->create(['mfa_enabled' => false]);
        $admin->assignRole('super_admin');

        $response = $this->actingAs($admin)->get('/admin');
        $header = $response->headers->get('Content-Security-Policy');

        $response->assertOk();
        $this->assertNotNull($header);
        $this->assertStringContainsString('https://challenges.cloudflare.com', $header);
        $this->assertStringContainsString('object-src \'none\'', $header);
        $this->assertStringContainsString('form-action \'self\'', $header);
        $this->assertStringContainsString('unsafe-eval', $header);
        $this->assertStringNotContainsString('cdn.tailwindcss.com', $header);
        $this->assertStringNotContainsString('fonts.googleapis.com', $header);
        $this->assertStringNotContainsString('nonce-', $header);
    }
}
