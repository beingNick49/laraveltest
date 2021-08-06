<!DOCTYPE html>
<html lang="en">
@include('backend.shared.head')
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
@include('backend.shared.navbar')
<!-- /.navbar -->

    <!-- Main Sidebar Container -->
@include('backend.shared.sidebar')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    @include('backend.shared.footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

{{--<!-- jQuery -->--}}
{{--<script src="https://adminlte.io/themes/v3/plugins/jquery/jquery.min.js"></script>--}}
{{--<!-- Bootstrap 4 -->--}}
{{--<script src="https://adminlte.io/themes/v3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>--}}
{{--<!-- AdminLTE App -->--}}
{{--<script src="https://adminlte.io/themes/v3/dist/js/adminlte.min.js"></script>--}}
<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
@yield('js')
@include('sweetalert::alert')
</body>
</html>
