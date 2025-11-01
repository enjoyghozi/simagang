@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Daftar Laporan Mahasiswa</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable">
                    <thead>
                        <tr>
                            <th>Nama Mahasiswa</th>
                            <th>Jenis Laporan</th>
                            <th>Tanggal Upload</th>
                            <th>Laporan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($berkas as $item)
                            <tr>
                                <td>{{ $item->mahasiswa->name ?? '-' }}</td>
                                <td>{{ ucfirst($item->jenis_berkas) }}</td>
                                <td>{{ $item->tanggal_upload }}</td>
                                <td>
                                    <a href="{{ asset('storage/' . $item->file_path) }}" target="_blank" class="btn btn-primary btn-sm">
                                        <i class="fas fa-download"></i> Unduh
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
