<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ThankyouMail extends Mailable
{
    use Queueable, SerializesModels;

    public $msg;
    public $sub;
    public $userName;

    /**
     * Create a new message instance.
     *
     * @param string $msg
     * @param string $sub
     * @param string $userName
     */
    public function __construct($msg, $sub, $userName)
    {
        // Initialize the variables from the constructor
        $this->msg = $msg;
        $this->sub = $sub;
        $this->userName = $userName;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->sub,  // Set dynamic subject passed from the controller
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'thank',  // Reference the email view (Blade template)
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
