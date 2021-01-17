<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\User;

class LoginController extends Controller
{
    
    function index(){
        return view('user.login');
    }

    function login(LoginRequest $request){

        try{    

            $credentials = $request->only('email', 'password');
            $user = User::where("email", $request->email)->first();

            if($user){

                if($user->email_verified_at == null){
                    return response()->json(["success" => false, "msg" => "Debe validar su correo para continuar"]);
                }

                if (Auth::attempt($credentials)) {

                    return response()->json(["success" => true, "msg" => "Te has logueado", "role_id" => Auth::user()->role_id]);
                 }

            }

            

            return response()->json(["success" => false, "msg" => "Usuario no encontrado"]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }

}
