<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PendaftaranMagang;
use App\Models\Peserta;

class PendaftaranMagangController extends Controller
{
    // Menampilkan semua data pendaftar magang
    public function index()
    {
        $pendaftar = PendaftaranMagang::latest()->get();
        return view('admin.pendaftaran', compact('pendaftar'));
    }

     public function edit(Request $request, $id) 
     {
        $pendaftar = PendaftaranMagang::findOrFail($id);
        return view('admin.manajemen_pendaftar', compact('pendaftar'));
     }

    public function update(Request $request, $id)
    {
        // Validasi input, surat_balasan dan surat_selesai optional
        $request->validate([
            'surat_balasan' => 'nullable|file|mimes:pdf,jpg,png|max:2048', // max 2MB
            'surat_selesai' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
        ]);

        $peserta = PendaftaranMagang::findOrFail($id);

        $dataUpdate = [
            'status' => 'Diterima', // update status
        ];

        // Jika ada file baru surat_balasan
        if ($request->hasFile('surat_balasan')) {
            $file = $request->file('surat_balasan');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->storeAs('public/surat_balasan', $filename);

            // Hapus file lama
            if ($peserta->surat_balasan && \Storage::exists('public/surat_balasan/'.$peserta->surat_balasan)) {
                \Storage::delete('public/surat_balasan/'.$peserta->surat_balasan);
            }

            $dataUpdate['surat_balasan'] = $filename;
        }

        // Jika ada file baru surat_selesai
        if ($request->hasFile('surat_selesai')) {
            $file = $request->file('surat_selesai');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->storeAs('public/surat_selesai', $filename);
            
            // Hapus file lama
            if ($peserta->surat_selesai && \Storage::exists('public/surat_selesai/'.$peserta->surat_selesai)) {
                \Storage::delete('public/surat_selesai/'.$peserta->surat_selesai);
            }
            
            $dataUpdate['surat_selesai'] = $filename;
        }


        // Update semua data ke database
        $peserta->update($dataUpdate);

        return redirect()->back()
                        ->with('success', 'Data peserta berhasil diperbarui.');
    }

    // Memproses aksi terima/tolak pendaftaran
    public function proses(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:diterima,ditolak',
        ]);

        
        $pendaftar = PendaftaranMagang::findOrFail($id);
        $pendaftar->status = $request->status;
        $pendaftar->save();
        
        // Jika pendaftaran diterima, buat data peserta
        if ($request->status === 'diterima') {
            Peserta::create([
                'id' => $pendaftar->id, // ambil dari pendaftar
                'nama' => $pendaftar->nama_lengkap,
                'email' => $pendaftar->email,
                'no_hp' => $pendaftar->no_hp,
                'alamat' => $pendaftar->alamat,
                'jurusan' => $pendaftar->prodi,
                'instansi' => $pendaftar->instansi,
                'bidang_magang' => $pendaftar->bidang_magang,
                'status' => 'Terima',
                'surat_balasan' => null,
                'surat_selesai' => null,
            ]);
            return redirect()->back()->with('success', 'Status pendaftaran berhasil diperbarui.');
        } else {
            $pendaftar = PendaftaranMagang::latest()->get();
            return view('admin.pendaftaran', compact('pendaftar'))->with('danger', 'Status pendaftaran ditolak.');
        }
    }
}
