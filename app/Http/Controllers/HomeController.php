<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Antrian;
use App\Models\Checkup;
use App\Models\User;
use App\Models\UserLog;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function home()
    {
        return redirect('dashboard');
    }

    public function index()
    {
        $antrian = Antrian::where('status', '==', 'menunggu')->count();
        $checkup = Checkup::count();
        $user = User::count();
        $userLog = UserLog::all();

        $checkupGraph = Antrian::select('tanggal', DB::raw('COUNT(id) as Total'))
        ->where('status', 'selesai')
        ->groupBy('tanggal')
        ->limit(5)
        ->get();

        $label = [];
        $data = [];
        $decodeData = json_decode($checkupGraph);
        // dd($decodeData);
        foreach ($checkupGraph as $key => $value) {
            $label[] = Carbon::parse($value->tanggal)->format('d F Y');
            $data[] = $value->Total;
        }

        // dd($label, $data);

        return view('dashboard', [
            'antrian' => $antrian,
            'checkup' => $checkup,
            'user' => $user,
            'userLog' => $userLog,
            'chart' => [
                'label' => $label,
                'data' => $data
            ]
        ]);
    }
}
