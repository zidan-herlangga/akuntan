<?php

declare(strict_types=1);

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;

class Turnstile implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $secret = config('services.turnstile.secret_key');

        if (empty($secret) && app()->environment('local', 'testing')) {
            return;
        }

        if (empty($secret)) {
            $fail('Captcha tidak terkonfigurasi dengan benar.');

            return;
        }

        try {
            $response = Http::asForm()
                ->timeout(10)
                ->post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
                    'secret' => $secret,
                    'response' => $value,
                    'remoteip' => request()->ip(),
                ])
                ->throw();

            $success = (bool) $response->json('success');

            if (! $success) {
                $fail('Verifikasi captcha gagal. Silakan coba lagi.');
            }
        } catch (RequestException) {
            $fail('Gagal memverifikasi captcha. Silakan coba lagi.');
        }
    }
}
