<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>{{ config('app.name', 'Laravel') }} - Admin Panel</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
          type="text/css">
    <link href="{{ asset('admin/global_assets/css/icons/icomoon/styles.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/css/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/css/layout.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/css/components.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/css/colors.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/css/custom-responsive.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- /global stylesheets -->

    <!-- Libraries stylesheets -->

    <!-- /libraries stylesheets -->

    <link href="{{ asset('admin/custom.css') }}" rel="stylesheet">

    @stack('css')

</head>

<body>
<div style="background-color: #fdfdfd" id="preloader"></div>

<!-- Main navbar -->
@include('admin.layouts.partials.main_navbar')
<!-- /main navbar -->

<!-- Page content -->
<div class="page-content">

    <!-- Main sidebar -->
@include('admin.layouts.partials.main_sidebar')
<!-- /main sidebar -->

    <!-- Main content -->
    <div class="content-wrapper">

        <!-- Page header -->
    @include('admin.layouts.partials.page_header')
    <!-- /page header -->

        <!-- Content area -->
    @yield('content')
    <!-- /content area -->

        <!-- Footer -->
    @include('admin.layouts.partials.footer')
    <!-- /footer -->

    </div>
    <!-- /content wrapper -->

</div>
<!-- /page content -->

<!-- Core JS files -->
<script src="{{ asset('admin/global_assets/js/main/jquery.min.js') }}"></script>
<script src="{{ asset('admin/global_assets/js/main/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin/global_assets/js/plugins/loaders/blockui.min.js') }}"></script>
<!-- /core JS files -->

<!-- Theme JS files -->
<script src="{{ asset('admin/global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
<script src="{{ asset('admin/global_assets/js/plugins/forms/styling/switchery.min.js') }}"></script>
<script src="{{ asset('admin/global_assets/js/plugins/forms/wizards/steps.min.js') }}"></script>
<script src="{{ asset('admin/global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>
<script src="{{ asset('admin/global_assets/js/plugins/forms/tags/tokenfield.min.js') }}"></script>

<script src="{{ asset('admin/global_assets/js/plugins/notifications/noty.min.js') }}"></script>
<script src="{{ asset('admin/global_assets/js/plugins/notifications/sweet_alert.min.js') }}"></script>

<script src="{{ asset('admin/global_assets/js/plugins/uploaders/fileinput/fileinput.min.js') }}"></script>

<script src="{{ asset('admin/assets/js/app.js') }}"></script>
<!-- /theme JS files -->

<!-- Libraries JS files -->

<!-- /libraries JS files -->

<script src="{{ asset('admin/custom.js') }}" rel="application/javascript"></script>

@stack('script')

{!! (isset($script)) ? $script : '' !!}

</body>
</html>
