<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MonitoringPenilaian;
use App\Models\Peserta;
use App\Models\User;
use Illuminate\Http\Request;

class MonitoringPenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pesertas = Peserta::with('user')->get();
        return view('admin\monitoring_penilaian', compact('pesertas'));
        // echo json_encode($pesertas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
$request->validate([
            'peserta_id' => 'required|exists:peserta,id',
            'kehadiran' => 'required|numeric|min:0|max:100',
            'catatan' => 'nullable|string',
            'nilai_sikap' => 'required|numeric|min:0|max:100',
            'nilai_kehadiran' => 'required|numeric|min:0|max:100',
            'nilai_hasil_kerja' => 'required|numeric|min:0|max:100',
            'komentar' => 'nullable|string',
        ]);

         // Hitung total nilai otomatis
    $total_nilai = round((
        $request->nilai_sikap +
        $request->nilai_kehadiran +
        $request->nilai_hasil_kerja
    ) / 3, 2);


       MonitoringPenilaian::create([
        'peserta_id' => $request->peserta_id,
        'pembimbing_id' => auth()->id(),
        'minggu_ke' => 1,
        'tanggal_penilaian' => now(),
        'kehadiran' => $request->nilai_kehadiran,
        'catatan_kegiatan' => $request->komentar,
        'nilai_sikap' => $request->nilai_sikap,
        'nilai_kehadiran' => $request->nilai_kehadiran,
        'nilai_hasil_kerja' => $request->nilai_hasil_kerja,
        'catatan_pembimbing' => $request->komentar,
        'total_nilai' => $total_nilai,
    ]);
        // Simpan ke database, kamu bisa sesuaikan dengan model Penilaian
        // Misalnya:
        // Penilaian::create([...]);

        return redirect()->back()->with('success', 'Data penilaian berhasil disimpan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(MonitoringPenilaian $monitoringPenilaian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MonitoringPenilaian $monitoringPenilaian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MonitoringPenilaian $monitoringPenilaian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MonitoringPenilaian $monitoringPenilaian)
    {
        //
    }
}
