<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserLog;
use App\Http\Controllers\UserLogController;

class SessionsController extends Controller
{
    public function create()
    {
        return view('session.login-session');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email'=>'required|email',
            'password'=>'required' 
        ]);

        if(Auth::attempt($attributes))
        {
            session()->regenerate();
            $userLog = new UserLogController();
            $userLog->store(auth()->user()->id, 'Melakukan login');
            // return redirect('dashboard')->with(['success'=>'You are logged in.']);
            return redirect('/redirectAuthenticatedUsers');
        }
        else{

            return back()->withErrors(['email'=>'Email or password invalid.']);
        }
    }
    
    public function destroy()
    {
        $userLog = new UserLogController();
        $userLog->store(auth()->user()->id, 'Melakukan logout');
        Auth::logout();
        // return redirect('/login')->with(['success'=>'You\'ve been logged out.']);
        return redirect('/login');
    }
}
