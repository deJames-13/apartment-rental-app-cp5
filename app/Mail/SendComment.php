<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendComment extends Mailable
{
  use Queueable, SerializesModels;

  /**
   * Create a new message instance.
   */
  public string $comment;
  public $tenant;
  public $landlord;
  public $application;
  public function __construct(
    string $comment,
    $tenant,
    $landlord,
    $application
  ) {
    $this->comment = $comment;
    $this->tenant = $tenant;
    $this->landlord = $landlord;
    $this->application = $application;
  }

  /**
   * Get the message envelope.
   */
  public function envelope(): Envelope
  {
    return new Envelope(
      subject: 'Send Comment',
    );
  }

  /**
   * Get the message content definition.
   */
  public function content(): Content
  {
    return new Content(
      view: 'mail.send-comment',
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
