@extends('layouts.mahasiswa')

@section('content')
<div class="container">
    <h3 class="mb-3">Peserta Terdaftar</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('mahasiswa.peserta.create') }}" class="btn btn-primary mb-3">Tambah Peserta</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>No HP</th>
                <th>Alamat</th>
                <th>Instansi</th>
                <th>Jurusan</th>
                <th>Status</th>
                <th>Aksi</th>

            </tr>
        </thead>
        <tbody>
            @foreach($pesertas as $peserta)
               <tr>
                    <td>{{ $peserta->nama_lengkap }}</td>
                    <td>{{ $peserta->email }}</td>
                    <td>{{ $peserta->no_hp }}</td>
                    <td>{{ $peserta->alamat }}</td>
                    <td>{{ $peserta->instansi }}</td>
                    <td>{{ $peserta->jurusan }}</td>
                    <td>
                        @php
                            $status = strtolower($peserta->status ?? '');
                        @endphp

                        @if($status === 'diterima')
                            <span class="badge badge-success">Diterima</span>
                        @elseif($status === 'ditolak')
                            <span class="badge badge-danger">Ditolak</span>
                        @elseif($peserta->status === 'pending')
                            <span class="badge badge-warning">Pending</span>
                        @else
                            <span class="badge badge-secondary">{{ $peserta->status ?? '-' }}</span>
                        @endif
                    </td>

                    <td>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('mahasiswa.peserta.edit', $peserta->id) }}" class="btn btn-warning btn-sm me-2">
                                <i class="fas fa-edit"></i>
                            </a>

                            <div class="div">
                                <form action="{{ route('mahasiswa.peserta.destroy', $peserta->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
