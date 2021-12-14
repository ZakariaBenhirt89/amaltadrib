<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Hash;
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "username" => "Admin Amal tabrib",
            "email" => "admin@amaltadrib.com",
            "password" => Hash::make("pass1234"),
            "avatar" => "images/admin/avatar.png",
        ];
    }
}
