<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Laporan;
use App\Models\MonitoringPenilaian;
use App\Models\Peserta;
use App\Models\PendaftaranMagang;
use App\Models\BerkasMagang;
use Illuminate\Support\Str;



class PesertaController extends Controller
{
    public function index()
    {
        $totalLaporan = Laporan::where('id', Auth::id())->count();
        $status = 'Tidak DIketahui';
        if(auth()->user()->status_akun == "pending"){
            $status = 'Menunggu Verifikasi';
        }elseif(auth()->user()->status_akun == "diterima"){
            $status = 'Diterima';
        }elseif(auth()->user()->status_akun == "ditolak"){
            $status = 'Ditolak';
        }else{
            $status = 'Tidak DIketahui';
        }
        return view('mahasiswa.dashboard', [
            'statusPendaftaran' => $status,
            'jumlahLaporan' =>  $totalLaporan,
            'penilaian' => 'B',
            'progressMagang' => 40
        ]);
    }

    public function profile()
    {
        return view('mahasiswa.profile');
    }

public function formPendaftaran()
{
    return view('mahasiswa.pendaftaran');
}

public function storePendaftaran(Request $request)
{
    // $request->validate([
    //     'nama' => 'required|string|max:100',
    //     'nim' => 'required|string|max:20',
    //     'jurusan' => 'required|string|max:100',
    //     'nama_sekolah' => 'required|string|max:150',
    //     'mulai_magang' => 'required|date',
    //     'selesai_magang' => 'required|date|after:mulai_magang',
    //     'surat' => 'required|file|mimes:pdf,jpg,png|max:2048', // validasi file
    // ]);

    // === Upload file surat pengantar ===
    $pathSurat = null;
    if ($request->hasFile('surat')) {
        // Simpan ke storage/app/public/surat_pengantar
        $pathSurat = $request->file('surat')->store('surat_pengantar', 'public');
    }


    // === Simpan ke database pendaftaran_magang ===
    \DB::table('pendaftaran_magang')->insert([
        'nama_lengkap' => $request->nama,
        'nim' => $request->nim,
        'semester' => $request->semester,
        'prodi' => $request->jurusan,
        'instansi' => $request->nama_sekolah,
        'no_hp' => $request->no_hp,
        'email' => $request->email,
        'alamat' => $request->alamat,
        'surat_pengantar' => $pathSurat, // simpan path file
        'bidang_magang' => $request->bidang_magang,
        'mulai_magang' => $request->mulai_magang,
        'selesai_magang' => $request->selesai_magang,
        'status' => 'pending',
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    // === Sinkronisasi ke tabel peserta ===
    // $cekPeserta = \App\Models\Peserta::where('id', auth()->id())->first();

    // if (!$cekPeserta) {
    //     \App\Models\Peserta::create([
    //         'id' => auth()->id(),
    //         'nama' => $request->nama,
    //         'email' => $request->email,
    //         'no_hp' => $request->no_hp,
    //         'alamat' => $request->alamat,
    //         'jurusan' => $request->jurusan,
    //         'instansi' => $request->nama_sekolah,
    //         'status' => 'Menunggu',
    //         'surat_balasan' => null,
    //         'surat_selesai' => null,
    //     ]);
    // }

    return redirect()->route('mahasiswa.dashboard')->with('success', 'Pendaftaran berhasil dikirim, tunggu verifikasi.');
}

public function uploadLaporan()
{
    return view('mahasiswa.uploadlaporan');
}

public function storeLaporan(Request $request)
{
    $request->validate([
        'laporan' => 'required|mimes:pdf,doc,docx|max:2048',
        'jenis' => 'required',
        'minggu_ke' => 'nullable|integer|min:1'
    ]);

    // Simpan file ke storage/app/public/laporan
    $path = $request->file('laporan')->store('laporan', 'public');

    // Simpan ke tabel laporan
    $laporan = Laporan::create([
        'id' => auth()->id(),
        'file' => $path,
        'jenis' => $request->jenis,
    ]);

    // Simpan juga ke tabel berkas_magang
    BerkasMagang::create([
        'mahasiswa_id'   => auth()->id(), // pakai id dari auth
        'jenis_berkas'   => $request->jenis,
        'minggu_ke'      => $request->minggu_ke,
        'file_path'      => $path,
        'tanggal_upload' => now(),
    ]);

    return redirect()->route('mahasiswa.uploadlaporan')
        ->with('success', 'Laporan berhasil diupload!');
}

public function lihatNilai()
{
    // Ambil data peserta berdasarkan user login
    $peserta = Peserta::where('id', auth()->id())->first();

    if (!$peserta) {
        return redirect()->back()->with('error', 'Data peserta tidak ditemukan.');
    }
    $nilai = \App\Models\MonitoringPenilaian::where('peserta_id', $peserta->id)->get();

    return view('mahasiswa.nilai', compact('nilai', 'peserta'));
}

public function dokumen()
{
    $peserta = PendaftaranMagang::where('id', auth()->id())->first();
    return view('mahasiswa.dokumen', compact('peserta'));
}

public function cetakBalasan()
{
    // Sementara contoh generate PDF
    $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('mahasiswa.dokumen_balasan', [
        'nama' => auth()->user()->name,
        'nim' => auth()->user()->nim ?? 'NIM12345',
        'jurusan' => auth()->user()->jurusan ?? 'Teknik Informatika',
    ]);

    return $pdf->download($peserta->surat_balasan);
}

public function cetakSelesai()
{
    $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('mahasiswa.dokumen_selesai', [
        'nama' => auth()->user()->name,
        'nim' => auth()->user()->nim ?? 'NIM12345',
        'jurusan' => auth()->user()->jurusan ?? 'Teknik Informatika',
    ]);

   $peserta = PendaftaranMagang::where('id', auth()->id())->first();
    return $pdf->download($peserta->surat_selesai);
}


public function pesertaTerdaftar()
    {
        // Ambil peserta milik mahasiswa yang sedang login
        $pesertas = PendaftaranMagang::where('id', Auth::id())->get();
        return view('mahasiswa.pesertaterdaftar', compact('pesertas'));
    }

    // Form tambah peserta baru
    public function createPeserta()
    {
        return view('mahasiswa.pesertadaftarbaru');
    }

    // Simpan peserta baru
    public function storePeserta(Request $request)
    {
        // $request->validate([
        //     'nama' => 'required|string|max:100',
        //     'email' => 'required|email',
        //     'no_hp' => 'required',
        //     'alamat' => 'required',
        //     'instansi' => 'required',   // ✅ Tambah validasi instansi
        //     'jurusan' => 'required',
        // ]);

        // Peserta::create([
        //     'id' => Auth::id(),
        //     'nama' => $request->nama,
        //     'email' => $request->email,
        //     'no_hp' => $request->no_hp,
        //     'alamat' => $request->alamat,
        //     'instansi' => $request->instansi,  // ✅ Simpan instansi
        //     'jurusan' => $request->jurusan,
        //     'status' => 'Menunggu'
        // ]);

        // return redirect()->route('mahasiswa.peserta.index')->with('success', 'Peserta berhasil ditambahkan!');

    }

     public function edit($id)
    {
        $peserta = PendaftaranMagang::findOrFail($id);
        return view('mahasiswa.pesertaedit', compact('peserta'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email',
            'no_hp' => 'required',
            'alamat' => 'required',
            'instansi' => 'required',
            'jurusan' => 'required',
        ]);

        $peserta = Peserta::findOrFail($id);
        $peserta->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'instansi' => $request->instansi,
            'jurusan' => $request->jurusan,
        ]);

        return redirect()->route('mahasiswa.peserta.index')
                        ->with('success', 'Data peserta berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $peserta = Peserta::findOrFail($id);
        $peserta->delete();

        return redirect()->route('mahasiswa.peserta.index')
                         ->with('success', 'Peserta berhasil dihapus.');
    }


    public function beranda()
    {
        return view('mahasiswa.beranda');
    }

}


