<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Tomsgad\Beem\SMS\BeemSms;

class SchoolOpening extends Notification
{
    use Queueable;


    public function __construct($parents){

        $this->parents = $parents;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['beem'];
    }

        /**
     * Get the Beem / SMS representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Tomsgad\Beem\SMS\BeemSms
     */
    public function toBeem($notifiable)
    {

    $api_key = 'c1a13d70917b9663';
        $secret_key = 'N2YwZGEwNDdlMGJiOWY4YzNkOTlmMTlhZDdlYTdmMmI4MGZmOTczNjRkZDA1NDQ1NmEwZDYyMTQ2ZTEwMmQ0Ng==';

        $postData = array(
            'source_addr' => 'INFO',
            'encoding' => 0,
            'schedule_time' => '',
            'message' => 'Hello World',
            'recipients' => [array('recipient_id' => '1', 'dest_addr' => '+255714262024')]
        );

        $Url = 'https://apisms.beem.africa/v1/send';

        $ch = curl_init($Url);
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt_array($ch, array(
            CURLOPT_POST => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_HTTPHEADER => array(
                'Authorization:Basic ' . base64_encode("$api_key:$secret_key"),
                'Content-Type: application/json'
            ),
            CURLOPT_POSTFIELDS => json_encode($postData)
        ));

        $response = curl_exec($ch);

        

        if ($response === FALSE) {
            echo $response;

            die(curl_error($ch));
        }
        return $response;
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
