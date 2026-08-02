<?php

declare(strict_types=1);

namespace App\Jobs;

use App\Mail\BookingConfirmation;
use App\Models\Booking;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendBookingConfirmationJob implements ShouldQueue
{
    use Queueable;

    public int $tries = 3;

    public function __construct(public readonly Booking $booking) {}

    public function handle(): void
    {
        Mail::to($this->booking->client_email)
            ->send(new BookingConfirmation($this->booking));

        $this->dispatchWhatsApp();
    }

    private function dispatchWhatsApp(): void
    {
        $config = config('services.whatsapp');

        if (empty($config['api_url']) || empty($config['token'])) {
            Log::info('WhatsApp gateway not configured; skipping delivery.', [
                'booking' => $this->booking->booking_number,
            ]);

            return;
        }

        $message = sprintf(
            'Halo %s, reservasi konsultasi Anda di  Drs. Chaeroni & Rekan telah kami terima (No. %s). Kami akan menghubungi Anda untuk konfirmasi jadwal.',
            $this->booking->client_name,
            $this->booking->booking_number,
        );

        Http::timeout(15)->post($config['api_url'], [
            'target' => $this->booking->client_phone,
            'message' => $message,
            'token' => $config['token'],
        ]);
    }
}
