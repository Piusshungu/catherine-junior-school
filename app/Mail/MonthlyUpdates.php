<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MonthlyUpdates extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;

    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $user)
    {
        $this->subject = $subject;

        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.monthly-update')->subject($this->subject);
    }
}
