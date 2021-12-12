<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;


class AdminController extends Controller
{
        public function login(Request $request)
        {
            $request->validate([
                'email'   => 'required|email',
                'password' => 'required|min:6'
            ]);
            $remember_me = true ?? $request->get('remember');
            if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $remember_me)) {
                return redirect()->route("admin.home");
            }
            return back()->withInput($request->only('email', 'remember'));
        }
}
