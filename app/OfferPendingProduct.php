<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfferPendingProduct extends Model
{
    public function offer(){
        return $this->belongsTo(Offer::class);
    }

    public function postPendingProduct(){
        return $this->belongsTo(PostPendingProduct::class);
    }
}
