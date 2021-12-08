<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class StudentController extends Controller
{

    public function login(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required',
            'password' => 'required|min:6'
        ]);
        $remember_me = true ?? $request->get('remember');
        if (Auth::guard('student')->attempt(['email' => $request->email, 'password' => $request->password], $remember_me)) {
            return redirect()->route('student.home');
        }
        return back()->withErrors([__('message.email or password is not good, please verify and try again')])->withInput($request->only('email', 'remember'));
    }

}
