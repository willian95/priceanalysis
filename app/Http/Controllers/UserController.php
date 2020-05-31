<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use App\ComercialInfo;
use App\Country;

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

    function updateGeneralData(Request $request){

        try{

            $user = User::find(\Auth::user()->id);
            $user->rif = $request->rif;
            $user->country_id= $request->countryId;
            $user->fiscal_address = $request->fiscalAddress;
            $user->delivery_address = $request->deliveryAddress;
            $user->update();

            return response()->json(["success" => true, "msg" => "Información actualizada"]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }

    function updateCommercialActivity(Request $request){

        try{

            //dd($request->all());

            $user = User::find(\Auth::user()->id);
            $user->category_id = $request->categoryId;
            $user->update();
            
            $countries = "";
            foreach($request->comercialCountries as $country){
                $countries .= $country["id"].",";
            }

            ComercialInfo::updateOrCreate(
                ["user_id" => \Auth::user()->id],
                [
                    "products" => $request->products,
                    "opening" => $request->startDate,
                    "employees_amount" => $request->employeeAmount,
                    "men_employees_amount" => $request->maleEmployeeAmount,
                    "women_employees_amount" => $request->femaleEmployeeAmount,
                    "women_leadership_amount" => $request->femaleLeadershipAmount,
                    "countries_presence" => $countries 

                ]
            );            

            return response()->json(["success" => true, "msg" => "Información comercial actualizada"]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }

    function updateContactInfo(Request $request){

        try{

            ComercialInfo::updateOrCreate(
                ["user_id" => \Auth::user()->id],
                [
                    "contact_person" => $request->contactPerson,
                    "phone_number" => $request->phoneNumber

                ]
            ); 

            return response()->json(["success" => true, "msg" => "Información de contacto actualizada"]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }

    function updateOtherInfo(Request $request){

        try{
            
            ComercialInfo::updateOrCreate(
                ["user_id" => \Auth::user()->id],
                [
                    "main_clients" => $request->mainClients,
                    "export" => $request->export,
                    "import" => $request->import,
                    "national_made" => $request->nationalMade,
                    "related_activities" => $request->relatedActivities

                ]
            ); 

            return response()->json(["success" => true, "msg" => "Información de complementaria actualizada"]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }

    function fetchComercialCountries(){

        try{

            $comercial = ComercialInfo::where("user_id", \Auth::user()->id)->first();
            $countries = $comercial->countries_presence;
            //dd($countries);
            $countriesArray = explode(",", $countries);
            
            $countries = Country::whereIn("id", $countriesArray)->get();
            
            return response()->json(["success" => true, "countries" => $countries]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }

    function updateVerifyMyUser(Request $request){

        try{

            $user = User::find(\Auth::user()->id);
            $user->verify_user = $request->verify;
            $user->update();

            $msg = "";
            if($request->verify == true){
                
                $msg = "Será notificado del estado de su verificación";
            
            }else{

                $msg = "Gracias por su tiempo";

            }
            

            return response()->json(["success" => true, "msg" => $msg]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }

}
