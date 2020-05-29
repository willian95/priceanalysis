<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AdminEmailStoreRequest;
use App\Http\Requests\AdminEmailUpdateRequest;
use App\AdminEmail;

class AdminEmailController extends Controller
{
    
    function index(){
        return view("admin.emails.index");
    }

    function fetch($page = 1){

        try{
            $take = 20;
            $skip = ($page-1) * $take;

            $emails = AdminEmail::skip($skip)->take($take)->get();
            $emailsCount = AdminEmail::count();

            return response()->json(["success" => true, "emails" => $emails, "emailsCount" => $emailsCount]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }

    function store(AdminEmailStoreRequest $request){

        try{

            $adminEmail = new AdminEmail;
            $adminEmail->email = $request->email;
            $adminEmail->save();

            return response()->json(["success" => true, "msg" => "Email creado"]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }

    }

    function update(AdminEmailUpdateRequest $request){

        try{

            $adminEmail = AdminEmail::find($request->id);
            $adminEmail->email = $request->email;
            $adminEmail->save();

            return response()->json(["success" => true, "msg" => "Email actualizado"]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }

    }

    function delete(Request $request){

        try{

            $email = AdminEmail::find($request->id);
            $email->delete();

            return response()->json(["success" => true, "msg" => "Email eliminado"]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }

    }

    function fetchAll(){

        try{

            $categories = Category::all();
            return response()->json(["success" => true, "categories" => $categories]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }

}
