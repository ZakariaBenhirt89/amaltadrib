<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chef extends Model
{
    use HasFactory;
    protected $fillable = [
        "avatar",
        "fname",
        "lname",
        "birthday",
        "gender",
        "adress",
        "centers_id",
    ];
}
