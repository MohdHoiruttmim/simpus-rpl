<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkup;
use App\Models\Antrian;
use App\Http\Controllers\UserLogController;

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
        // ->get();
        // dd($checkup);
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'diagnosa' => 'required',
        ]);

        $checkup = Checkup::find($id);
        $checkup->diagnosa = $request->get('diagnosa');
        $checkup->save();

        $userLog = new UserLogController();
        $userLog->store(auth()->user()->id, 'Mengedit diagnosa');

        return redirect()->route('history');
    }


    /* ================================== USER FUNCTION ======================================================*/
    public function log()
    {
        $riwayat = Antrian::where('user_id', auth()->user()->id)
        ->where('status', 'selesai')
        ->get()
        ->reverse();
        // dd($riwayat);
        return view('checkup-log', 
        [
            'riwayat' => $riwayat
        ]);
    }
}
