@extends('layouts.mahasiswa')

@section('content')
<div class="container-fluid">

    <!-- Judul Dashboard -->
    <h1 class="h3 mb-4 text-gray-800">Dashboard Peserta</h1>

    <div class="row">

        <!-- Profile Ringkas 
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card shadow h-100 py-2">
                <div class="card-body">
                    <h5 class="card-title mb-3">Profil Mahasiswa</h5>
                    <p><strong>Nama:</strong> {{ Auth::user()->name ?? '-' }}</p>
                    <p><strong>NIM:</strong> {{ Auth::user()->nim ?? '-' }}</p>
                    <p><strong>Jurusan:</strong> {{ Auth::user()->jurusan ?? '-' }}</p>
                </div>
            </div>
        </div> -->

        <!-- Status Pendaftaran -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Status Pendaftaran</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        {{ $statusPendaftaran ?? 'Belum daftar' }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Jumlah Laporan -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Laporan Diupload</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        {{ $jumlahLaporan ?? 0 }} Laporan
                    </div>
                </div>
            </div>
        </div>

        <!-- Nilai / Progress 
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                        Nilai / Progress Magang</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        {{ $penilaian ?? 'Belum ada' }}
                    </div>
                    <div class="progress mt-2">
                        <div class="progress-bar bg-warning" role="progressbar" 
                             style="width: {{ $progressMagang ?? 0 }}%" 
                             aria-valuenow="{{ $progressMagang ?? 0 }}" 
                             aria-valuemin="0" aria-valuemax="100">
                            {{ $progressMagang ?? 0 }}%
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card shadow h-100 py-2">
                <div class="card-body">
                    <h5 class="card-title mb-3">Grafik Progress Magang</h5>
                    <canvas id="progressChart"></canvas>
                </div>
            </div>
        </div> -->

    </div>

</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('progressChart').getContext('2d');
    var progressChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Progress', 'Sisa'],
            datasets: [{
                data: [{{ $progressMagang ?? 0 }}, {{ 100 - ($progressMagang ?? 0) }}],
                backgroundColor: ['#f6c23e', '#e5e5e5']
            }]
        }
    });
</script>
@endsection

