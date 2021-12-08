<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\public\ContactMessage;
use Response;
use Illuminate\Support\Facades\Mail;
class ContactController extends Controller
{
    public function index()
    {
        return view("public.contact");
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "email_or_phone" => "required",
            "message" => "required"
        ]);

        try {
            Mail::to("contact@amaltadrib.com")->send(new ContactMessage($request->all()));
            return redirect()->route('public.contact')->withSuccess(__('message.Message sent successfully'));
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors([__("message.Cannot send Message,please try again")])->withInput();
        }
    }
}
