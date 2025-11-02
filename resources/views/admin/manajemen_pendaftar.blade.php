@extends('layouts.master')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h3 class="mr-3">Kelola Data Peserta</h3>
            <span>
                @if(strtolower($pendaftar->status) === 'diterima')
                    <span class="badge bg-success px-3 py-2 text-white">Diterima</span>
                @elseif(strtolower($pendaftar->status === 'ditolak'))
                    <span class="badge bg-danger px-3 py-2 text-white">Ditolak</span>
                @elseif(strtolower($pendaftar->status === 'pending'))
                    <span class="badge bg-warning text-dark px-3 py-2 text-white">Pending</span>
                @else
                    <span class="badge bg-primary px-3 py-2 text-white">{{strtolower( $pendaftar->status ?? '-' )}}</span>
                @endif
            </span>
        </div>
    </div>
    <!-- Form mengarah ke route update -->
    <form action="{{ route('admin.pendaftaran.update', $pendaftar->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- wajib untuk update -->
        <div class="mb-3">
            <a href="{{ asset('storage/' . $pendaftar->surat_pengantar) }}"
            target="_blank"
            class="btn btn-outline-info d-inline-flex align-items-center gap-2 px-3 py-2 rounded-pill shadow-sm"
            style="text-decoration:none;">
                <i class="bi bi-file-earmark-pdf" style="font-size:1.2rem;"></i>
                <span>Surat Pengantar</span>
            </a>
        </div>

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', $pendaftar->nama_lengkap) }}" class="form-control" readonly>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email', $pendaftar->email) }}" class="form-control" readonly>
        </div>

        <div class="mb-3">
            <label>Jurusan</label>
            <input type="text" name="jurusan" value="{{ old('jurusan', $pendaftar->jurusan) }}" class="form-control" placeholder="Input jurusan" readonly>
        </div>

        <div class="mb-3">
            <label>Instansi</label>
            <input type="text" name="instansi" value="{{ old('instansi', $pendaftar->instansi) }}" class="form-control" readonly>
        </div>

       <div class="mb-3">
            <label for="surat_balasan" class="form-label">Surat Balasan</label>
            <input class="form-control" type="file" id="surat_balasan" name="surat_balasan">

            @if($pendaftar->surat_balasan)
                <small>File saat ini:
                    <a href="{{ asset('storage/surat_balasan/'.$pendaftar->surat_balasan) }}" target="_blank">
                        {{ $pendaftar->surat_balasan }}
                    </a>
                </small>
            @endif

            @error('surat_balasan')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
       <div class="mb-3">
            <label for="surat_selesai" class="form-label">Surat Selesai</label>
            <input class="form-control" type="file" id="surat_selesai" name="surat_selesai">

            @if($pendaftar->surat_selesai)
                <small>File saat ini:
                    <a href="{{ asset('storage/surat_selesai/'.$pendaftar->surat_selesai) }}" target="_blank">
                        {{ $pendaftar->surat_selesai }}
                    </a>
                </small>
            @endif

            @error('surat_selesai')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>



        <div class="d-flex gap-3 justify-content-between">
           <div>
                @if (@strtolower($pendaftar->status == 'diterima'))
                    <a href="{{ url('/admin/pendaftaran') }}" class="btn btn-secondary btn-sm">Kembali</a>
                    <button type="submit" class="btn btn-primary btn-sm">Selesai Magang</button>
                @elseif (@strtolower($pendaftar->status) == 'selesai')
                    <a href="{{ url('/admin/pendaftaran') }}" class="btn btn-secondary btn-sm">Kembali</a>
                @else
                    <button type="submit" class="btn btn-success btn-sm">Terima</button>
                    <form action="{{ route('admin.pendaftaran.aksi', $pendaftar->id) }}" method="POST" class="d-inline">
                        @csrf
                        <input type="hidden" name="status" value="ditolak">
                        <button class="btn btn-danger btn-sm">Tolak</button>
                    </form>
                @endif

            </div>
            <div class="whatsapp">
                @php
                    // Normalisasi nomor: buang non-digit, ganti 0awal -> 62
                    $wa = preg_replace('/\D+/', '', $pendaftar->no_hp ?? '');
                    if ($wa && substr($wa, 0, 1) === '0') {
                        $wa = '62' . substr($wa, 1);
                    }
                    // Pesan default (rapi)
                    $pesan = "Hallo {$pendaftar->nama_lengkap}, kami dari Admin SIMAGANG. "
                            . "Kami ingin konfirmasi terkait pendaftaran magang Anda.";
                    $url = $wa ? "https://wa.me/{$wa}?text=" . urlencode($pesan) : null;
                @endphp

                @if($wa)
                    <a href="{{ $url }}" target="_blank" class="btn btn-success btn-sm d-flex align-items-center justify-content-center" style="width: 35px; height: 35px; border-radius: 8px;">
                        <i class="bi bi-whatsapp" style="font-size: 1.2rem; color: white;"></i>
                    </a>
                @else
                    <button class="btn btn-secondary btn-sm" style="width: 35px; height: 35px;" disabled>
                        <i class="bi bi-x"></i>
                    </button>
                @endif
            </div>
        </div>

    </form>
</div>
@endsection
