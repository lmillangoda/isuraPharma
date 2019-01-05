<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
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
            'fname' => ['required', 'string', 'max:255'],
            'mname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'tel' => ['required', 'string', 'min:10','max:10'],
            'hno' => ['required', 'string', 'max:255'],
            'town' => ['required','string','max:255'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
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
    protected function profile()
    {
        $user = Auth::user();
        $role = $user->role_ID;
        return view('admin_profile.profile',compact('user','role'));
    }
}
