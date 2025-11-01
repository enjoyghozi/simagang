@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Manajemen Akun</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Akun</h6>
            <a href="{{ route('akun.create') }}" class="btn btn-primary btn-sm">+ Tambah Akun</a>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($akun as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ ucfirst($user->role) }}</td>
                            <td>
                                @if($user->status_akun == "menunggu")
                                <a href="{{ route('akun.status', ['id' => $user->id, 'status' => 'diterima']) }}" class="btn btn-primary btn-sm">Diterima</a>
                                <a href="{{ route('akun.status', ['id' => $user->id, 'status' => 'ditolak']) }}" class="btn btn-danger btn-sm">Ditolak</a>
                                <a href="{{ route('akun.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('akun.destroy', $user->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button onclick="return confirm('Yakin hapus akun?')" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                                @elseif($user->status_akun == "diterima")
                                    <button class="btn btn-success btn-sm">Diterima</button>
                                    <a href="{{ route('akun.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                @elseif($user->status_akun == "ditolak")
                                    <button class="btn btn-danger btn-sm">Ditolak</button>
                                    <form action="{{ route('akun.destroy', $user->id) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button onclick="return confirm('Yakin hapus akun?')" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                @else
                                    <button class="btn btn-danger btn-sm">Status Tidak Diketahui</button>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="text-center">Belum ada data akun.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
