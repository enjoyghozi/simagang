<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BerkasMagang;
use Illuminate\Support\Facades\Storage;

class UploadBerkasController extends Controller
{
    public function index()
    {
        $berkas = BerkasMagang::latest()->get();
        return view('admin.upload_berkas', compact('berkas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_berkas' => 'required',
            'file' => 'required|mimes:pdf|max:2048',
        ]);

        $filePath = $request->file('file')->store('berkas_magang', 'public');

        BerkasMagang::create([
            'mahasiswa_id' => auth()->id(), // ganti sesuai logic jika admin menginputkan untuk mahasiswa tertentu
            'jenis_berkas' => $request->jenis_berkas,
            'minggu_ke' => $request->minggu_ke,
            'file_path' => $filePath,
            'tanggal_upload' => now(),
        ]);

        return redirect()->back()->with('success', 'Berkas berhasil diupload.');
    }
}
