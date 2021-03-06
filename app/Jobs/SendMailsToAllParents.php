<?php

namespace App\Jobs;

use App\Mail\NotifyAllParents;
use App\Models\Parents;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\SendBulkMailsToParentsController;

class SendMailsToAllParents implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $details;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $parents = Parents::all();
        
        $email = (new NotifyAllParents($parents))

        ->onConnection('sqs')

        ->onQueue('email');

        Mail::to($this->details['email'])->send($email);
        
    }
}
