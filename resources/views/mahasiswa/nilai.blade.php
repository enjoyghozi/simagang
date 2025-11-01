@extends('layouts.mahasiswa')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Hasil Penilaian Magang</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($nilai->isEmpty())
        <div class="alert alert-warning">Belum ada penilaian.</div>
    @else
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Minggu Ke</th>
                                <th>Tanggal Penilaian</th>
                                <th>Nilai Sikap</th>
                                <th>Nilai Kehadiran</th>
                                <th>Nilai Hasil Kerja</th>
                                <th>Total Nilai</th>
                                <th>Komentar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($nilai as $n)
                                <tr>
                                    <td>{{ $n->minggu_ke ?? '-' }}</td>
                                    <td>{{ $n->tanggal_penilaian ?? '-' }}</td>
                                    <td>{{ $n->nilai_sikap ?? 0 }}</td>
                                    <td>{{ $n->nilai_kehadiran ?? 0 }}</td>
                                    <td>{{ $n->nilai_hasil_kerja ?? 0 }}</td>
                                    <td><strong>{{ $n->total_nilai ?? 0 }}</strong></td>
                                    <td>{{ $n->catatan_pembimbing ?? '-' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
