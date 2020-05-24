<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryStoreRequest;
use App\Category;

class CategoryController extends Controller
{
    
    function index(){
        return view("admin.category.index");
    }

    function fetch($page = 1){

        try{
            $take = 20;
            $skip = ($page-1) * $take;

            $categories = Category::skip($skip)->take($take)->orderBy('name', 'asc')->get();
            $categoriesCount = Category::count();

            return response()->json(["success" => true, "categories" => $categories, "categoriesCount" => $categoriesCount]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }

    function store(CategoryStoreRequest $request){

        try{

            $category = new Category;
            $category->name = $request->name;
            $category->save();

            return response()->json(["success" => true, "msg" => "Categoría creada"]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }

    }

    function update(Request $request){

        try{

            $category = Category::find($request->id);
            $category->name = $request->name;
            $category->save();

            return response()->json(["success" => true, "msg" => "Categoría actualizada"]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }

    }

    function delete(Request $request){

        try{

            $category = Category::find($request->id);
            $category->delete();

            return response()->json(["success" => true, "msg" => "Categoría eliminada"]);

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
