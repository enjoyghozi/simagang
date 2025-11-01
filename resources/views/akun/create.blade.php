@extends('layouts.master')

@section('content')
<div class="container">
    <h1 class="h3 mb-4 text-gray-800">Tambah Akun</h1>

    <form action="{{ route('akun.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label for="instansi" class="form-label">{{ __('Instansi') }}</label>
            <input id="instansi" type="text"
                class="form-control @error('instansi') is-invalid @enderror"
                name="instansi" value="{{ old('instansi') }}" required autofocus>
            @error('instansi')
                <span class="text-danger small">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Role</label>
            <select name="role" class="form-control" required>
                <option value="">-- Pilih Role --</option>
                <option value="admin">Admin</option>
                <option value="peserta">Peserta</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('akun.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
