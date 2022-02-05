<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SendBulkMailsToParents extends Controller
{
    public function sendMailToAllParents()
    {
        $details = [

            'subject' => 'School Opening Notification'
        ];

        $job = (new \App\Jobs\SendMailsToAllParents($details))

        ->delay(
            now()->addSeconds(2)
        );

        dispatch($job);

        return redirect('/parents')->with('sucess', 'Mails are successfully sent to all parents');
    }
}
