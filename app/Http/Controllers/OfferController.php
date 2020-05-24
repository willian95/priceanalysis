<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Offer;
use App\OfferProduct;

class OfferController extends Controller
{

    function fetch($id, $page = 1){

        try{

            $skip = ($page-1) * 20;

            $offers = Offer::where("post_id", $id)->with('products', "products.postProduct", "user")->skip($skip)->take(10)->orderBy('sum', 'asc')->get();
            $offersCount = Offer::where("post_id", $id)->with('products')->count();

            $bestPriceId = 0;
            $worstPriceId = 0;
            $midPriceId = 0;

            $index = 0;
            $statistics = Offer::where("post_id", $id)->with('products', "products.postProduct", "user")->orderBy('sum', 'asc')->get();
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

            $offer = new Offer;
            $offer->user_id = \Auth::user()->id;
            $offer->post_id = $request->postId;
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
