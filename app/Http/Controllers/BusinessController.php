<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class BusinessController extends Controller
{
    function index(){
        return view('businesses');
    }
    
    function fetch($page = 1){

        try{
            $take = 10;
            $skip = ($page-1) * $take;

            $categories = Category::with('users')->skip($skip)->take($take)->orderBy('name', "asc")->get();
            $categoriesCount = Category::with('users')->count();

            return response()->json(["success" => true, "categories" => $categories, "categoriesCount" => $categoriesCount]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }

    }


}
