<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BrandStoreRequest;
use App\Brand;

class BrandController extends Controller
{
    
    function index(){
        return view("admin.brands.index");
    }

    function fetch($page = 1){

        try{
            $take = 20;
            $skip = ($page-1) * $take;

            $brands = Brand::skip($skip)->take($take)->orderBy('name', 'asc')->get();
            $brandsCount = Brand::count();

            return response()->json(["success" => true, "brands" => $brands, "brandsCount" => $brandsCount]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }

    function store(BrandStoreRequest $request){

        try{

            $brand = new Brand;
            $brand->name = strtoupper($request->name);
            $brand->save();

            return response()->json(["success" => true, "msg" => "Marca creada"]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }

    }

    function update(Request $request){

        try{

            $brand = Brand::find($request->id);
            $brand->name = strtoupper($request->name);
            $brand->save();

            return response()->json(["success" => true, "msg" => "Marca actualizada"]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }

    }

    function delete(Request $request){

        try{

            $brand = Brand::find($request->id);
            $brand->delete();

            return response()->json(["success" => true, "msg" => "Marca eliminada"]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }

    }

    function adminSearch(Request $request){

        try{

            $brands = Brand::where('name', "like", '%'.$request->search.'%')->orderBy("name", "asc")->take(20)->get();
            return response()->json(["success" => true, "brands" => $brands]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }

    function fetchAll(){

        try{

            $brands = Brand::all();
            return response()->json(["success" => true, "brands" => $brands]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }

}
