<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class VerifyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $msg;
    public $sub;
    public $verificationLink;

    /**
     * Create a new message instance.
     *
     * @param string $msg
     * @param string $sub
     * @param string $verificationLink
     */
    public function __construct($msg, $sub, $verificationLink)
    {
        $this->msg = $msg;
        $this->sub = $sub;
        $this->verificationLink = $verificationLink;
    }

    /**
     * Get the message envelope.
     *
     * @return Envelope
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->sub,  // Set the subject from the constructor
        );
    }

    /**
     * Get the message content definition.
     *
     * @return Content
     */
    public function content(): Content
    {
        return new Content(
            view: 'verify',  // Reference to the verify email view
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
