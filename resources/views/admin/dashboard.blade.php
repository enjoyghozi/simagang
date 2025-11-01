@extends('layouts.master')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Dashboard Admin</h1>
<div class="row">

  {{-- Jumlah Total Peserta --}}
  <div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Peserta Magang</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPeserta }}</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-users fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

 <!-- {{-- Status Peserta --}}
  <div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Status Peserta</div>
            <div class="row">
              <div class="col-auto mr-3">Aktif: <strong>{{ $totalAktif }}</strong></div>
              <div class="col-auto">Selesai: <strong>{{ $totalSelesai }}</strong></div>
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-check-circle fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- Statistik Berdasarkan Instansi atau Jurusan --}}
  <div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Statistik Berdasarkan Instansi / Jurusan</h6>
      </div>
      <div class="card-body">
        <canvas id="chartStatistik"></canvas>
      </div>
    </div>
  </div>

</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById('chartStatistik').getContext('2d');
  const chart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: {!! json_encode(array_keys($statistik)) !!},
      datasets: [{
        label: 'Jumlah Peserta',
        data: {!! json_encode(array_values($statistik)) !!},
        backgroundColor: 'rgba(54, 162, 235, 0.6)',
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true,
          ticks: {
            stepSize: 1
          }
        }
      }
    }
  });
</script>-->
@endsection
