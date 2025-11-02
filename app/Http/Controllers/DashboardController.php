<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PendaftaranMagang;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPeserta = PendaftaranMagang::count();
        $totalAktif = PendaftaranMagang::where('status', 'diterima')->count();
        $totalSelesai = PendaftaranMagang::where('status', 'selesai')->count();

        $statistik = PendaftaranMagang::select('instansi', DB::raw('count(*) as total'))
            ->groupBy('instansi')
            ->pluck('total', 'instansi')
            ->toArray(); // <- ini penting


        return view('admin.dashboard', compact('totalPeserta', 'totalAktif', 'totalSelesai', 'statistik'));
    }
}
