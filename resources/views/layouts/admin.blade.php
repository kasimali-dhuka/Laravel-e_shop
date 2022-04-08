<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('admin/images/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('admin/images/favicon.png') }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('admin/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

    {{-- SweetAlert js --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.8/dist/sweetalert2.all.min.js"></script>
    <!-- Scripts -->
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> --}}
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    

    <!-- Styles -->
    <link href="{{ asset('admin/css/material-dashboard.css') }}" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-200">
    @include('layouts.inc.sidebar')

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        @include('layouts.inc.adminnav')

        <div class="container-fluid py-4">

            @yield('content')
            
            @include('layouts.inc.adminfooter')
        </div>
    </main>

    <script src="{{ asset('admin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/js/popper.min.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/js/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('admin/js/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('admin/js/chartjs.min.js') }}"></script>
    <script src="{{ asset('admin/js/material-dashboard.js') }}"></script>
    <script src="{{ asset('admin/js/custom.js') }}"></script>
    @yield('scripts')
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
          var options = {
            damping: '0.5'
          }
          Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    @if (session('status'))
    <script>
        Swal.fire(
            'Success!',
            '{{ session('status') }}',
            'success'
        )
    </script>
    @endif
</body>
</html>
