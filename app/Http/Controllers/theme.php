<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class theme extends Controller
{
    public function setdark(Request $request)
    {
        $request->session()->put('theme','sidebar dark_sidebar');
        return view('home');
    }
    public function setlight(Request $request)
    {
        $request->session()->put('theme','sidebar');
        return view('home');
    }
}
