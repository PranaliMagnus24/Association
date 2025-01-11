<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    // Public variables to hold the values from the controller
    public $msg;
    public $sub;
    public $userName;
    public $userEmail;
    public $userMessage;

    /**
     * Create a new message instance.
     *
     * @param string $msg
     * @param string $sub
     * @param string $userName
     * @param string $userEmail
     * @param string $userMessage
     */
    public function __construct($msg, $sub, $userName, $userEmail, $userMessage)
    {
        // Assign the data to the public variables
        $this->msg = $msg;
        $this->sub = $sub;
        $this->userName = $userName;
        $this->userEmail = $userEmail;
        $this->userMessage = $userMessage;
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
            view: 'home.contact.contact',  // This is the Blade view to render for the email
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
