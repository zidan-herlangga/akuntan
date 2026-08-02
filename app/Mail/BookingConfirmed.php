<?php

declare(strict_types=1);

namespace App\Mail;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BookingConfirmed extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public function __construct(public readonly Booking $booking) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Reservasi Anda Telah Dikonfirmasi - Drs. Chaeroni & Rekan',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'mail.booking-confirmed',
            with: [
                'booking' => $this->booking,
                'consultant' => $this->booking->consultant,
                'service' => $this->booking->service,
            ],
        );
    }
}
