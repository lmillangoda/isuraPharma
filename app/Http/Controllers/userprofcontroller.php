<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\propic;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class userprofcontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user2 = (Auth::user());
        return view("pages.propic",compact('user2'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $user2 = Auth::user();
        $id = $user2->id;
        $test = propic::where('id',$user2->id)->first();
        
        

            if(is_null($test)){
                $user = new propic;  
            }
            if(!is_null($test)){
                $user = propic::where('id',$id)->first();
            }
            if(Input::hasFile('image')){ 
            $file = Input::file('image');
            $user->name = $request->image->getClientOriginalName();
            $file->move(public_path().'/assets/img',$request->image->getClientOriginalName());
            $user->id = $user2->id;
            }
            $Nme = Input::get('name');
           if(!is_null($Nme)){
            $name = Input::get('name');
            $user2->name = $name;
           }
           $Eml = Input::get('email');
           if(!is_null($Eml)){
            $email = Input::get('email');
            $user2->email = $email;
           }
        $user->save();
        $user2->save();
        return redirect()->route('profile');
        } 
    
       
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        $user2 = Auth::user();
        $user = propic::where('id',$user2->id)->first();
        if(is_null($user)){
            return view('pages.profile');
        }
        return view("pages.profile",compact('user','user2'));
        }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
