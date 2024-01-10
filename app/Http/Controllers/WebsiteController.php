<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    //
    public function arabic(Request $request){
        return view('website.arabic-index');
    }
}
