<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class pagescontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function messages(){
        return view('pages.messages');
    }

    public function profile(){
        return view('pages.profile');
    }
}
