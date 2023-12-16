<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiCheckup extends Controller
{
    public function checkups()
    {
        $checkups = DB::table('antrians')
        ->select('*')
        ->join('checkups','checkups.antrian_id','=','antrians.id')
        ->get();

        return response()->json([
            'checkups' => $checkups,
        ], 200);
    }
}
