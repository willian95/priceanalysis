<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{

    protected $fillable = ["name"];

    public function productUnits(){
        return $this->hasMany(ProductUnit::class);
    }

    
}
