<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pagescontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function profile(){
        return view('pages.profile');
    }

    public function messages(){
        return view('pages.messages');
    }
}
