<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Submission;

class SubmissionStatusMail extends Mailable
{
    use Queueable, SerializesModels;

    public $submission;
    public $status;

    /**
     * Create a new message instance.
     */
    public function __construct(Submission $submission, $status)
    {
        $this->submission = $submission;
        $this->status = $status; // 'approved' atau 'rejected'
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $subjectText = $this->status == 'approved' 
            ? 'Selamat! Berita Anda Diterbitkan di Portal Berita' 
            : 'Pemberitahuan Status Tinjauan Berita Anda';

        return new Envelope(
            subject: $subjectText,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.submission_status',
        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        return [];
    }
}
