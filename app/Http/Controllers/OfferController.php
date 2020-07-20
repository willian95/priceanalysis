<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Offer;
use App\OfferProduct;

class OfferController extends Controller
{

    function index(){
        return view("user.myOffers.posts");
    }

    function fetchMyOffers($page = 1){

        try{

            $skip = ($page-1) * 20;

            $offers = Offer::with("post")->whereHas("post")->where("user_id", \Auth::user()->id)->skip($skip)->groupBy("offers.post_id")->take(20)->orderBy('id', 'desc')->get();
            $offersCount = Offer::with("post")->whereHas("post")->where("user_id", \Auth::user()->id)->groupBy("offers.post_id")->count();

            return response()->json(["success" => true, "posts" => $offers, "postsCount" => $offersCount]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }

    function show($id){

        $post = Post::where("id", $id)->first();
        return view("user.myOffers.showMyOffers", ["post" => $post]);

    }

    function showMyOffers($id, $page = 1){

        try{

            $skip = ($page-1) * 20;

            $offers = Offer::where("user_id", \Auth::user()->id)->where("post", $id)->skip($skip)->groupBy("offers.post_id")->take(20)->orderBy('id', 'desc')->get();
            $offersCount = Offer::where("user_id", \Auth::user()->id)->where("post", $id)->groupBy("offers.post_id")->count();

            return response()->json(["success" => true, "offers" => $offers, "offersCount" => $offersCount]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }

    function myOffersFetch($id, $page = 1){

        try{

            $skip = ($page-1) * 20;

            $offers = Offer::where("post_id", $id)->with('products', "products.postProduct", "user")->where("user_id", \Auth::user()->id)->skip($skip)->take(20)->orderBy('sum', 'asc')->get();
            $offersCount = Offer::where("post_id", $id)->with('products', "products.postProduct", "user")->where("user_id", \Auth::user()->id)->count();

            return response()->json(["success" => true, "offers" => $offers, "offersCount" => $offersCount]);
        
        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }

    function fetch($id, $page = 1){

        try{

            $skip = ($page-1) * 20;

            $offers = Offer::where("post_id", $id)->with('products', "products.postProduct", "user")->skip($skip)->take(20)->orderBy('sum', 'asc')->get();
            $offersCount = Offer::where("post_id", $id)->with('products', "products.postProduct", "user")->count();

            $bestPriceId = 0;
            $worstPriceId = 0;
            $midPriceId = 0;

            $index = 0;
            $statistics = Offer::where("post_id", $id)->with('products', "products.postProduct", "user")->selectRaw("sum + shipping_cost as sum_cost, id")->orderBy('sum_cost', 'asc')->get();
            //dd($statistics);
            foreach($statistics as $statistic){

                if($index == 0){
                    $bestPriceId = $statistic->id;
                }

                if($index == $offersCount - 1 && $offersCount > 1){
                    $worstPriceId = $statistic->id;
                }

                $index++;
            }

            

            return response()->json(["success" => true, "offers" => $offers, "offersCount" => $offersCount, "bestPriceId" => $bestPriceId, "midPriceId" => $midPriceId, "worstPriceId" => $worstPriceId]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }
    
    function store(Request $request){

        try{

            foreach($request->offerProducts as $offerProductArr){
                if($offerProductArr["price"] == ""){
                    return response()->json(["success" => false, "msg" => "Al menos uno de sus productos no tiene precio"]);
                }
            }

            $offer = new Offer;
            $offer->user_id = \Auth::user()->id;
            $offer->post_id = $request->postId;
            $offer->shipping_cost = $request->shippingCost;
            $offer->save();

            $total = 0;
            foreach($request->offerProducts as $offerProductArr){
                
                $offerProduct = new offerProduct;
                $offerProduct->offer_id = $offer->id;
                $offerProduct->post_product_id = $offerProductArr["postProductId"];
                $offerProduct->price = $offerProductArr["price"];
                $offerProduct->save();

                $total = floatval($total) + floatval($offerProductArr["price"]);

            }

            $offer = Offer::find($offer->id);
            $offer->sum = $total;
            $offer->update();

            return response()->json(["success" => true, "msg" => "Oferta realizada"]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }

    }

}
