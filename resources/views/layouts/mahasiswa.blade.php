<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>@yield('title', 'SIMAGANG')</title>

  <!-- Custom fonts -->
  <link href="{{ asset('templateadmin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,700" rel="stylesheet">

  <!-- Custom styles -->
  <link href="{{ asset('/templateadmin/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<body id="page-top">
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="font-size: 14px;">
      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15"></div>
        <div class="sidebar-brand-text mx-3" style="font-weight: bold;">SIMAGANG</div>
      </a>

      <hr class="sidebar-divider my-2">

      <li class="nav-item">
        <a class="nav-link" href="{{ route('mahasiswa.beranda') }}"></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('mahasiswa.dashboard') }}">
          <i class="fas fa-fw fa-home"></i>
          <span>Dashboard</span>
        </a>
      </li>
      @if (auth()->check() && auth()->user()->role === 'peserta' && auth()->user()->status_akun === 'diterima') 
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/mahasiswa/pendaftaran') }}">
          <i class="fas fa-fw fa-user-plus"></i>
          <span>Form Pendaftaran Magang</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/mahasiswa/uploadlaporan') }}">
          <i class="fas fa-fw fa-file-upload"></i>
          <span>Upload Laporan</span>
        </a>
      </li>
      <!--li class="nav-item">
<a class="nav-link" href="">
          <i class="fas fa-fw fa-star"></i>
          <span>Lihat Nilai & Catatan</span>
        </a>-->
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/mahasiswa/dokumen') }}">
          <i class="fas fa-fw fa-print"></i>
          <span>Cetak Dokumen</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/mahasiswa/peserta') }}">
          <i class="fas fa-fw fa-users"></i>
          <span>Peserta Terdaftar</span>
        </a>
      </li>
      @endif
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Footer -->
      <div class="text-center d-flex flex-column align-items-center mb-3">
        <img src="{{ asset('images/logoblora.png') }}" 
             alt="Dinkominfo Logo" 
             style="width:40px; height:auto; margin-bottom:5px;">
        <span class="text-white small">DINAS KOMUNIKASI DAN INFORMATIKA KAB. BLORA</span>
      </div>
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                 data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <!-- Nama user tetap tampil di mobile -->
                <span class="mr-2 text-gray-600 small">{{ Auth::user()->name }}</span>
                <img class="img-profile rounded-circle" src="{{ asset('templateadmin/img/undraw_profile.svg') }}">
              </a>

              <!-- Dropdown User Menu -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                   aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider"></div>
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button type="submit" class="dropdown-item">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                  </button>
                </form>
              </div>
            </li>
          </ul>
        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          @yield('content')
        </div>
        <!-- End Page Content -->

      </div>

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Simagang 2025</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->
    </div>
  </div>

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- JS -->
  <script src="{{ asset('/templateadmin/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('/templateadmin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('/templateadmin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('/templateadmin/js/sb-admin-2.min.js') }}"></script>

  @yield('scripts')
</body>
</html>
