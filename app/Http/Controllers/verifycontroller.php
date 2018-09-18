<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class verifycontroller extends Controller
{
    public function verify($token){
        $user = User::where('token',$token)->firstOrFail();
        $user->token=null;
        $user->email_verified_at=date('Y-m-d H:i:s');
        $user->save();//verify the user
                
            return redirect()
                ->route('home')
                ->with('success','account verified!');

    }
}
