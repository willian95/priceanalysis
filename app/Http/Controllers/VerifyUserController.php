<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\ComercialInfo;
use App\Country;

class VerifyUserController extends Controller
{

    function index(){

        return view("admin.verifyUsers.index");

    }

    function fetch($page = 1){

        try{

            $skip = ($page-1) * 20;

            $users = User::skip($skip)->take(10)->where("verify_user", true)->where("is_verified", false)->get();
            $usersCount = User::where("verify_user", true)->where("is_verified", false)->count();

            return response()->json(["success" => true, "users" => $users, "usersCount" => $usersCount]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }

    public function show($id){

        try{

            $user = User::with("comercialInfo")->findOrFail($id);
            return view("admin.verifyUsers.show", ["user" => $user]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }

    public function countryFetch($id){

        try{

            $comercial = ComercialInfo::where("user_id", $id)->first();
            $countries = $comercial->countries_presence;
            //dd($countries);
            $countriesArray = explode(",", $countries);
            
            $countries = Country::whereIn("id", $countriesArray)->get();
            
            return response()->json(["success" => true, "countries" => $countries]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }

    function verify(Request $request, $id){

        try{

            $user = User::find($id);
            $user->is_verified = $request->verify;
            $user->update();

            return response()->json(["success" => true, "msg" => "Verificación actualizada"]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }

}
