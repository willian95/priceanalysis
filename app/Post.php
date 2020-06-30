<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{

    use SoftDeletes;

    public function products(){
        return $this->hasMany(PostProduct::class);
    }

    public function offers(){
        return $this->hasMany(Offer::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
