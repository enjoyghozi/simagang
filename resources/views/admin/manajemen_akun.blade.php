@extends('layouts.header')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Manajemen Akun</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Akun</h6>
            <a href="{{ route('akun.create') }}" class="btn btn-sm btn-primary">+ Tambah Akun</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>No Hp</th>
                            <th>Email</th>
                            <th>Peran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($akun as $user)
                        <tr>
                            <td>{{ $user->nama }}</td>
                            <td>{{ $user->no_hp ?? '-' }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ ucfirst($user->role) }}</td>
                            <td>
                                <!-- Tombol Edit -->
                                <a href="{{ route('akun.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                <!-- Tombol Hapus -->
                                <form action="{{ route('akun.destroy', $user->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                </form>

                                <!-- Tombol WhatsApp -->
                                <a href="{{ route('kirim.wa', $user->id) }}"
                                   class="btn btn-success btn-sm"
                                   target="_blank"
                                   title="Chat via WhatsApp">
                                   <i class="fab fa-whatsapp"></i> WhatsApp
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        @if($akun->isEmpty())
                        <tr>
                            <td colspan="5" class="text-center">Belum ada data akun.</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
