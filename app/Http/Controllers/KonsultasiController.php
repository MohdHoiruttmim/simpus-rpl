<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Konsultasi;
use App\Http\Controllers\UserLogController;

class KonsultasiController extends Controller
{
    public function store(Request $request)
    {
        Konsultasi::create([
            'nama' => $request->nama,
            'poli' => $request->poli,
            'keluhan' => $request->keluhan,
            'status' => 'menunggu',
            'tanggal_konsul' => $request->tanggal,
            'user_id' => auth()->user()->id,
        ]);

        $userLog = new UserLogController();
        $userLog->store(auth()->user()->id, 'Membuat konsultasi baru');

        return redirect()->route('checkup-register');
    }

    public function index()
    {
        // $konsultasi = Konsultasi::where('status', 'menunggu')->get();
        $konsultasi = Konsultasi::all();
        return $konsultasi;
    }

    public function show($id)
    {
        $konsultasi = Konsultasi::where('user_id', auth()->user()->id)
        ->get()
        ->reverse()
        ->take(3);
        return $konsultasi;
    }

    public function patch($id)
    {
        $konsultasi = Konsultasi::find($id);
        $konsultasi->status = 'disetujui';
        $konsultasi->save();

        $userLog = new UserLogController();
        $userLog->store(auth()->user()->id, 'Mengubah status konsultasi');

        return redirect()->route('antrian');
    }

    public function destroy($id)
    {
        $konsultasi = Konsultasi::find($id);
        $konsultasi->delete();

        $userLog = new UserLogController();
        $userLog->store(auth()->user()->id, 'Menghapus konsultasi');

        return redirect()->route('antrian');
    }
}
