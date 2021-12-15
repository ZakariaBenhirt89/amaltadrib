<?php

namespace App\Http\Controllers\frontpublic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InformationsBankController extends Controller
{
    public function index()
    {
        return view("public.informations-bank");
    }
}
