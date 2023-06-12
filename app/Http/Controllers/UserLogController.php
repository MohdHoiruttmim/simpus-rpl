<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserLog;

class UserLogController extends Controller
{
    public function index()
    {
        $userLog = UserLog::all()
        ->take(10)
        ->reverse();
        return view('log', 
        [
            'userLog' => $userLog,
        ]);
    }

    public function store($id, $action)
    {
        UserLog::create([
            'user_id' => $id,
            'action' => $action,
        ]);
    }
}
