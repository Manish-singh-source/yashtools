<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class adminEnquiry extends Mailable
{
    use Queueable, SerializesModels;
    
    public $requestData;
    public $productQuantities;
    public $enquiry_id;
    public $user;
    public $partNumber;

    /**
     * Create a new message instance.
     */
    public function __construct($requestData, $productQuantities, $enquiry_id, $user, $partNumber)
    {
        //
        $this->requestData = $requestData;
        $this->productQuantities = $productQuantities;
        $this->enquiry_id = $enquiry_id;
        $this->user = $user;
        $this->partNumber = $partNumber;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Admin Enquiry',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.enquiry-mail',
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
