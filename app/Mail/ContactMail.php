<?php

declare(strict_types=1);

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @param  array<string, string|null>  $data
     */
    public function __construct(public array $data) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Pesan Kontak Baru dari Website  Drs. Chaeroni & Rekan',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.contact',
            with: ['data' => $this->data],
        );
    }
}
