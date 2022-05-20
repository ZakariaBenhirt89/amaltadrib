<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;
use Hash;
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $modem = Admin::class;
    public function definition()
    {
        return [
            "username" => "Fatima",
            "email" => "AdminFatima@amaltadrib.com",
            "password" => Hash::make("Pass@1234"),
            "avatar" => "images/admin/avatar.png"
        ];
    }
}
