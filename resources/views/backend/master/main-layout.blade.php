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

    <link rel="stylesheet" href="{{asset("/public/admin-lte/plugins/fontawesome-free/css/all.min.css")}}">
    <link rel="stylesheet" href="{{asset("/public/admin-lte/dist/css/adminlte.min.css")}}">
    <link rel="stylesheet" href="{{asset("/public/admin-lte/plugins/sweetalert2/sweetalert2.min.css")}}">

    <link rel="stylesheet" href="{{asset("/public/custom/backend-custom.css")}}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    @yield("css")

    {{------------------------------
    -----------Javascript-----------
    ------------------------------}}

    <script src="{{asset("/public/admin-lte/plugins/jquery/jquery.min.js")}}"></script>
    <script src="{{asset("/public/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
    <script src="{{asset("/public/admin-lte/dist/js/adminlte.min.js")}}"></script>

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
<script src="{{asset("/public/custom/backend-custom.js")}}"></script>
@yield("js")
</body>
</html>
