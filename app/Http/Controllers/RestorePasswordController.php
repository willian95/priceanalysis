<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RestorePasswordRequest;
use App\Http\Requests\UpdatePasswordRequest;
use Illuminate\Support\Str;
use App\User;

class RestorePasswordController extends Controller
{
    
    function restorePassword(RestorePasswordRequest $request){

        try{

            $recoveryHash = Str::random(40);
            $user = User::where("email", $request->email)->first();
            $user->restore_code = $recoveryHash;
            $user->update();

            $data = ["link" =>url('/')."/change/password/".$recoveryHash];
            $subject = "Restablece tu contraseña";
            $email = $request->email;
            
            \Mail::send("emails.restorePassword", $data, function($message) use ($email, $subject) {// se envía el email

                $message->to($email)->subject($subject);
                $message->from(env("MAIL_FROM_ADDRESS"),env("MAIL_FROM_NAME"));

            });

            return response()->json(["success" => true, "msg" => "Correo enviado, revisa tu bandeja de entrada o spam"]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Algo salió mal", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }

    }

    function verify($recoveryHash){

        try{

            $user = User::where("restore_code", $recoveryHash)->firstOrFail();
            
            return view("user.passwordChange", ["hash" => $recoveryHash]);

        }catch(\Exception $e){
            
            dd($e);
        }

    }

    function update(UpdatePasswordRequest $request){

        try{
            $user = User::where("restore_code", $request->hash)->firstOrFail();
            $user->restore_code = null;
            $user->password = bcrypt($request->password);
            $user->update();

            return response()->json(["success" => true, "msg" => "Contraseña restablecida"]);
        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Usuario no encontrado"]);

        }

    }

}
