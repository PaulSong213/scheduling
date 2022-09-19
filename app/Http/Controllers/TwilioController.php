<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;



class TwilioController extends Controller
{
    //
    public $sid    = "AC0ee01350a558384959c64af938e2d4ca"; 
    public $token  = "4e272864a7cb41c73cd9c47873b9b92a"; 
    

    public function sendSMS($sms, $number)
    {
        $twilio = new Client($this->sid, $this->token); 
        $message = $twilio->messages
            ->create(
                $number, // to 
                array(
                    "from" => "+18149925268",
                    "body" => $sms
                )
            );
        return view('twilio.sendSMS')->with('message_id', $message);
    }

}
