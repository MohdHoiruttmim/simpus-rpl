<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request) {
        if ($request->has('nama')) {
            $users = User::where('name', 'LIKE', '%'.$request->nama.'%')->get();
        } else {
            $users = User::all();
        }

        // $users = User::all();
        return view('laravel-examples/user-management', 
        [
            'users' => $users
        ]);
    }

    public function store(Request $request) {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'role' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'role' => strtolower($request->role),
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('user-management');
    }
}
