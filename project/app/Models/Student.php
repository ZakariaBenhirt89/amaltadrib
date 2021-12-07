<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Student extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'avatar',
        'fname',
        'lname',
        'phone',
        'birthday',
        'level',
        'gardian_number',
        'family_situation',
        'number_of_children',
        'cin_number',
        'adress',
        'email',
        'password',
        'more_details',
    ];

    protected $hidden = [
        'password'
    ];

}
