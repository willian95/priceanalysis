<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostProduct extends Model
{
    public function post(){
        return $this->belongsTo(Post::class);
    }

    public function offerProduct(){
        return $this->hasOne(PostProduct::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }


}
