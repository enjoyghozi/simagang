@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Pendaftaran Magang</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Pendaftar</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="myTable" class="table table-bordered w-100" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Prodi</th>
                            <th>Bidang</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pendaftar as $item)
                        <tr>
                            <td>{{ $item->nama_lengkap }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->prodi }}</td>
                            <td>{{ $item->bidang_magang }}</td>
                            {{-- <td>
                                <a href="{{ asset('storage/' . $item->surat_pengantar) }}" target="_blank" class="btn btn-info btn-sm">Lihat</a>
                            </td> --}}
                            <td>
                                @php
                                    $status = strtolower($item->status ?? '');
                                @endphp

                                @if($status === 'diterima')
                                    <span class="badge badge-success">Diterima</span>
                                @elseif($status === 'ditolak')
                                    <span class="badge badge-danger">Ditolak</span>
                                @elseif($status === 'pending' || $item->status === 'Menunggu Verifikasi')
                                    <span class="badge badge-warning">Pending</span>
                                @else
                                    <span class="badge badge-secondary">{{ $item->status ?? '-' }}</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.pendaftaran.edit', $item->id) }}" class="btn btn-secondary btn-sm">Manage</a>
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
@push('script')
    <script>
        $(document).ready(function () {
            $('#dataPendaftar').DataTable({
                "language": {
                    "lengthMenu": "Tampilkan _MENU_ data per halaman",
                    "zeroRecords": "Data tidak ditemukan",
                    "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
                    "infoEmpty": "Tidak ada data tersedia",
                    "infoFiltered": "(disaring dari total _MAX_ data)",
                    "search": "Cari:",
                    "paginate": {
                        "first": "Awal",
                        "last": "Akhir",
                        "next": "›",
                        "previous": "‹"
                    }
                }
            });
        });
    </script>
@endpush