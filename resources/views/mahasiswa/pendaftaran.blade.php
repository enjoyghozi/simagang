@extends('layouts.mahasiswa')

@section('content')
<div class="container">
    <h3>Form Pendaftaran Magang</h3>
    <hr>

    <form action="{{ route('mahasiswa.pendaftaran.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label>Nama Lengkap</label>
            <input type="text" name="nama" class="form-control" >
        </div>

        <div class="form-group mb-3">
            <label>NIM/NIS</label>
            <input type="text" name="nim" class="form-control" >
        </div>

        <div class="form-group mb-3">
            <label>Jurusan</label>
            <input type="text" name="jurusan" class="form-control" >
        </div>
          <div class="form-group mb-3">
            <label>Semester</label>
            <input type="text" name="semester" class="form-control" >
        </div>

        <div class="form-group mb-3">
            <label>Nama Instansi</label>
            <input type="text" name="nama_sekolah" class="form-control" >
        </div>
        <div class="form-group mb-3">
            <label>No Hp/Whatsapp</label>
            <input type="text" name="no_hp" class="form-control" >
        </div>
        <div class="form-group mb-3">
            <label>Email</label>
            <input type="text" name="email" class="form-control" >
        </div>
        
        <div class="form-group mb-3">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" >
        </div>
           <div class="form-group mb-3">
            <label for="surat_pengantar">Surat Pengantar (PDF/DOC)</label>
            <input type="file" name="surat" class="form-control" >
        </div>
         <div class="form-group mb-3">
            <label>Bidang Magang</label>
            <select name="bidang_magang" class="form-control bidang-select">
                <option value="">-- Pilih Bidang --</option>
                <option value="Teknologi Informasi">Teknologi Informasi</option>
                <option value="Administrasi">Administrasi</option>
                <option value="Keuangan">Keuangan</option>
                <option value="Komunikasi">Komunikasi</option>
                <option value="Humas">Humas</option>
                <option value="Kearsipan">Kearsipan</option>
                <option value="Pelayanan Publik">Pelayanan Publik</option>
            </select>
        </div>
        <div class="form-group mb-3">
            <label>Tanggal Mulai</label>
            <input type="date" name="mulai_magang" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label>Tanggal Selesai</label>
            <input type="date" name="selesai_magang" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Daftar</button>
    </form>
</div>
@endsection
