<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkup;
use App\Models\Antrian;
use App\Http\Controllers\UserLogController;
use Illuminate\Support\Facades\DB;

class CheckupController extends Controller
{
    public function index(Request $request)
    {
        // if ($request->has('search') && $request->search != null) {
        //     // $riwayat = Checkup::where('diagnosa', 'like', "%".$request->search."%")
        //     // ->orWhere('created_at', 'like', "%".$request->search."%")
        //     // ->orderBy('created_at', 'desc')
        //     // ->paginate(10);
        //     $riwayat = DB::table('checkups')
        //     ->join('antrians', 'checkups.antrian_id', '=', 'antrians.id')
        //     ->select('checkups.*', 'antrians.*')
        //     ->where('antrians.nama', 'like', "%".$request->search."%")
        //     ->orWhere('antrians.poli', 'like', "%".$request->search."%")
        //     ->orderBy('checkups.created_at', 'desc')
        //     ->paginate(10);
        // } else {
        //     // $riwayat = Checkup::orderBy('created_at', 'desc')->paginate(10);
        //     $riwayat = DB::table('checkups')
        //     ->join('antrians', 'checkups.antrian_id', '=', 'antrians.id')
        //     ->select('checkups.*', 'antrians.*')
        //     ->orderBy('checkups.created_at', 'desc')
        //     ->paginate(10);
        // }
        $riwayat = Checkup::orderBy('created_at', 'desc')->paginate(10);
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
