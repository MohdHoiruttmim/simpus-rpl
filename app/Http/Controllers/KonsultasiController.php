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
        $konsultasi = Konsultasi::where('status', 'menunggu')->get();
        return $konsultasi;
    }
}
