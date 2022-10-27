<?php

namespace App\Helpers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class FCM
{
    public static function broadcast($message)
    {
        $client = new Client();

        $body = [
            "to" => "/topics/all",
            "notification" => [
                "body" => $message['body'],
                "title" => $message['title'],
                "android_channel_id" => "nu_2",
            ],
            "data" => [
                "app_name" => "nukoin"
            ]
        ];

        if(isset($message['image'])) {
            $body['notification']['image'] = $message['image'];
        }
        
        $response = $client->post(env('FCM_URL'), [
            'headers' => [
                // 'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'key='.env('FCM_SERVER_KEY')
            ],
            'body' => json_encode($body)
        ]);

        $result = json_decode($response->getBody());

        return $result;
    }

    public static function direct($token, $message)
    {
        $client = new Client();

        if($message['status'] == 'failed') {
            $link = "nukoin://lazisnumukomuko.id/payment/expired?order_id=".$message['order_id']."&result=expired";
        } else {
            $link = "nukoin://lazisnumukomuko.id/payment/success?order_id=".$message['order_id']."&result=success";
        }

        $body = [
            "to" => $token,
            "notification" => [
                "body" => $message['body'],
                "title" => $message['title'],
                "android_channel_id" => "nu_2",
                "link" => $link,
            ],
            "data" => [
                "transaction_id" => $message['order_id']
            ]
        ];
        
        $response = $client->post(env('FCM_URL'), [
            'headers' => [
                // 'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'key='.env('FCM_SERVER_KEY')
            ],
            'body' => json_encode($body)
        ]);

        $result = json_decode($response->getBody());

        return $result;
    }
}