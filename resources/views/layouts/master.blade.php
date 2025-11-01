<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>ADMIN</title>

  <!-- Custom fonts -->
  <link href="{{ asset('templateadmin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,700" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/2.3.4/css/dataTables.dataTables.css" />
  <style>
    #myTable_filter {
      display: flex;
      justify-content: flex-end;
      align-items: center;
      margin-bottom: 10px;
    }
    #myTable_filter label { margin: 0; }
    #myTable_filter input[type="search"] { width: 180px; }

  </style>
  

  <!-- Custom styles -->
  <link href="{{ asset('/templateadmin/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    @include('layouts.sidebar')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        @include('layouts.topbar')
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          @yield('content')
        </div>
        <!-- End Page Content -->

      </div>
      <!-- End Main Content -->

      <!-- Footer -->
      @include('layouts.footer')
      <!-- End of Footer -->

    </div>
    <!-- End Content Wrapper -->

  </div>
  <!-- End Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- JS Scripts -->
  <script src="{{ asset('/templateadmin/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('/templateadmin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('/templateadmin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('/templateadmin/js/sb-admin-2.min.js') }}"></script>
  <script src="https://cdn.datatables.net/2.3.4/js/dataTables.js"></script>
  
<!-- jQuery (wajib sebelum DataTables JS) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
  <script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
  </script>

  @yield('scripts')


</body>

</html>
