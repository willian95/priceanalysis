<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UnitStoreRequest;
use App\Http\Requests\UnitUpdateRequest;
use App\Unit;
use App\ProductUnit;

class UnitController extends Controller
{
    
    function index(){

        return view("admin.units.index");

    }

    function fetch($page = 1){

        try{
            $take = 20;
            $skip = ($page-1) * $take;

            $units = Unit::skip($skip)->take($take)->orderBy('name', 'asc')->get();
            $unitsCount = Unit::count();

            return response()->json(["success" => true, "units" => $units, "unitsCount" => $unitsCount]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }

    function fetchAll(){

        try{

            $units = Unit::all();

            return response()->json(["success" => true, "units" => $units]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }

    function store(UnitStoreRequest $request){

        try{

            $unit = new Unit;
            $unit->name = $request->name;
            $unit->save();

            return response()->json(["success" => true, "msg" => "Unidad creada"]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }

    }

    function update(Request $request){

        try{

            $unit = Unit::find($request->id);
            $unit->name = $request->name;
            $unit->save();

            return response()->json(["success" => true, "msg" => "Unidad actualizada"]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }

    }

    function delete(Request $request){

        try{

            $unit = Unit::find($request->id);
            $unit->delete();

            return response()->json(["success" => true, "msg" => "Unidad eliminada"]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }

    }

    function productUnit($product_id){
        try{

            $units = ProductUnit::where('product_id', $product_id)->with("unit")->get();
            return response()->json(["success" => true, "units" => $units]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }
    }

}
