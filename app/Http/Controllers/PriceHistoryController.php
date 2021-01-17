<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OfferProduct;
use Carbon\Carbon;
use DB;

class PriceHistoryController extends Controller
{
    
    function index(){

        return view("admin.priceHistory.index");

    }

    function history(Request $request){

        $products = OfferProduct::whereHas("postProduct", function($q) use($request){

            $q->where("product_id", $request->productId)->where("unit_id", $request->selectedUnit);

        })->whereBetween("created_at", [$request->startDate, $request->endDate])
        ->get()
        ->groupBy(function($date) {
            return Carbon::parse($date->created_at)->format('d-m-Y'); // grouping by years
        });

        return response()->json($products);

    }

}
