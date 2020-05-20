<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfferProduct extends Model
{
    public function offer(){
        return $this->belongsTo(Offer::class);
    }

    public function postProduct(){
        return $this->belongsTo(PostProduct::class);
    }
}
