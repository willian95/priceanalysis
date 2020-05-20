<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterUserRequest;
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
            $user->telephone = $request->telephone;
            $user->password = bcrypt($request->password);
            $user->save();

            return response()->json(["success" => true, "msg" => "Te has registrado exitosamente"]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }

    }

}
