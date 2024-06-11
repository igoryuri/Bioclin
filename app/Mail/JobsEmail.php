<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;

class JobsEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $data, $file, $nameSlug;

    /**
     * Create a new message instance.
     */
    public function __construct($request, $file = null)
    {
        $this->data = $request;
        $this->nameSlug = Str::slug($this->data->name);
        if ($file != null) {
            $this->file = $file;
        }
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Vaga: ' .$this->data->category. ' | Candidato: ' . $this->data->name ,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.jobs-email',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        if ($this->file != null) {
            return [
                Attachment::fromPath(public_path("/curriculo/".$this->file))
                    ->withMime('application/pdf')
            ];
        }
        return [];
    }
}
