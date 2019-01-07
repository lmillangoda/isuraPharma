<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Supplier;
use App\Bill;
use Carbon\Carbon;
use App\Product;

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
        $user = Auth::user();
        $role = $user->role_id;

        if($role == 1||$role == 2||$role == 4){
            $customers = User::where('role_id',3)->get()->count();
            $suppliers = Supplier::all()->count();
            $day = Carbon::today();
            $daily_sale = Bill::whereRaw('DATE(created_at) = ?', [$day])->get()->count();
            }
            return view('dashboards.admin',compact('customers','suppliers','daily_sale','role'));
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
      $this->validate($request, [
        'fname' => 'required|string|max:255',
        'mname' => 'required|string|max:255',
        'lname' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'tel' => 'required|string|min:10|max:10',
        'hno' => 'required|string|max:255',
        'town' => 'required|string|max:255',
        'password' => 'required|string|min:6|confirmed',
    ]);
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
