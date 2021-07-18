<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>@yield("page-title") | {{$siteSetting->site_title ?? env("APP_NAME")}}</title>

    @if(!empty($siteSetting->icon))
        <link rel="shortcut icon" type="image/jpg" href="{{asset($siteSetting->logo)}}"/>
    @endif

    <link rel="stylesheet" href="{{asset("/admin-lte/plugins/fontawesome-free/css/all.min.css")}}">
    <link rel="stylesheet" href="{{asset("/admin-lte/dist/css/adminlte.min.css")}}">
    <link rel="stylesheet" href="{{asset("/admin-lte/plugins/sweetalert2/sweetalert2.min.css")}}">
    <link rel="stylesheet" href="{{asset('/admin-lte/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('/admin-lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <!-- data table css -->
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.25/b-1.7.1/b-colvis-1.7.1/b-html5-1.7.1/b-print-1.7.1/cr-1.5.4/date-1.1.0/fc-3.3.3/fh-3.1.9/kt-2.6.2/r-2.2.9/rg-1.1.3/rr-1.2.8/sc-2.0.4/sb-1.1.0/sp-1.3.0/sl-1.3.3/datatables.min.css"/>

    <link rel="stylesheet" href="{{asset("/custom/backend-custom.css")}}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    @yield("css")

    {{------------------------------
    -----------Javascript-----------
    ------------------------------}}

    <script src="{{asset("/admin-lte/plugins/jquery/jquery.min.js")}}"></script>
    <script src="{{asset("/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
    <script src="{{asset("/admin-lte/plugins/select2/js/select2.full.min.js")}}"></script>
    <script src="{{asset("/admin-lte/plugins/sweetalert2/sweetalert2.min.js")}}"></script>
    <script src="{{asset("/admin-lte/dist/js/adminlte.min.js")}}"></script>
    <!-- data table js -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.25/b-1.7.1/b-colvis-1.7.1/b-html5-1.7.1/b-print-1.7.1/cr-1.5.4/date-1.1.0/fc-3.3.3/fh-3.1.9/kt-2.6.2/r-2.2.9/rg-1.1.3/rr-1.2.8/sc-2.0.4/sb-1.1.0/sp-1.3.0/sl-1.3.3/datatables.min.js"></script>

    {{------------------------------
    -----------Javascript-----------
    ------------------------------}}


</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
@include("backend.include.top-navbar")
<!-- /.navbar -->

    <!-- Main Sidebar Container -->
@include("backend.include.left-side-navbar")
<!-- Main Sidebar Container -->

@include("backend.include.errormsg")
<!-- Content Wrapper. Contains page content -->
@yield("main-content")
<!-- /.content-wrapper -->

    <!-- Main Footer -->
@include("backend.include.footer")
<!-- Main Footer -->

</div>
<!-- ./wrapper -->
<script src="{{asset("/custom/backend-custom.js")}}"></script>
@yield("js")
</body>
</html>
