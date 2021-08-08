<!DOCTYPE html>
<html lang="en">
@include('backend.common.head')
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
@include('backend.common.navbar')
<!-- /.navbar -->

    <!-- Main Sidebar Container -->
@include('backend.common.sidebar')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    @include('backend.common.footer')
</div>
<!-- ./wrapper -->
<!-- Scripts -->
<!-- jQuery -->
<script src="https://adminlte.io/themes/v3/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="https://adminlte.io/themes/v3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="https://adminlte.io/themes/v3/dist/js/adminlte.min.js"></script>

@yield('js')
@include('sweetalert::alert')

</body>
</html>
