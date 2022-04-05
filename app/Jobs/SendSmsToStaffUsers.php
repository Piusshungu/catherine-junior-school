<?php

namespace App\Jobs;

use App\Actions\StaffSmsNotificationAction;
use App\Mail\StaffUsersNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendSmsToStaffUsers implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $messageContent;

    protected $contacts;

   

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($contacts, $messageContent)
    {
        $this->contacts = $contacts;
        
        $this->messageContent = $messageContent;

       
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $sendSms = new StaffSmsNotificationAction();

        $sendSms->sendSmsNotificationToStaff($this->contacts, $this->messageContent);

        
    }
}
