<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    public function products(){
        return $this->hasMany(OfferProduct::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function post(){
        return $this->belongsTo(Post::class);
    }

    public function offerPendingProducts(){
        return $this->hasMany(OfferPendingProduct::class);
    }

}
