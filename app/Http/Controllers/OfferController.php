<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Offer;
use App\OfferProduct;
use App\OfferPendingProduct;
use App\PostPendingProduct;
use App\PostProduct;

class OfferController extends Controller
{

    function index(){
        return view("user.myOffers.posts");
    }

    function fetchMyOffers($page = 1){

        try{

            $skip = ($page-1) * 20;

            $offers = Offer::with(['post' => function ($q) {
                $q->withTrashed();
            }])->where("user_id", \Auth::user()->id)->skip($skip)->groupBy("offers.post_id")->take(20)->orderBy('id', 'desc')->get();
            
            $offersCount = Offer::with(['post' => function ($q) {
                $q->withTrashed();
            }])->where("user_id", \Auth::user()->id)->groupBy("offers.post_id")->count();

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

            $offers = Offer::where("post_id", $id)->with(['products' => function ($q) {
                $q->withTrashed();
            }])->with("products.postProduct", "user")->where("user_id", \Auth::user()->id)->skip($skip)->take(20)->orderBy('sum', 'asc')->get();

            $offersCount = Offer::where("post_id", $id)->with(['products' => function ($q) {
                $q->withTrashed();
            }])->with("products.postProduct", "user")->where("user_id", \Auth::user()->id)->count();

            return response()->json(["success" => true, "offers" => $offers, "offersCount" => $offersCount]);
        
        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }

    function fetch($id, $page = 1){

        try{

            $skip = ($page-1) * 20;

            $offers = Offer::where("post_id", $id)->with(['products' => function ($q) {
                $q->withTrashed();
            }])->with("products.postProduct", "user", "offerPendingProducts", "OfferPendingProducts.postPendingProduct")->skip($skip)->take(20)->orderBy('sum', 'asc')->get();

            $offersCount = Offer::where("post_id", $id)->with(['products' => function ($q) {
                $q->withTrashed();
            }])->with("products.postProduct", "user", "offerPendingProducts", "OfferPendingProduct.postPendingProduct")->count();

            $bestPriceId = 0;
            $worstPriceId = 0;
            $midPriceId = 0;

            $index = 0;
            $statistics = Offer::where("post_id", $id)->with(['products' => function ($q) {
                $q->withTrashed();
            }])->with("products.postProduct", "user")->selectRaw("sum + shipping_cost as sum_cost, id")->orderBy('sum_cost', 'asc')->get();
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

            $productNoPrice = 0;
            foreach($request->offerProducts as $offerProductArr){
                if($offerProductArr["price"] == ""){
                    $productNoPrice++;
                }
            }

            if($productNoPrice == count($request->offerProducts)){
                return response()->json(["success" => false, "msg" => "Al menos uno de sus productos no tiene precio"]);
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
                $offerProduct->price = $offerProductArr["price"] ? $offerProductArr["price"] : 0;
                $offerProduct->save();

                $postProduct = PostProduct::find($offerProduct->post_product_id);

                $total = floatval($total) + floatval($offerProductArr["price"] * $postProduct->amount);

            }

            foreach($request->pendingOfferProduct as $pendingOfferProductArr){
                
                $pendingOfferProduct = new OfferPendingProduct;
                $pendingOfferProduct->offer_id = $offer->id;
                $pendingOfferProduct->post_pending_product_id = $pendingOfferProductArr["id"];
                $pendingOfferProduct->price = $pendingOfferProductArr["price"] ? $pendingOfferProductArr["price"] : 0;
                $pendingOfferProduct->save();

                $postPendingProduct = PostPendingProduct::find($pendingOfferProduct->post_pending_product_id);

                $total = floatval($total) + (floatval($pendingOfferProductArr["price"] * $postPendingProduct->amount));

            }

            $offer = Offer::find($offer->id);
            $offer->sum = $total;
            $offer->update();

            return response()->json(["success" => true, "msg" => "Oferta realizada"]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }

    }

    function update(Request $request){

        try{

            $productNoPrice = 0;
            foreach($request->offerProducts as $offerProductArr){
                if($offerProductArr["price"] == ""){
                    $productNoPrice++;
                }
            }

            if($productNoPrice == count($request->offerProducts)){
                return response()->json(["success" => false, "msg" => "Al menos uno de sus productos no tiene precio"]);
            }

            $offer = Offer::where("id", $request->offerId)->first();
            $offer->shipping_cost = $request->shippingCost;
            $offer->update();

            $total = 0;
            foreach($request->offerProducts as $offerProductArr){
                
                if(offerProduct::where("offer_id", $offer->id)->where("post_product_id", $offerProductArr["postProductId"])->count() > 0){

                    $offerProduct = offerProduct::where("offer_id", $offer->id)->where("post_product_id", $offerProductArr["postProductId"])->first();
                    $offerProduct->offer_id = $offer->id;
                    $offerProduct->post_product_id = $offerProductArr["postProductId"];
                    $offerProduct->price = $offerProductArr["price"] ? $offerProductArr["price"] : 0;
                    $offerProduct->update();

                    $total = floatval($total) + floatval($offerProductArr["price"]);

                }else{

                    $offerProduct = new offerProduct;
                    $offerProduct->offer_id = $offer->id;
                    $offerProduct->post_product_id = $offerProductArr["postProductId"];
                    $offerProduct->price = $offerProductArr["price"] ? $offerProductArr["price"] : 0;
                    $offerProduct->save();

                    $total = floatval($total) + floatval($offerProductArr["price"]);

                }
                

            }

            $offer = Offer::find($offer->id);
            $offer->sum = $total;
            $offer->update();

            return response()->json(["success" => true, "msg" => "Oferta actualizada"]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }

    }

    function edit($id){

        $post = Post::findOrFail($id);
        $products = Offer::with('products')->where("post_id", $id)->get();
  
        return view("user.myOffers.edit", ["post" => $post, "products" => $products]);

    }

}
