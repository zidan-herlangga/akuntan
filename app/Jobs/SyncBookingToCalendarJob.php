<?php

declare(strict_types=1);

namespace App\Jobs;

use App\Models\Booking;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;
use Spatie\GoogleCalendar\GoogleCalendarFactory;

class SyncBookingToCalendarJob implements ShouldQueue
{
    use Queueable;

    public int $tries = 3;

    public function __construct(public readonly Booking $booking) {}

    public function handle(): void
    {
        $calendarId = config('google-calendar.calendar_id');
        $profile = config('google-calendar.default_auth_profile');
        $credentialsPath = (string) config("google-calendar.auth_profiles.{$profile}.credentials_json", '');

        if (empty($calendarId) || ! is_file($credentialsPath)) {
            Log::info('Google Calendar not configured; skipping sync.', [
                'booking' => $this->booking->booking_number,
            ]);

            return;
        }

        try {
            GoogleCalendarFactory::createForCalendarId($calendarId)
                ->createEvent([
                    'name' => $this->eventName(),
                    'description' => $this->eventDescription(),
                    'startDateTime' => $this->booking->starts_at,
                    'endDateTime' => $this->booking->ends_at,
                    'recurrence' => [],
                ]);
        } catch (\Throwable $e) {
            Log::error('Failed to sync booking to Google Calendar.', [
                'booking' => $this->booking->booking_number,
                'error' => $e->getMessage(),
            ]);

            throw $e;
        }
    }

    private function eventName(): string
    {
        $service = $this->booking->service?->title;

        return 'Konsultasi'.($service ? ": {$service}" : '').' — '.$this->booking->client_name;
    }

    private function eventDescription(): string
    {
        return sprintf(
            "Client: %s\nEmail: %s\nTelepon: %s\nBooking: %s",
            $this->booking->client_name,
            $this->booking->client_email,
            $this->booking->client_phone,
            $this->booking->booking_number,
        );
    }
}
