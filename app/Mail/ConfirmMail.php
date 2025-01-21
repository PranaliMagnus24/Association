<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ConfirmMail extends Mailable
{
    use Queueable, SerializesModels;

    public $msg;
    public $sub;
    public $userName;
    public $confirmationLink;

    /**
     * Create a new message instance.
     *
     * @param string $msg
     * @param string $sub
     * @param string $userName
     * @param string $confirmationLink
     */
    public function __construct($msg, $sub, $userName, $confirmationLink)
    {
        $this->msg = $msg;
        $this->sub = $sub;
        $this->userName = $userName;
        $this->confirmationLink = $confirmationLink;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->sub,  // Use the subject passed from the controller
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'confirmation',  // Define the Blade view for the email content
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
