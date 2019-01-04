<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
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
        return view('dashboards.admin');
    }

    protected function validator(request $request)
    {
        return Validator::make($request, [
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $request
     * @return \App\User
     */
    protected function employeeReg(request $request)
    {
      // dd($request);
        $user = User::create([
            'fname' => $request['fname'],
            'mname' => $request['mname'],
            'lname' => $request['lname'],
            'hNo' => $request['hno'],
            'add1' => $request['line1'],
            'add2' => $request['line2'],
            'town' => $request['town'],
            'tel' => $request['tel'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'branch_id' => $request['branch'],
            'role_id' => $request['role']
        ]);
        return redirect()->action('EmployeeController@create');
    }
}
