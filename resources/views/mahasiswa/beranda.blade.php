@extends('layouts.mahasiswa') {{-- Sesuaikan dengan layout kamu --}}
@section('title', 'Panduan Pendaftaran Magang')

@section('content')
<div class="container mt-5">
    <!-- Judul Halaman -->
    <div class="text-center mb-5">
        <h2 class="fw-bold">Panduan Pendaftaran Magang</h2>
        <p class="text-muted">Ikuti langkah-langkah berikut untuk mendaftar magang</p>
    </div>

    <!-- Timeline Horizontal -->
    <div class="steps-container">
        <div class="steps d-flex justify-content-between align-items-center">

            <!-- Step 1 -->
            <div class="step">
                <div class="circle bg-primary text-white">1</div>
                <h6 class="mt-3 fw-bold">Registrasi Akun</h6>
                <p class="text-muted">Buat akun terlebih dahulu di SIMAGANG.</p>
            </div>

            <!-- Step 2 -->
            <div class="step">
                <div class="circle bg-success text-white">2</div>
                <h6 class="mt-3 fw-bold">Lengkapi Data Diri</h6>
                <p class="text-muted">Isi biodata lengkap dan dokumen pendukung.</p>
            </div>

            <!-- Step 3 -->
            <div class="step">
                <div class="circle bg-warning text-white">3</div>
                <h6 class="mt-3 fw-bold">Konfirmasi & Selesai</h6>
                <p class="text-muted">Kirim pendaftaran dan tunggu verifikasi.</p>
            </div>
    </div>

    <!-- Tombol WhatsApp -->
    <!-- Tombol WhatsApp -->
<div class="text-center mt-5">
    <a href="https://wa.me/62895326133545?text=Hallo%2C%20saya%20ingin%20konfirmasi%20terkait%20pendaftaran%20magang%20saya."
       target="_blank"
       class="btn btn-success btn-lg shadow px-4 py-2"
       style="font-weight: bold; font-size: 16px; border-radius: 30px;">
        <i class="bi bi-whatsapp"></i> Hubungi Admin via WhatsApp
    </a>
</div>

</div>

<!-- CSS untuk Timeline -->
<style>
    .steps-container {
        padding: 20px;
        background: #fff;
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        overflow-x: auto;
    }

    .steps {
        min-width: 1100px; /* Supaya scroll horizontal di layar kecil */
    }

    .step {
        text-align: center;
        flex: 1;
        min-width: 200px;
        padding: 10px;
    }

    .circle {
        width: 60px;
        height: 60px;
        margin: 0 auto;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 22px;
        font-weight: bold;
        box-shadow: 0 3px 8px rgba(0,0,0,0.2);
    }

    .step p {
        font-size: 14px;
        margin-top: 5px;
    }

    /* Scrollbar untuk mobile */
    .steps-container::-webkit-scrollbar {
        height: 8px;
    }
    .steps-container::-webkit-scrollbar-thumb {
        background-color: #ccc;
        border-radius: 5px;
    }
</style>
@endsection
