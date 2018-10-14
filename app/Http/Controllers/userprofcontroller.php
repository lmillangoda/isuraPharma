<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\propic;
use App\Product;
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
        $user2 = Auth::user();
        $id = 0;
        $user = propic::where('id',$user2->id)->first();
        if(is_null($user)){
        $user = propic::where('id',$id)->first();
        }
        if(is_null($user)){
            return view('pages.propic',compact('user','user2'));
        }
        return view("pages.propic",compact('user','user2'));
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
        $test = propic::where('id',$id)->first();
        
        
            if(is_null($test)){
                $user = new propic;  
            }
            if(!is_null($test)){
                $user = propic::where('id',$id)->first();
            }
            $pic = $request->image;
            if(!is_null($pic)){   
                $file = Input::file('image');
                $file->move(public_path().'/assets/img',$request->image->getClientOriginalName());
                $user->name = $request->image->getClientOriginalName();
                $user->id = $user2->id ;
                $user->save();
            }
            $Nme = Input::get('input-name');
           if(!is_null($Nme)){
            $name = Input::get('input-name');
            $user2->name = $name;
           }
           $Eml = Input::get('input-email');
           if(!is_null($Eml)){
            $email = Input::get('input-email');
            $user2->email = $email;
           }
           $tel =  Input::get('input-telno');
           if(!is_null($tel)){
            $tel = Input::get('input-telno');
            $user2->tel_no = $tel;
           }
        
        $user2->save();
        return redirect()->route('propic');
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
        $id = 0;
        $user = propic::where('id',$user2->id)->first();
        if(is_null($user)){
        $user = propic::where('id',$id)->first();
        }
        if(is_null($user)){
            return view('pages.profile',compact('user','user2'));
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
