<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostStoreRequest;
use App\Post;
use App\PostProduct;

class PostController extends Controller
{
    
    function index(){

        return view('user.post.post');

    }

    function show($id){

        $post = Post::with("products")->findOrFail($id);
        return view("user.post.show", ["post" => $post]);

    }

    function products($id){

        try{

            $products = PostProduct::where("post_id", $id)->get();
            return response()->json(["success" => true, "products" => $products]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Error en el servidor"]);
        }

    }

    function fetch($page = 1){

        try{

            $skip = ($page-1) * 20;

            $posts = Post::skip($skip)->take(10)->get();
            $postsCount = Post::count();

            return response()->json(["success" => true, "posts" => $posts, "postsCount" => $postsCount]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor"]);

        }

    }

    function store(PostStoreRequest $request){

        try{

            $post = new Post;
            $post->title = $request->title;
            $post->description = $request->description;
            $post->save();

            foreach($request->products as $product){

                $postProduct = new PostProduct;
                $postProduct->product = $product["name"];
                $postProduct->amount = $product["amount"];
                $postProduct->post_id = $post->id;
                $postProduct->save();

            }

            return response()->json(["success" => true, "msg" => "Publicación realizada"]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }

}
