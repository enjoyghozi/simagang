@extends('layouts.mahasiswa')

@section('content')
<div class="container">
    <h3>Edit Data Peserta</h3>

    <!-- Form mengarah ke route update -->
    <form action="{{ route('mahasiswa.peserta.update', $peserta->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- wajib untuk update -->

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', $peserta->nama_lengkap) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email', $peserta->email) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>No HP</label>
            <input type="text" name="no_hp" value="{{ old('no_hp', $peserta->no_hp) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Alamat</label>
            <input type="text" name="alamat" value="{{ old('alamat', $peserta->alamat) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Jurusan</label>
            <input type="text" name="jurusan" value="{{ old('jurusan', $peserta->jurusan) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Instansi</label>
            <input type="text" name="instansi" value="{{ old('instansi', $peserta->instansi) }}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        <a href="{{ route('mahasiswa.peserta.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection