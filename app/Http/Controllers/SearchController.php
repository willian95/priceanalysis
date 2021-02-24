<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostProduct;
use App\Post;

class SearchController extends Controller
{

    function searchView($search){

        return view("search", ["search" => $search]);

    }

    function search(Request $request){

        try{

            $postId = [];
            $dataAmount = 20;
            $skip = ($request->page-1) * $dataAmount;

            $words = $this->splitWords($request);

            $posts = Post::where(function ($query) use($words) {
                for ($i = 0; $i < count($words); $i++){
                    if($words[$i] != ""){
                        $query->orWhere('description', "like", "%".$words[$i]."%");
                        $query->orWhere('title', "like", "%".$words[$i]."%");
                    }
                }      
            })->get();

            $postProducts = PostProduct::where(function ($query) use($words) {
                for ($i = 0; $i < count($words); $i++){
                    if($words[$i] != ""){
                        $query->where('product', "like", "%".$words[$i]."%");
                    }
                }      
            })->get();

            foreach($posts as $result){
                array_push($postId, $result->id);
            }

            foreach($postProducts as $result){
                array_push($postId, $result->post_id);
            }

            $posts = array_reverse($postId);
            $posts = array_count_values($posts);
            $postsCount = count($posts);
            $postId = [];
            foreach($posts as $key => $value){

                $postId[] = [
                    "id" => $key,
                    "amount" => $value
                ];

            }

            usort($postId, function ($item1, $item2) {
                return $item2['amount'] <=> $item1['amount'];
            });

            $posts = [];
            $skipIndex = 0;
            $takeIndex = 0;
           
            foreach($postId as $post){

                if($skipIndex >= $skip && $takeIndex < $dataAmount){
                    
                    array_push($posts, $post["id"]);

                    $takeIndex++;
                }
                
                $skipIndex++;
                
            }

            $postsResults = [];
            foreach($posts as $key){

                $postModel = Post::where("id", $key)->with("user")->first(); 

                $postsResults[] = [
                    $postModel
                ];

            }

            return response()->json(["success" => true, "posts" => $postsResults, "postsCount" => $postsCount, "dataAmount" => $dataAmount]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }

    }

    function splitWords($request){

        $words = explode(' ',strtolower($request->search)); // coloco cada palabra en un espacio del array
        $wordsToDelete = array('de', "y", "la");

        $words = array_values(array_diff($words,$wordsToDelete)); // Elimino todas las coincidencias de las wordsToDelete

        return $words;
    }

}
