<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <base href="{{ asset('') }}">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet"
          href="{{ asset('source/admin/assets/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('source/admin/assets/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('source/admin/assets/bower_components/Ionicons/css/ionicons.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('source/admin/assets/dist/css/AdminLTE.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('source/admin/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
    <link rel="stylesheet" href="{{ asset('source/admin/assets/dist/css/skins/skin-blue.min.css') }}">
    <link rel="stylesheet" href="{{ asset('source/admin/assets/css/custom.css') }}">
    <script src="{{ asset('source/admin/assets/bower_components/fastclick/lib/fastclick.js') }}"></script>
    <!-- jQuery 3 -->
    <script src="{{ asset('source/admin/assets/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('source/admin/assets/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <!-- AdminLTE App -->
    <script src="{{ asset('source/admin/assets/dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('source/admin/assets/dist/js/custom.js') }}"></script>
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('source/admin/assets/js/custom.js') }}"></script>
    <!-- DataTables -->
    <script src="{{ asset('source/admin/assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('source/admin/assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
</head>
<script>
    $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
    })
</script>
