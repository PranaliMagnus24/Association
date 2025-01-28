<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Attachment;
class ApplyJob extends Mailable
{
    use Queueable, SerializesModels;
    public $applyJob;
    /**
     * Create a new message instance.
     */
    public function __construct($applyJob)
    {
        $this->applyJob = $applyJob;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'M.I.M.A. Job Application',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'home.contact.apply_job',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
{
    $attachments = [];
    $resumePath = public_path('upload/resume/' . $this->applyJob->upload_resume);

    // Check if the resume file exists before adding it as an attachment
    if (!empty($this->applyJob->upload_resume) && file_exists($resumePath)) {
        $attachments[] = \Illuminate\Mail\Attachment::fromPath($resumePath)
            ->as($this->applyJob->upload_resume)
            ->withMime('application/pdf');
    }

    return $attachments;
}

}
