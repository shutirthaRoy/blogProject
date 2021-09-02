<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutContactMeController extends Controller{
    
    public function aboutMe() {
        return view('about.me');
    } 

    public function contact() {
        return view('about.contact');
    }
}
