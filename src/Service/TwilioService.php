<?php

namespace App\Service;
use Twilio\Rest\Client;

class TwilioService
{

    private $accountSid;
    private $authToken;
    private $twilioNumber;
    private $client;

    public function __construct()
    {
        $this->accountSid = "ACcfe7b37fc27fa99c4eb5e0d7e351df2d";
        $this->authToken = "a5e7c308a4cbb03312afeef6828d133e";
        $this->twilioNumber = "+12314651476";
        $this->client = new Client($this->accountSid, $this->authToken);
    }

    public function sendSms(string $to, string $body)
    {
        $client =new Client( $this->accountSid,  $this->authToken);
        $message= $client->messages->create(
            $to,
            [
                'from' => $this->twilioNumber,
                'body' => $body,
            ]
        );
    }
}