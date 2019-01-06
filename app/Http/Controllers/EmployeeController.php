<?php

namespace App\Http\Controllers;

use App\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\User;
use DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function index()
    {
        $pharmacist = User::where('role_id',1)->get();
        $cashier = User::where('role_id',2)->get();
        $branch = Branch::all();
        return view('employees.index',compact('pharmacist','cashier','branch'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branch = Branch::all();
        return view('employees.create',compact('branch'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $branch = Branch::all();
        $employee = User::find($id);
        return view('employees.create',compact('employee','branch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function empupdate(Request $request)
    {
        $this->validate($request, [
            'fname' => 'required|string|max:255',
            'mname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'tel' => 'required|string|min:10|max:10',
            'hno' => 'required|string|max:255',
            'town' => 'required|string|max:255',
        ]);
            $user = User::where('id',$request->id)->first();

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
            
            return redirect()->action('EmployeeController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('employees.index');
    }
   
    protected function validator(request $request)
    {
        return Validator::make($request, [
            'old_password' => ['required','string','min:6'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }
    protected function profile()
    {
        $user = Auth::user();
        $role = $user->role_ID;
        return view('admin_profile.profile',compact('user','role'));
    }

    public function cPassword(request $request)
    {
        $user = Auth::user();
        $old_pass = $user->password;
        $new_pass =  Hash::make($request['password']);
        if (Hash::check( $request['old_password'], $old_pass)){
            $user->password = $new_pass;
            $user->save();
            $user = Auth::user();
            $role = $user->role_ID;
            return view('admin_profile.profile',compact('user','role'));
        }else{
            return "Password Change Failed"; 
        }
    }

}
