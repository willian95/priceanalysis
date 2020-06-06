<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterUserRequest;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\User;

class RegisterController extends Controller
{
    function index(){
        return view('user.register');
    }

    function register(RegisterUserRequest $request){

        try{

            $user = new User;
            $user->name = $request->name;
            $user->company_name = $request->businessName;
            $user->email = $request->email;
            $user->rif = $request->rif;
            $user->telephone = $request->telephone;
            $user->password = bcrypt($request->password);
            $user->register_code = Str::random(40);
            $user->save();

            $this->sendEmail($user->email, $user->register_code);

            return response()->json(["success" => true, "msg" => "Te has registrado exitosamente"]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }

    }

    function sendEmail($email, $code){
        
        $data = ["body" => "Para validar tu correo haz click en el siguiente enlace", "link" =>url('/')."/validate/account/".$code];
        $subject = "Validar tu correo";
        \Mail::send("emails.register", $data, function($message) use ($email, $subject) {// se envía el email

            $message->to($email)->subject($subject);
            $message->from("rodriguezwillian95@gmail.com","PriceAnalysis");

        });

    }

    function validateAccount($code){

        try{

            $user = User::where("register_code", $code)->first();
            $user->email_verified_at = Carbon::now();
            $user->update();

            Auth::loginUsingId($user->id, true);

            return redirect()->to("/");

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }

}
