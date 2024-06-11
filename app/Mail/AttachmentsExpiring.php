<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;

class AttachmentsExpiring extends Mailable
{
    use Queueable, SerializesModels;

    public $anexos;

    /**
     * Create a new message instance.
     */
    public function __construct(Collection $anexos)
    {
        $this->anexos = $anexos;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Anexos Expirando',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        ds($this->anexos);
        return new Content(
            markdown: 'emails.attachments_expiring',
            with: [
                'anexos' => $this->anexos,
                'url' => 'https://www.grupobioclin.com.br/admin',
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
