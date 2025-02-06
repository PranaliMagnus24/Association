<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InterviewScheduledMail extends Mailable
{
    use Queueable, SerializesModels;
    public $interviewDetails;
    /**
     * Create a new message instance.
     */
    public function __construct($interviewDetails)
    {
        $this->interviewDetails = $interviewDetails;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Interview Scheduled Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    // public function content(): Content
    // {
    //     return new Content(
    //         view: 'home.contact.interview_schedule_mail',
    //     );
    // }

    public function build()
    {
        return $this->subject($this->interviewDetails['action'] == 'rejected' ? 'Application Rejected' : 'Interview Scheduled')
                    ->view('home.contact.interview_schedule_mail')
                    ->with('interviewDetails', $this->interviewDetails);
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
