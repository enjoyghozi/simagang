@extends('layouts.master')

@section('content')
<div class="container-fluid">
  <h1 class="h3 mb-4 text-gray-800">Dokumen Peserta</h1>

  <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Peserta</h6>
    </div>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Nama Peserta</th>
            <th>Instansi</th>
            <th>Surat Balasan</th>
            <th>Surat Selesai</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($pesertas as $peserta)
          <tr>
            <td>{{ $peserta?->nama_lengkap }}</td>
            <td>{{ $peserta->instansi }}</td>
            <td>
              @if ($peserta->surat_balasan)
                <a href="{{ asset('storage/dokumen/' . $peserta->surat_balasan) }}" target="_blank">Lihat</a>
              @else
                <span class="text-muted">Belum diunggah</span>
              @endif
              <form action="{{ route('admin.dokumen.upload', $peserta->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="mb-2 d-flex">
                    <input type="file" name="surat_balasan" class="form-control form-control-sm">
                    <button class="btn btn-sm btn-primary" type="submit">Upload</button>
                  </div>
              </form>
            </td>
            <td>
              @if ($peserta->surat_selesai)
                <a href="{{ asset('storage/dokumen/' . $peserta->surat_selesai) }}" target="_blank">Lihat</a>
              @else
                <span class="text-muted">Belum diunggah</span>
              @endif
            </td>
            <td>
              <form action="{{ route('admin.dokumen.upload', $peserta->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-2">
                  <input type="file" name="surat_selesai" class="form-control form-control-sm">
                </div>
                <button class="btn btn-sm btn-primary" type="submit">Upload</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
