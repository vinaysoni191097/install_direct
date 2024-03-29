<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Dashboard | Install Direct</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('images/small-logo.png') }}">

    {{-- Alpine Js --}}
    <script src="{{ asset('admin/js/alpine.js') }}" defer></script>

    <!-- DataTables -->
    <link href="{{ asset('admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet') }}"
        type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{ asset('admin/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('admin/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('admin/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

    {{-- Choices CSS  --}}

    <link rel="stylesheet" href="{{ asset('admin/css/choices.min.css') }}" type="text/css">





</head>
</head>

<body data-topbar="dark">
    {{-- Compiling Tailwind Classes for Attributes --}}
    <input type="hidden" class="bg-yellow-700  border-yellow-300 bg-green-800">

    <div id="layout-wrapper">
        <!-- ===== Header Start ===== -->
        @include('admin.partials.header')
        <!-- ===== Header End ===== -->
        <!-- ===== Sidebar Start ===== -->
        @include('admin.partials.sidebar')
        <!-- ===== Sidebar End ===== -->

        <!-- ===== Main Content Start ===== -->

        <main>
            <div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </div>

                @include('admin.partials.footer')
            </div>

        </main>

    </div>
    <!-- JAVASCRIPT -->
    <script src="{{ asset('admin/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/js/validation.min.js') }}"></script>
    <script src="{{ asset('js/form-validate.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('admin/js/choices.js') }}"></script>

    @stack('scripts')
    @stack('modals')
</body>



</html>
