<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="keyword" content="" />
    <meta name="author" content="WRAPCODERS" />
    <title>@yield('title', env('APP_NAME'))</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('user/img/cambiz-icon.png') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/vendors.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/daterangepicker.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/theme.min.css') }}" />
    <style>
        div.main-content {
            min-height: 90vh !important;
        }
    </style>

    @stack('css')
    <!--! HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries !-->
    <!--! WARNING: Respond.js doesn"t work if you view the page via file: !-->
    <!--[if lt IE 9]>
   <script src="https:oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js')}}"></script>
   <script src="https:oss.maxcdn.com/respond/1.4.2/respond.min.js')}}"></script>
  <![endif]-->

</head>

<body>
    @include('layouts.sidebar')
    @include('layouts.header')

    <main class="nxl-container">
        <div class="nxl-content">
            @yield('content')
            <footer class="footer">
                <p class="fs-11 text-muted fw-medium text-uppercase mb-0 copyright">
                    <span>Copyright ©</span>
                    <script>
                        document.write(new Date().getFullYear());
                    </script>
                </p>
                <div class="d-flex align-items-center gap-4">
                    <a href="javascript:void(0);" class="fs-11 fw-semibold text-uppercase">Help</a>
                    <a href="javascript:void(0);" class="fs-11 fw-semibold text-uppercase">Terms</a>
                    <a href="javascript:void(0);" class="fs-11 fw-semibold text-uppercase">Privacy</a>
                </div>

            </footer>
        </div>

    </main>
    <script src="{{ asset('assets/vendors/js/vendors.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/daterangepicker.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/circle-progress.min.js') }}"></script>
    <script src="{{ asset('assets/js/common-init.min.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard-init.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Check for success messages in session
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: '{{ session('success') }}',
                    position: 'top',
                    toast: true,
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer);
                        toast.addEventListener('mouseleave', Swal.resumeTimer);
                    },
                });
            @endif

            // Check for specific error messages in session (like duplicate practice area error)
            @if (session('error'))
                Swal.fire({
                    icon: 'error',
                    title: '{{ session('error') }}',
                    position: 'top',
                    toast: true,
                    showConfirmButton: false,
                    timer: 5000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer);
                        toast.addEventListener('mouseleave', Swal.resumeTimer);
                    },
                });
            @endif

            // Check for validation error messages in session
            @if ($errors->any())
                Swal.fire({
                    icon: 'error',
                    title: 'Please correct the following errors:',
                    html: '<ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>',
                    position: 'top',
                    toast: true,
                    showConfirmButton: false,
                    timer: 5000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer);
                        toast.addEventListener('mouseleave', Swal.resumeTimer);
                    },
                });
            @endif
        });
    </script>

    @stack('js')
</body>

</html>
