@extends('layouts.master')

@section('content')
<div class="container">
    <h1 class="h3 mb-4 text-gray-800">Edit Akun</h1>

    <form action="{{ route('akun.update', $akun->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" value="{{ $akun->name }}" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $akun->email }}" required>
        </div>
        <div class="mb-3">
            <label>Role</label>
            <select name="role" class="form-control" required>
                <option value="admin" {{ $akun->role == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="peserta" {{ $akun->role == 'peserta' ? 'selected' : '' }}>Peserta</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('akun.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection

