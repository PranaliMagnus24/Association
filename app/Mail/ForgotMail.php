<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ForgotMail extends Mailable
{
    use Queueable, SerializesModels;

    public $msg;
    public $sub;
    public $resetLink;

    /**
     * Create a new message instance.
     *
     * @param string $msg
     * @param string $sub
     * @param string $resetLink
     * @return void
     */
    public function __construct($msg, $sub, $resetLink)
    {
        $this->msg = $msg;           // The message (e.g., "Hello, we received a request...")
        $this->sub = $sub;           // The subject of the email
        $this->resetLink = $resetLink; // The password reset link
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->sub, // Set the subject dynamically
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content(): Content
    {
        return new Content(
            view: 'forgot', // Use the Blade view located at resources/views/emails/forgot.blade.php
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
