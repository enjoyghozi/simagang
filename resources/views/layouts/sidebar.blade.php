<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="font-size: 14px;">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
        </div>
        <div class="sidebar-brand-text mx-3" style="font-weight: bold;">SIMAGANG</div>
    </a>

    <hr class="sidebar-divider my-2">

        <li class="nav-item">
            <a class="nav-link" href="{{ url('/') }}">
                <i class="fas fa-fw fa-home"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ url('/akun') }}">
                <i class="fas fa-fw fa-users-cog"></i>
                <span>Manajemen Akun</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ url('/admin/pendaftaran') }}">
                <i class="fas fa-fw fa-user-plus"></i>
                <span>Pendaftaran Magang</span>
            </a>
        </li>

        <!-- <li class="nav-item"> -->
            <!-- <a class="nav-link" href="{{ url('/jadwal') }}"> -->
            <!-- <i class="fas fa-fw fa-calendar-alt"></i> -->
                <!-- <span>Jadwal Kegiatan</span> -->
            <!-- </a> -->
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ url('/admin/upload-berkas') }}">
                <i class="fas fa-fw fa-file-upload"></i>
                <span>Laporan Peserta</span>
            </a>
        </li>

        <!--<li class="nav-item">
            <a class="nav-link" href="{{ url('/admin/monitoring-penilaian') }}">
                <i class="fas fa-fw fa-chart-line"></i>
                <span>Monitoring & Penilaian</span>
            </a>
        </li>-->

        <li class="nav-item">
            <a class="nav-link" href="{{ url('/admin/dokumen') }}">
                <i class="fas fa-fw fa-print"></i>
                <span>Cetak Dokumen</span>
            </a>
        </li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Footer -->
<div class="text-center d-flex flex-column align-items-center mb-3">
    <img src="{{ asset('images/logoblora.png') }}"
         alt="Dinkominfo Logo"
         style="width:40px; height:auto; margin-bottom:5px;">
    <span class="text-white small">DINAS KOMUNIKASI DAN INFORMATIKA KAB. BLORA</span>
</div>


</ul>
