<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class StudentController extends Controller
{

    public function studentLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);
        $remember_me = true ?? $request->get('remember');
        if (Auth::guard('student')->attempt(['email' => $request->email, 'password' => $request->password], $remember_me)) {
            // TODO use named routes
            return redirect()->intended('/student');
        }
        return back()->withInput($request->only('email', 'remember'));
    }

}
