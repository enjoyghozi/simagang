@extends('layouts.mahasiswa')

@section('content')
<div class="container">
    <h4>Upload Laporan</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('mahasiswa.storelaporan') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group mb-3">
            <label for="jenis">Jenis Laporan</label>
            <select name="jenis" class="form-control" required>
                <option value="mingguan">Laporan Mingguan</option>
                <option value="akhir">Laporan Akhir</option>
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="laporan">Pilih File (PDF/DOC)</label>
            <input type="file" name="laporan" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
</div>
@endsection
