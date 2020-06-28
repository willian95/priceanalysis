<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostStoreRequest;
use App\Traits\AdminNotificationTrait;
use App\Post;
use App\PostProduct;
use App\Product;
use App\ProductUnit;
use App\Unit;

class PostController extends Controller
{   
    
    use AdminNotificationTrait;

    function index(){

        return view('user.post.post');

    }

    function show($code){

        $post = Post::with("products", "products.product")->where("code", $code)->first();
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

            $posts = Post::skip($skip)->take(20)->where("is_private", false)->orderBy("id", "desc")->get();
            $postsCount = Post::where("is_private", false)->count();

            return response()->json(["success" => true, "posts" => $posts, "postsCount" => $postsCount]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor"]);

        }

    }

    function store(PostStoreRequest $request){

        //dd($request->all());

        try{

            $post = new Post;
            $post->title = $request->title;
            $post->description = $request->description;
            $post->user_id = \Auth::user()->id;
            $post->request_shipping = $request->shippingCheck;
            
            if($request->type == "private")
                $post->is_private = true;
            
            $post->code = uniqid();
            $post->save();
            
            foreach($request->products as $product){

                $postProduct = new PostProduct;
                if($product["product_id"] != 0){

                    $postProduct->product_id = $product["product_id"];
                    $postProduct->unit_id = $product["unit_id"];
                    
                    $unit = Unit::find($product["unit_id"]);
                    $productModel = Product::find($product["product_id"]);
                    $postProduct->product = $productModel->name;
                    $postProduct->unit_name = $unit->name;

                }else{
                    
                    $postProduct->product = $product["displayName"];
                    $postProduct->unit_name = $product["unitName"];

                    $unitName = strtoupper($product["unitName"]);
                    $unitName = str_replace("Á", "A", $unitName);
                    $unitName = str_replace("É", "E", $unitName);
                    $unitName = str_replace("Í", "I", $unitName);
                    $unitName = str_replace("Ó", "O", $unitName);
                    $unitName = str_replace("Ú", "U", $unitName);

                    $productName = strtoupper($product["displayName"]);
                    $productName = str_replace("Á", "A", $productName);
                    $productName = str_replace("É", "E", $productName);
                    $productName = str_replace("Í", "I", $productName);
                    $productName = str_replace("Ó", "O", $productName);
                    $productName = str_replace("Ú", "U", $productName);


                    $unit = Unit::firstOrCreate(
                        ["name" => $unitName]
                    );

                    $productModel = Product::firstOrCreate(
                        ["name" => $productName]
                    );

                    if(ProductUnit::where("product_id", $productModel->id)->where("unit_id", $unit->id)->count() <= 0){

                        $productUnit = new ProductUnit;
                        $productUnit->product_id = $productModel->id;
                        $productUnit->unit_id = $unit->id;
                        $productUnit->save();

                    }

                    //$this->sendAdminEmail("El usuario: ".\Auth::user()->name." con el correo: ".\Auth::user()->email." ha agregado el articulo ".$productModel->name." con la unidad: ".$unit->name);

                    $postProduct->product_id = $productModel->id;
                    $postProduct->unit_id = $unit->id;


                }

                $postProduct->amount = $product["amount"];
                
                $postProduct->post_id = $post->id;
                $postProduct->save();

            }

            if($request->selectedUsers != null){
                foreach($request->selectedUsers as $users){
                    $this->sendEmail($users["name"], $users["email"], $post->code);
                }
            }

            return response()->json(["success" => true, "msg" => "Publicación realizada"]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }

    function sendEmail($name, $email, $id){
        $data = ["body" => "Hola ".$name.", ".\Auth::user()->name." quiere conocer tus precios, puedes ofertar en el siguiente link", "link" =>url('/')."/post/show/".$id];
        $subject = "Haz tu oferta";
        \Mail::send("emails.notification", $data, function($message) use ($email, $subject) {// se envía el email

            $message->to($email)->subject($subject);
            $message->from("rodriguezwillian95@gmail.com","PriceAnalysis");

        });

    }

    function myPosts(){

        return view("user.myPosts.myPosts");

    }

    function myPostsFetch($page = 1){

        try{

            $skip = ($page-1) * 20;

            $posts = Post::skip($skip)->take(10)->where('user_id', \Auth::user()->id)->get();
            $postsCount = Post::where('user_id', \Auth::user()->id)->count();

            return response()->json(["success" => true, "posts" => $posts, "postsCount" => $postsCount]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }

    }

    function showMyPost($id){

        try{

            $post = Post::findOrFail($id);

            return view("user.myPosts.showMyPost", ["post" => $post]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }


}
