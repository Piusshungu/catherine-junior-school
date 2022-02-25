<?php

namespace App\Actions;

class CustomSMSUsersAction
{
   public function schoolOpeningSMS($recipients){//This check the format rather than a variable name

    $api_key = 'c1a13d70917b9663';

    $secret_key = 'N2YwZGEwNDdlMGJiOWY4YzNkOTlmMTlhZDdlYTdmMmI4MGZmOTczNjRkZDA1NDQ1NmEwZDYyMTQ2ZTEwMmQ0Ng==';


    foreach ($recipients as $key => $recipient){

        $smsData = array(
            'source_addr' => 'INFO',
            'encoding' => 0,
            'schedule_time' => '',
            'message' => 'Relax Shungu is Testing please confirm when you get SMS',
            'recipients' => [array('recipient_id' => $key, 'dest_addr' => $recipient->phone_number)]
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
}

