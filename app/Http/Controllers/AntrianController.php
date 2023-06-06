<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Antrian;
use Carbon\Carbon;

class AntrianController extends Controller
{
    public function index()
    {
        $antrians = Antrian::where('status', 'menunggu')
        ->get()
        ->reverse();
        return view('antrian', 
        [
            'antrians' => $antrians
        ]);
    }

    public function index_user()
    {
        $riwayat = Antrian::where('user_id', auth()->user()->id)
        ->get()
        ->reverse()
        ->take(3);

        return view('checkup-register', 
        [
            'riwayat' => $riwayat
        ]);
    }

    public function store(Request $resquest)
    {
        // $resquest->validate([
        //     'nama' => 'required',
        //     'alamat' => 'required',
        //     'no_hp' => 'required'
        // ]);
        $date = Carbon::now();
        $formattedDate = $date->format('d F Y, H:i:s');

        Antrian::create([
            'nama' => $resquest->nama,
            'nik' => $resquest->nik,
            'status' => 'menunggu',
            'poli' => $resquest->poli,
            'alamat' => $resquest->alamat,
            'no_telp' => $resquest->no_telp,
            'no_bpjs' => ($resquest->no_bpjs) ? $resquest->no_bpjs : null,
            'tanggal' => $formattedDate,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('checkup-register');
    }

    public function show($id){
        $antrian = Antrian::find($id);

        return view('antrian-detail', [
            'antrian' => $antrian
        ]);
    }

    public function card($id){
        $antrian = Antrian::find($id);

        return view('antrian-card', [
            'antrian' => $antrian
        ]);
    }

    public function update(Request $request, $id)
    {
        $antrian = Antrian::find($id);
        $antrian->status = $request->status;
        $antrian->save();

        return redirect()->route('dashboard');
    }

    public function destroy($id)
    {
        $antrian = Antrian::find($id);
        $antrian->delete();

        return redirect()->route('dashboard');
    }
}
