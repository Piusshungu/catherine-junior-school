<?php

namespace App\Console\Commands;

use App\Mail\MonthlyUpdates;
use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class MonthlyUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'monthly:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command sends rugalar updates to all staff on monthly basis';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::select('email')->get();

        if($users->count() > 0){

            foreach($users as $user){


                $subject = [

                    'subject' => 'Monthly Updates',
                ];

                Mail::to($user->email)->send(new MonthlyUpdates($subject, $user));
            }
        }
    }
}
