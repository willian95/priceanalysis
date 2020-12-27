<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{

    use SoftDeletes;
    protected $fillable = ["name"];

    public function productUnits(){
        return $this->hasMany(ProductUnit::class);
    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

}
