<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\PendaftaranMagang; // ✅ Tambahkan ini

class DokumenController extends Controller
{
    public function index()
    {
        $pesertas = PendaftaranMagang::all();
        return view('admin.dokumen', compact('pesertas'));
    }

    public function upload(Request $request, $id)
    {
        $peserta = PendaftaranMagang::findOrFail($id);

        if ($request->hasFile('surat_balasan')) {
            $file = $request->file('surat_balasan')->store('dokumen', 'public');
            $peserta->surat_balasan = basename($file);
        }

        if ($request->hasFile('surat_selesai')) {
            $file = $request->file('surat_selesai')->store('dokumen', 'public');
            $peserta->surat_selesai = basename($file);
        }

        $peserta->save();

        return back()->with('success', 'Dokumen berhasil diunggah.');
    }
}
