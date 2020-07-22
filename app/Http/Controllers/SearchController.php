<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class SearchController extends Controller
{
    function search(Request $request){

        try{

            $post = Post::where("code", $request->searchString)->first();

            if($post){

                return response()->json(["success" => true, "code" => $post->code]);

            }else{
                return response()->json(["success" => false, "msg" => "Publicación no encontrada"]); 
            }

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }

    }
}
