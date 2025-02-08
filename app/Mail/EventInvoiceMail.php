<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EventInvoiceMail extends Mailable
{
    use Queueable, SerializesModels;
    public $invoiceData;
    public $invoicePdfPath;
    /**
     * Create a new message instance.
     */
    public function __construct($invoiceData, $invoicePdfPath)
    {
        $this->invoiceData = $invoiceData;
        $this->invoicePdfPath = $invoicePdfPath;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Event Invoice Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    // public function content(): Content
    // {
    //     return new Content(
    //         view: 'view.name',
    //     );
    // }


    public function build()
    {
        return $this->subject('Your Event Invoice')
                    ->view('home.contact.event_invoice_mail')
                    ->attach($this->invoicePdfPath, [
                        'as' => 'invoice.pdf',
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
        return [];
    }
}
