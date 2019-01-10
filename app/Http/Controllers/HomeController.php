<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $role = $user->role_id;
        if ($role == 3) {
            $products = Product::all();
            $user = Auth::user();
            $verified = $user->email_verified_at;
            if(is_null($verified)){
                $verify = 'please verify your email address';
                return view('home', compact('products', 'role','verify'));
            }else{
                return view('home', compact('products','role'));
            }
            
        } else
            return redirect()->route('admin');
    }
}

