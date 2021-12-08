<?php

namespace App\Helpers;

use Auth;



class AuthHelper {
    static function getGuard(){
        if(Auth::guard('admin')->check())
            {
                return "admin";
            }
        if(Auth::guard('student')->check())
            {
                return "student";
            }
        return null;
    }
    static function loggedUser(){
        $role = AuthHelper::getGuard();
        if($role == null) return null;
        return Auth::guard($role)->user();
    }
}
