<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EmailContato extends Mailable
{
    use Queueable, SerializesModels;

    public $request;
    public $file;

    /**
     * Create a new message instance.
     */
    public function __construct($request, $file = null)
    {
        $this->request = $request;
        $this->file = $file;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Email Contato',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {


        return new Content(
            view: 'templates.contac',
            with: [
                'name' => $this->request->name,
                'email' => $this->request->email,
                'telephone' => $this->request->telephone,
                'sector' => $this->request->sector,
                'attach' => $this->request->attach,
                'description' => $this->request->description,
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
        if ($this->request->attach){

            return [
                Attachment::fromPath($this->file->getRealPath())
                    ->as($this->file->getClientOriginalName())
            ];

        }else{
            return [];
        }
    }
}
