@extends('layouts.mahasiswa')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Dokumen Peserta</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Peserta</h6>
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
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $peserta?->nama_lengkap }}</td>
                            <td>{{ $peserta?->instansi }}</td>
                            <td>
                                @if ($peserta?->surat_balasan)
                                    <a href="{{ asset('storage/surat_balasan/' . $peserta->surat_balasan) }}" target="_blank">Lihat</a>
                                @else
                                    <span class="text-muted">Belum tersedia</span>
                                @endif
                            </td>
                            <td>
                                @if ($peserta?->surat_selesai)
                                    <a href="{{ asset('storage/dokumen/' . $peserta?->surat_selesai) }}" target="_blank">Lihat</a>
                                @else
                                    <span class="text-muted">Belum tersedia</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
