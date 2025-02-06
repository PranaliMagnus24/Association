<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Attachment;

class EventConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $mailData;
    public $pdfPath;

    /**
     * Create a new message instance.
     *
     * @param  mixed  $mailData
     * @param  mixed  $pdf (optional)
     */
    public function __construct($mailData, $pdfPath)
    {
        $this->mailData = $mailData;
        $this->pdfPath = $pdfPath;
    }
    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Event Confirmation Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function build()
    {
        return $this->subject('Event Booking Confirmation')
                    ->view('home.contact.event_confirmation')
                    ->with('mailData', $this->mailData)
                    ->attach($this->pdfPath, [
                        'as' => 'event_confirmation.pdf',
                        'mime' => 'application/pdf',
                    ]);
    }
    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        // You can leave this empty since the PDF attachment is handled in build() method
        return [];
    }
}
