<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pagescontroller extends Controller
{
    public function profile(){
        return view('pages.profile');
    }

    public function messages(){
        return view('pages.messages');
    }
}
