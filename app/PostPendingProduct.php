<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostPendingProduct extends Model
{
    public function post(){
        return $this->belongsTo(Post::class);
    }

    public function offerPendingProduct(){
        return $this->hasOne(OfferPendingProduct::class);
    }

}
