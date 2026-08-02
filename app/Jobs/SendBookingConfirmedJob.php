<?php

declare(strict_types=1);

namespace App\Jobs;

use App\Mail\BookingConfirmed;
use App\Models\Booking;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class SendBookingConfirmedJob implements ShouldQueue
{
    use Queueable;

    public int $tries = 3;

    public function __construct(public readonly Booking $booking) {}

    public function handle(): void
    {
        Mail::to($this->booking->client_email)
            ->send(new BookingConfirmed($this->booking));
    }
}
