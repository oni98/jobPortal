<?php


namespace App;
use Illuminate\Support\Facades\Http;



class SmsService
{
    private $baseUrl;
    private $apiKey;
    private $senderID;
    private $otp;
    private $message;
    public function __construct($apiKey, $senderID){
        $this->baseUrl = 'http://g.dianasms.com/smsapi';
        $this->apiKey = $apiKey;
        $this->senderID = $senderID;
    }

    public function sendSms($mobieNumber){
        $response = Http::post($this->baseUrl, [
            "api_key" => $this->apiKey,
            "type" => "text",
            "contacts" => '88'.$mobieNumber,
            "senderid" => $this->senderID,
            "msg" => $this->getMessage()
        ]);
    }
    private function getMessage(){
        return $this->processedMessage();
    }

    public function setTemplate($message){
        $this->message = $message;
    }

    private function processedMessage(){
        return str_replace('%otp%', $this->otp, $this->message);
    }

    public function setOtpCode($otp){
        $this->otp = $otp;
    }

}
