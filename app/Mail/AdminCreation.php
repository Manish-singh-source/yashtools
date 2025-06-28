<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdminCreation extends Mailable
{
    use Queueable, SerializesModels;
    public $fullname;
    public $email;
    public $mobile_number;
    public $password;
    public $role;
    /**
     * Create a new message instance.
     */
    public function __construct($fullname, $email, $mobile_number, $password, $role)
    {
        //
        $this->fullname = $fullname;
        $this->email = $email;
        $this->mobile_number = $mobile_number;
        $this->password = $password;
        $this->role = $role;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Admin Account Created',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.admin-register-mail',
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
