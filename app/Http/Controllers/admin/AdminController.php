<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Admin;

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
            return back()->withErrors([__('message.email or password is not good, please verify and try again')])->withInput($request->only('email', 'remember'));
        }

        public function get()
        {
            $data = [
                "settings" => Auth::guard('admin')->user()
            ];
            return view("admin.settings",$data);
        }


        public function update(Request $request)
        {
            $request->validate([
                "password" => "required|min:6"
            ]);
            try {
                Admin::where("id",Auth::guard('admin')->user()->id)->update([
                    "password" => $request->input("password")
                ]);
                return redirect()->route("admin.profile");
            } catch (\Throwable $th) {
                return redirect()->back()->withErrors([$th->getMessage(),__("message.an unexpected error, please try again")])->withInput();
            }
        }

        public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
}
