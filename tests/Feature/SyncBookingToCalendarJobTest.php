<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Jobs\SyncBookingToCalendarJob;
use App\Models\Booking;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class SyncBookingToCalendarJobTest extends TestCase
{
    use RefreshDatabase;

    public function test_unconfigured_calendar_job_is_skipped_without_error(): void
    {
        config()->set('google-calendar.calendar_id', '');
        config()->set('google-calendar.default_auth_profile', 'service_account');
        config()->set(
            'google-calendar.auth_profiles.service_account.credentials_json',
            storage_path('app/google-calendar/does-not-exist.json'),
        );

        $booking = Booking::factory()->create();

        Log::spy();

        SyncBookingToCalendarJob::dispatchSync($booking);

        Log::shouldHaveReceived('info')
            ->once()
            ->withArgs(function (string $message): bool {
                return str_contains($message, 'Google Calendar not configured');
            });
    }
}
