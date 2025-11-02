<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Pakai model User bawaan Laravel
use Illuminate\Support\Facades\Hash;


class AkunController extends Controller
{
    public function index()
    {
        $akun = User::all();
        return view('akun.index', compact('akun'));
    }

    public function create()
    {
        return view('akun.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'instansi' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required'],
        ]);

        User::create([
            'name' => $request['name'],
            'instansi' => $request['instansi'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'role' => 'peserta', // default mahasiswa
            'status_akun' => 'pending', // default pending
        ]);

        return redirect()->route('akun.index')->with('success', 'Akun berhasil ditambahkan.');
    }

    public function edit(User $akun)
    {
        return view('akun.edit', compact('akun'));
    }

    public function update(Request $request, User $akun)
    {
        $akun->update($request->only('name', 'email', 'role'));
        return redirect()->route('akun.index')->with('success', 'Akun berhasil diperbarui.');
    }
    public function updatestatus(User $akun)
    {
        // $akun->update($request->only('name', 'email', 'role'));
        // return redirect()->route('akun.index')->with('success', 'Akun berhasil diperbarui.');
    }
    public function ubahStatus($id, $status)
    {
        // Cari user berdasarkan ID
        $user = User::findOrFail($id);

        // Update status user
        $user->status_akun = $status;
        $user->save();

        return redirect()->back()->with('success', "Status akun {$user->nama} berhasil diubah menjadi {$status}.");
    }
    public function destroy(User $akun)
    {
        $akun->delete();
        return redirect()->route('akun.index')->with('success', 'Akun berhasil dihapus.');
    }
}
