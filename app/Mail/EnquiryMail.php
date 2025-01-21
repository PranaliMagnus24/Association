<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EnquiryMail extends Mailable
{ use Queueable, SerializesModels;

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
     * @return void
     */
    public function __construct($msg, $sub, $userName, $userEmail, $userMessage)
    {
        $this->msg = $msg;           // The message content
        $this->sub = $sub;           // The subject of the email
        $this->userName = $userName; // The name of the user making the enquiry
        $this->userEmail = $userEmail; // The email of the user
        $this->userMessage = $userMessage; // The message content from the user
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->sub, // Use the dynamic subject
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
            view: 'enquiry', // Use the Blade view for the enquiry email
        );
    }
    public function build()
{
    return $this->view('enquiry')  // Reference to the Blade view
                ->subject($this->sub)  // Set the subject of the email
                ->with([
                    'msg' => $this->msg,  // Pass the message content
                    'sub' => $this->sub,  // Pass the subject (or URL)
                    'userName' => $this->userName,
                    'userEmail' => $this->userEmail,
                    'userMessage' => $this->userMessage,
                ]);
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
