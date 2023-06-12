<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
}
