<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Popfolio')</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('limitless/assets/css/ltr/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('limitless/assets/css/ltr/bootstrap_limitless.min.css') }}">
    <link rel="stylesheet" href="{{ asset('limitless/assets/css/ltr/layout.min.css') }}">
    <link rel="stylesheet" href="{{ asset('limitless/assets/css/ltr/components.min.css') }}">
    <link rel="stylesheet" href="{{ asset('limitless/assets/css/ltr/colors.min.css') }}">

</head>
<body>

    <!-- Main navbar -->
    <div class="navbar navbar-expand-md navbar-dark">
        <div class="navbar-brand">
            <a href="{{ url('/') }}" class="d-inline-block">Popfolio</a>
        </div>

        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
                    <i class="icon-paragraph-justify3"></i>
                </a>
            </li>
        </ul>
    </div>
    <!-- /main navbar -->

    <!-- Page content -->
    <div class="page-content">

        <!-- Main sidebar -->
        <div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">
            <div class="sidebar-content">

                <!-- Main navigation -->
                <!-- /main navigation -->

            </div>
        </div>
        <!-- /main sidebar -->

        <!-- Main content -->
        <div class="content-wrapper">
            <div class="content">
                @yield('content')
            </div>
        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

    <!-- JS -->
    <script src="{{ asset('limitless/assets/js/main/jquery.min.js') }}"></script>
    <script src="{{ asset('limitless/assets/js/main/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('limitless/assets/js/app.js') }}"></script>

    @yield('scripts')

</body>
</html>
