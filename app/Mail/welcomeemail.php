<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class welcomeemail extends Mailable
{
    use Queueable, SerializesModels;



    public $subject;
    public $name;
    public $msgformat;

    /**
     * Create a new msgformat instance.
     */
    public function __construct($subject, $name, $msgformat)
    {

        $this->subject = $subject;
        $this->name = $name;
        $this->msgformat = $msgformat;
    }

    /**
     * Get the msgformat envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->subject,
        );
    }

    /**
     * Get the msgformat content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.welcome-mail',
            with: [
            'name' => $this->name,
            'msgformat' => $this->msgformat,
        ],
        );
    }

    /**
     * Get the attachments for the msgformat.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
