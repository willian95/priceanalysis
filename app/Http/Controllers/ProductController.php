<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Product;
use App\ProductUnit;

class ProductController extends Controller
{
    
    function index(){

        return view("admin.products.index");

    }

    function fetch($page = 1){

        try{
            $take = 20;
            $skip = ($page-1) * $take;

            $products = Product::skip($skip)->take($take)->orderBy('name', 'asc')->get();
            $productsCount = Product::count();

            return response()->json(["success" => true, "products" => $products, "productsCount" => $productsCount]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }

    function store(ProductStoreRequest $request){

        try{

            $name = strtoupper($request->name);
            $name = str_replace("Á", "A", $name);
            $name = str_replace("É", "E", $name);
            $name = str_replace("Í", "I", $name);
            $name = str_replace("Ó", "O", $name);
            $name = str_replace("Ú", "U", $name);

            $product = new Product;
            $product->name = $name;
            $product->save();

            foreach($request->units as $unit){

                $productUnit = new ProductUnit;
                $productUnit->product_id = $product->id;
                $productUnit->unit_id = $unit["id"];
                $productUnit->save();

            }

            return response()->json(["success" => true, "msg" => "Producto creado"]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }

    }

    function update(Request $request){

        try{

            $product = Product::find($request->id);
            $product->name = $request->name;
            $product->save();

            return response()->json(["success" => true, "msg" => "Producto actualizado"]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }

    }

    function delete(Request $request){

        try{

            $product = Product::find($request->id);
            $product->delete();

            return response()->json(["success" => true, "msg" => "Producto eliminado"]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }

    }

    function search(Request $request){

        try{

            $products = Product::where('name', "like", '%'.$request->search.'%')->take(5)->get();
            return response()->json(["success" => true, "products" => $products]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }

}