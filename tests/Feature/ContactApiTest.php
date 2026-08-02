<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Mail\ContactMail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContactApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_contact_form_sends_email(): void
    {
        Mail::fake();

        $response = $this->postJson('/kontak', [
            'name' => 'Andi Wijaya',
            'email' => 'andi@example.com',
            'phone' => '+6281234567890',
            'company' => 'PT Contoh Sejahtera',
            'topic' => 'Perpajakan',
            'message' => 'Saya ingin konsultasi perpajakan tahunan.',
        ]);

        $response->assertOk()
            ->assertJsonPath('message', fn ($value) => is_string($value));

        Mail::assertSent(ContactMail::class, function (ContactMail $mail) {
            return $mail->data['name'] === 'Andi Wijaya'
                && $mail->data['topic'] === 'Perpajakan';
        });
    }

    public function test_contact_form_validates_required_fields(): void
    {
        $response = $this->postJson('/kontak', []);

        $response->assertUnprocessable()
            ->assertJsonValidationErrors(['name', 'email', 'phone', 'topic', 'message']);
    }

    public function test_contact_form_rejects_invalid_phone(): void
    {
        $response = $this->postJson('/kontak', [
            'name' => 'Andi Wijaya',
            'email' => 'andi@example.com',
            'phone' => 'abc',
            'topic' => 'Perpajakan',
            'message' => 'Pesan.',
        ]);

        $response->assertUnprocessable()
            ->assertJsonValidationErrors(['phone']);
    }
}
