<?php

namespace App\Actions;

class CustomSMSToUsersAction
{
   public function sendCustomMessage($recipient, $messageContent){//This check the format rather than a variable name

    $api_key = config('keys.beem.apikey');

    $secret_key = config('keys.beem.secretkey');


        $smsData = array(
            'source_addr' => 'INFO',
            'encoding' => 0,
            'schedule_time' => '',
            'message' => $messageContent,
            'recipients' => [array('recipient_id' => '1', 'dest_addr' => $recipient->phone_number)]
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
            CURLOPT_POSTFIELDS => json_encode($smsData)
        ));

        $response = curl_exec($ch);

        if ($response === FALSE) {
            echo $response;

            die(curl_error($ch));
        }
        var_dump($response) ;
    
        
   }
}

