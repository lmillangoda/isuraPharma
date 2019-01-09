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

    public function checkRole()
    {
        $user = Auth::user();
        $role = $user->role_id;
        if ($role == 4) {
            return true;
        } else {
            false;
        }
    }

    public function index()
    {
        $user = Auth::user();
        $role = $user->role_id;
        if ($this->checkRole()) {
            $pharmacist = User::where('role_id', 1)->get();
            $cashier = User::where('role_id', 2)->get();
            $branch = Branch::all();
            return view('employees.index', compact('pharmacist', 'cashier', 'branch', 'role'));
        } else {
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
        if ($this->checkRole()) {
            $user = Auth::user();
            $role = $user->role_id;
            $branch = Branch::all();
            return view('employees.create', compact('branch', 'role'));
        } else {
            return redirect()->route('home');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if ($this->checkRole()) {
            $user = Auth::user();
            $role = $user->role_id;
            $branch = Branch::all();
            $employee = User::find($id);
            return view('employees.create', compact('employee', 'branch', 'role'));
        } else {
            return redirect()->route('home');
        }

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

    public function empupdate(Request $request)
    {
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

            return redirect()->action('EmployeeController@index');
        } else {
            return redirect()->route('home');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->checkRole()) {
            User::find($id)->delete();
            return redirect()->route('employees.index');
        } else {
            return redirect()->route('home');
        }

    }


    protected function profile()
    {
        $user = Auth::user();
        $role = $user->role_id;
        if ($role != 3) {
            return view('admin_profile.profile', compact('user', 'role'));
        } else {
            return redirect()->route('home');

        }
    }

    public function cPassword(request $request)
    {
        $user = Auth::user();
        $role = $user->role_id;
        if ($role != 3) {
            $this->validate($request, [
                'old_password' => 'required|string|min:6',
                'password' => 'required|string|min:6|confirmed',
            ]);
            $user = Auth::user();
            $old_pass = $user->password;
            $new_pass = Hash::make($request['password']);
            if (Hash::check($request['old_password'], $old_pass)) {
                $user->password = $new_pass;
                $user->save();
                $user = Auth::user();
                $role = $user->role_ID;

                return view('admin_profile.profile', compact('user', 'role'));
            } else {
                return "Password Change Failed";
            }
        } else {
            return redirect()->route('home');
        }
    }


}
