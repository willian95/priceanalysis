<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComercialInfo extends Model
{
    protected $fillable = [
        "user_id",
        "products",
        "opening",
        "employees_amount",
        "men_employees_amount",
        "women_employees_amount",
        "women_leadership_amount",
        "countries_presence",
        "contact_person",
        "phone_number",
        "main_clients",
        "export",
        "import",
        "national_made",
        "related_activities"
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
