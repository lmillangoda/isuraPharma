<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminUIController extends Controller
{
    public function adminDash(){
        return view('admin');
    }
}
