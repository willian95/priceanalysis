<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;

class UserController extends Controller
{
    
    function index(){
        return view("admin.users.index");
    }

    function fetch($page = 2){

        try{    

            $take = 20;
            $skip = ($page-1) * $take;

            $users = User::skip($skip)->take($take)->where("role_id", 2)->get();
            $usersCount = User::count();

            return response()->json(["success" => true, "users" => $users, "usersCount" => $usersCount]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }

    function confirmRif(Request $request){

        try{

            $user = User::find($request->id);
            $user->rif_verified_at = Carbon::now();
            $user->update();

            return response()->json(["success" => true, "msg" => "Rif confirmado"]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }


}
