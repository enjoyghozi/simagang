@extends('layouts.mahasiswa')

@section('content')
<div class="container">
    <h3>Form Tambah Peserta</h3>
    <form action="{{ route('mahasiswa.peserta.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>No HP</label>
            <input type="text" name="no_hp" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" required>
        </div>
         <div class="form-group mb-3">
            <label>Jurusan</label>
            <input type="text" name="jurusan" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label>Instansi</label>
            <input type="text" name="instansi" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
