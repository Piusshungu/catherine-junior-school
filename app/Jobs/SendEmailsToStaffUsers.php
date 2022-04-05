<?php

namespace App\Jobs;

use App\Mail\StaffUsersNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailsToStaffUsers implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $mailSubject;

    protected $message;

    protected $user;

    /**
     * Create a new job instance.
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
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new StaffUsersNotification($this->mailSubject, $this->message, $this->user);

        Mail::to($this->user['email'])->send($email);
    }
}
