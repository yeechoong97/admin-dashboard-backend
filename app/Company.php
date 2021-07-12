<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = "companies";

    protected $fillable = [
        "name",
        "email",
        "logo",
        "website_url",
    ];

    public function employee(){
        return $this->hasMany(Employee::class);
    }
}
