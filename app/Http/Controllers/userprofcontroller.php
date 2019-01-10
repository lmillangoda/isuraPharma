<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\propic;
use App\Product;
use App\Branch;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class userprofcontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function checkRole()
    {
        $user = Auth::user();
        $role = $user->role_id;
        if ($role == 3) {
            return true;
        } else {
            false;
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if($this->checkRole()){
            $branch = Branch::all();
            $userprof = Auth::user();
            return view('customer.profile', compact('userprof','branch'));
        }else{
            return redirect()->route('home');
        }
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($this->checkRole()){
            if ($this->checkRole()) {
                $this->validate($request, [
                    'fname' => 'required|string|max:255',
                    'mname' => 'required|string|max:255',
                    'lname' => 'required|string|max:255',
                    'email' => 'required|string|email|max:255',
                    'tel' => 'required|string|min:10|max:10',
                    'hno' => 'required|string|max:255',
                    'town' => 'required|string|max:255',
                ]);
                $user = User::where('id', $request->id)->first();
    
                $user->fName = $request['fname'];
                $user->mname = $request['mname'];
                $user->lname = $request['lname'];
                $user->hNo = $request['hno'];
                $user->add1 = $request['line1'];
                $user->add2 = $request['line2'];
                $user->town = $request['town'];
                $user->tel = $request['tel'];
                $user->email = $request['email'];
                $user->branch_id = $request['branch'];
                $user->role_id = $request['role'];
    
                $user->save();
    
                return redirect()->route('profile')->with('update', 'User Details updated Successfully!');
            } else {
                return redirect()->route('home');
            }
        }else{
            return redirect()->route('home');
        }
        
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        if($this->checkRole()){
            $user = Auth::user();
            return view("customer.profile", compact('user'));
        }else{
            return redirect()->route('home');
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
