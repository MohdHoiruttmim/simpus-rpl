<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Antrian;
use Carbon\Carbon;
use App\Http\Controllers\UserLogController;
use App\Http\Controllers\KonsultasiController;

class AntrianController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search') && $request->search != null) {
            $antrians = Antrian::where('nama', 'like', "%".$request->search."%")
            ->orWhere('nik', 'like', "%".$request->search."%")
            ->orWhere('no_telp', 'like', "%".$request->search."%")
            ->orWhere('no_bpjs', 'like', "%".$request->search."%")
            ->orWhere('poli', 'like', "%".$request->search."%")
            ->orWhere('alamat', 'like', "%".$request->search."%")
            ->orWhere('tanggal', 'like', "%".$request->search."%")
            ->orWhere('status', 'like', "%".$request->search."%")
            ->orderBy('created_at', 'desc')
            ->get();
        } else {
            $antrians = Antrian::where('status', 'menunggu')
            ->get();
        }
        // $antrians = Antrian::where('status', 'menunggu')
        // ->get();

        $konsultasi = new KonsultasiController();
        $konsultasi = $konsultasi->index();
        return view('antrian', 
        [
            'antrians' => $antrians,
            'konsultasi' => $konsultasi
        ]);
    }

    public function index_user()
    {
        $antrian = Antrian::where('status', '=', 'menunggu')->count();
        $riwayat = Antrian::where('user_id', auth()->user()->id)
        ->get()
        ->reverse()
        ->take(3);

        return view('checkup-register', 
        [
            'riwayat' => $riwayat,
            'antrian' => $antrian,
        ]);
    }

    public function store_qr(Request $request)
    {
        dd($request->all());
    }

    public function store(Request $request)
    {
        $date = Carbon::now();
        $formattedDate = $date->format('d F Y, H:i:s');

        Antrian::create([
            'nama' => $request->antrian,
            // 'nik' => $resquest->nik,
            'status' => 'menunggu',
            'poli' => $request->poli,
            // 'alamat' => $resquest->alamat,
            // 'no_telp' => $resquest->no_telp,
            // 'no_bpjs' => ($resquest->no_bpjs) ? $resquest->no_bpjs : null,
            'tanggal' => $formattedDate,
            'user_id' => $request->id_user,
        ]);

        $log = new UserLogController();
        $log->store(auth()->user()->id, 'mendaftar Antrian Periksa');

        return redirect()->route('antrian');
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

        return redirect()->route('antrian');
    }
}
