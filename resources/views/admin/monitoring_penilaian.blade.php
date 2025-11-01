@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Monitoring & Penilaian Peserta Magang</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable">
                    <thead>
                        <tr>
                            <th>Nama Mahasiswa</th>
                            <th>Instansi</th>
                            <th>Tanggal Magang</th>
                            <th>Sikap</th>
                            <th>Kehadiran</th>
                            <th>Hasil Kerja</th>
                            <th>Komentar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pesertas as $peserta)
                            @php
                                $penilaian = \App\Models\MonitoringPenilaian::where('peserta_id', $peserta->id)->get();
                            @endphp
                            <tr>
                                <td>{{ $peserta->nama }}</td>
                                <td>{{ $peserta->instansi }}</td>
                                <td>{{ $peserta->tanggal_mulai }} - {{ $peserta->tanggal_selesai }}</td>
                                <form action="{{ route('admin.monitoring-penilaian.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="peserta_id" value="{{ $peserta->id }}">

                                    <!-- Nilai sikap -->
                                    <td>
                                        <select name="nilai_sikap" class="form-control" required>
                                            <option value="">-</option>
                                            <option value="100">A</option>
                                            <option value="85">B</option>
                                            <option value="75">C</option>
                                            <option value="60">D</option>
                                        </select>
                                    </td>

                                    <!-- Kehadiran -->
                                    <td>
                                        <input type="number" name="nilai_kehadiran" class="form-control" min="0" max="60" required>
                                    </td>

                                    <!-- Hasil kerja -->
                                    <td>
                                        <input type="number" name="nilai_hasil_kerja" class="form-control" min="0" max="100" required>
                                    </td>

                                    <!-- Komentar -->
                                    <td>
                                        <textarea name="catatan_pembimbing" class="form-control" rows="1"></textarea>
                                    </td>

                                    <td>
                                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                                    </td>
                                </form>
                            </tr>

                            {{-- Tambahkan baris khusus untuk riwayat --}}
                            @if($penilaian->count() > 0)
                                <tr>
                                    <td colspan="8">
                                        <strong>Riwayat Penilaian:</strong>
                                        <ul>
                                            @foreach($penilaian as $p)
                                                <li>
                                                    Minggu ke {{ $p->minggu_ke ?? '-' }} :
                                                    Total Nilai = <b>{{ $p->total_nilai }}</b>
                                                    (Sikap: {{ $p->nilai_sikap }},
                                                    Kehadiran: {{ $p->nilai_kehadiran }},
                                                    Hasil Kerja: {{ $p->nilai_hasil_kerja }})
                                                </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
