<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkup;
use App\Models\Antrian;

class CheckupController extends Controller
{
    public function index()
    {
      $riwayat = Checkup::all()->reverse();
      return view('checkup', 
      [
        'riwayat' => $riwayat
      ]);
    }

    public function show($id)
    {
        $checkup = Checkup::find($id);
        return view('checkup-detail', 
        [
          'riwayat' => $checkup
        ]);
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'diagnosa' => 'required',
        ]);

        Checkup::create([
            'diagnosa' => $request->get('diagnosa'),
            'antrian_id' => $id,
        ]);

        $antrian = Antrian::find($id);
        $antrian->status = 'selesai';
        $antrian->save();
        // return redirect()->route('antrian')->with('success', 'Checkup added successfully.');
        return redirect()->route('antrian');
    }


    /* ================================== USER FUNCTION ======================================================*/
    public function log()
    {
        $riwayat = Antrian::where('user_id', auth()->user()->id)
        ->get()
        ->reverse();
        // dd($riwayat);
        return view('checkup-log', 
        [
            'riwayat' => $riwayat
        ]);
    }
}
