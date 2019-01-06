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
        if($role == 1){
            return view('dashboards.admin');
        }
        if($role == 2){
            return view('dashboards.admin');
        }
        if($role == 3){
            $products = Product::all();
            return view('home',compact('products'));
        }
        if($role == 4){
            return view('dashboards.admin');
        }
    }
}
