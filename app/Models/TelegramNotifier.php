<?php
namespace App\Models;

use GuzzleHttp\Client;

use GuzzleHttp\RequestOptions;

class TelegramNotifier

{

    public static function notify($text)

    {

        $client = new Client();

        try {

            $client->post('https://api.telegram.org/bot5064908687:AAHxm8Os7XH7sb48kNRPxuJ0UcyRK1xO5R4/sendMessage', [

                RequestOptions::JSON => [

                    'chat_id' => 924608003,

                    'text' => $text,

                ]

            ]);

        } catch (\Exception $e) {

            var_dump($e->getMessage());

        }

    }

}
