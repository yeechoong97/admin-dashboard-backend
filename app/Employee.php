<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = "employees";

    protected $fillable= [
        "first_name",
        "last_name",
        "companies_id",
        "email",
        "phone",
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
