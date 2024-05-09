<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title>@yield('title') | Dalfa Pakistan </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description"/>
    <meta content="Themesbrand" name="author"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::to('/') }}/{{asset('assets/images/favicon.ico')}}">


    <!-- Plugins css -->
    <link href="{{ URL::to('/') }}/{{asset('assets/libs/select2/css/select2.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ URL::to('/') }}/{{asset('assets/libs/dropzone/min/dropzone.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <!-- Bootstrap Css -->
    <link href="{{ URL::to('/') }}/{{asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet"
          type="text/css"/>
    <link href="{{ URL::to('/') }}/{{asset('assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}"
          rel="stylesheet" type="text/css">
    <!-- Icons Css -->
    <link href="{{ URL::to('/') }}/{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- App Css-->
    <link href="{{ URL::to('/') }}/{{asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet"
          type="text/css"/>
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">


    <!-- Plugins css -->
    <link href="{{asset('assets/libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/libs/dropzone/min/dropzone.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Bootstrap Css -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet"
          type="text/css">
    <!-- Icons Css -->
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- App Css-->
    <link href="{{asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css"/>
</head>

<body data-sidebar="dark" data-layout-mode="light">
<!-- <body data-layout="horizontal" data-topbar="dark"> -->
<!-- Begin page -->
<div id="layout-wrapper">
    @include('partials.header')
    @include('partials.left-sidebar')

    <!-- ============================================================== -->
    <!-- Start Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
                @include('partials.title')

                <!-- end row -->
                @yield('content')
                <!-- end row -->

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
        @include('partials.footer')
    </div>
    <!-- end main content-->
</div>
<!-- END layout-wrapper -->
<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- JAVASCRIPT -->

<script src="{{ URL::to('/') }}/{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
<script src="{{ URL::to('/') }}/{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ URL::to('/') }}/{{asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
<script src="{{ URL::to('/') }}/{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{ URL::to('/') }}/{{asset('assets/libs/node-waves/waves.min.js')}}"></script>

<!-- Plugins js -->
<script src="{{ URL::to('/') }}/{{asset('assets/libs/select2/js/select2.min.js')}}"></script>
<script src="{{ URL::to('/') }}/{{asset('assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>
<script src="{{ URL::to('/') }}/{{asset('assets/libs/dropzone/min/dropzone.min.js')}}"></script>
<script src="{{ URL::to('/') }}/{{asset('assets/libs/jquery.repeater/jquery.repeater.min.js')}}"></script>


<!-- apexcharts -->
<script src="{{ URL::to('/') }}/{{asset('assets/libs/apexcharts/apexcharts.min.js')}}"></script>

<!-- dashboard init -->
<script src="{{ URL::to('/') }}/{{asset('assets/js/pages/dashboard.init.js')}}"></script>
<script src="{{ URL::to('/') }}/{{asset('assets/js/pages/form-repeater.int.js')}}"></script>


<!-- form advanced init -->
<script src="{{ URL::to('/') }}/{{asset('assets/js/pages/form-advanced.init.js')}}"></script>

<!-- App js -->
<script src="{{ URL::to('/') }}/{{asset('assets/js/app.js')}}"></script>

@yield('script')

</body>

</html>
