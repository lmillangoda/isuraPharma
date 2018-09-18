<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pagescontroller extends Controller
{
<<<<<<< HEAD
    public function __constructer()
    {
      $this->middleware('auth:web');
=======
    public function __construct()
    {
        $this->middleware('auth:web');
>>>>>>> 7d6cd00cc7437529ab25a9982dd2fc3d65d03e53
    }

    public function messages(){
        return view('pages.messages');
    }

    public function profile(){
        return view('pages.profile');
    }
}
