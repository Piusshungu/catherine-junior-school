<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StaffUsersNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $mailSubject;

    public $message;

    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mailSubject, $message, $user)
    {
        $this->mailSubject = $mailSubject;

        $this->message = $message;

        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.staff')
        
        ->subject($this->mailSubject);
    }
}
