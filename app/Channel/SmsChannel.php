<?php

namespace App\Channel;

use Ghasedak\Exceptions\GhasedakSMSException;
use Illuminate\Notifications\Notification;

class SmsChannel
{
    public function send($notifiable, Notification $notification)
    {
        $curl = curl_init();

        $data = array(
            "sendDate" => "2024-07-04T07:41:15.992Z",
            "receptors" => array(
                array(
                    "mobile" => "$notifiable->phone",
                    "clientReferenceId" => "123456"
                )
            ),
            "templateName" => "Ghaseda",
            "inputs" => array(
                array(
                    "param" => "code",
                    "value" => "$notification->code",
                )
            ),
            "udh" => true
        );
        $postFields = json_encode($data);

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://gateway.ghasedak.me/rest/api/v1/WebService/SendOtpSMS',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $postFields,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'ApiKey: 231c390fd6843dc7101370396e839a9bd1a7d7d475ca34695f83d2476d29285ecuQvF6Zz8de68Jhe'  // مطمئن شو که کلید API شما به درستی وارد شده
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $responseData = json_decode($response);
//        var_dump($responseData) ; // اینجا خروجی را برمی‌گردانید
        return $responseData;


    }
}
