<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peserta;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPeserta = Peserta::count();
        $totalAktif = Peserta::where('status', 'aktif')->count();
        $totalSelesai = Peserta::where('status', 'selesai')->count();

        $statistik = Peserta::select('instansi', DB::raw('count(*) as total'))
    ->groupBy('instansi')
    ->pluck('total', 'instansi')
    ->toArray(); // <- ini penting


        return view('admin.dashboard', compact('totalPeserta', 'totalAktif', 'totalSelesai', 'statistik'));
    }
}
