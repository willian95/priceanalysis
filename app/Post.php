<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function products(){
        return $this->hasMany(PostProduct::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
