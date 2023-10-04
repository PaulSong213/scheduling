<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;



class TwilioController extends Controller
{
    //
    public function sendSMS($sms, $number, $redirectRoute = "home")
    {
        return redirect()->route('home'); //TODO : Remove this line when twilio is working again
        $twilio = new Client(\config('twilio.TWILIO_ACCOUNT_SID'), \config('twilio.TWILIO_AUTH_TOKEN'));
        try {
            $message = $twilio->messages
                ->create(
                    $number, // to 
                    array(
                        "from" => \config('twilio.TWILIO_PHONE_NUMBER'),
                        "body" => $sms
                    )
                );
            return view('twilio.sendSMS')
                ->with('redirectRoute', $redirectRoute)
                ->with('number', $number)
                ->with('sms', $sms)
                ->with('error_message', null);
        } catch (Exception $e) {
            $error_message = $e->getCode() . ' - ' . $e->getMessage();
            return view('twilio.sendSMS')
                ->with('redirectRoute', $redirectRoute)
                ->with('number', $number)
                ->with('sms', $sms)
                ->with('error_message', $error_message);
        }
    }
}
