<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificationToParents extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;

    public $mailContent;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject,$mailContent)
    {
        $this->subject = $subject;

        $this->mailContent = $mailContent;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.individual-parent');
    }
}
