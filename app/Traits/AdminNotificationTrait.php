<?php

namespace App\Traits;
use App\AdminEmail;

trait AdminNotificationTrait
{
    public function sendAdminEmail($body, $subject)
    {   
        $data = ["body" => $body];

        foreach(AdminEmail::all() as $email){

            $emailAddress = $email->email;

            \Mail::send("emails.notification", $data, function($message) use ($emailAddress, $subject) {// se envía el email

                $message->to($emailAddress)->subject($subject);
                $message->from("rodriguezwillian95@gmail.com","PriceAnalysis");
    
            });

        }
    }

}