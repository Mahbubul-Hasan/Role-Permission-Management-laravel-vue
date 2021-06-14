<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title') | {{ config("app.name") }}</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/backend/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}assets/backend/modules/fontawesome/css/all.min.css">
    <!-- CSS Libraries -->
    @yield('style')
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/backend/css/style.css">
    <link rel="stylesheet" href="{{ asset('/') }}assets/backend/css/components.css">

    @yield('extra_style')
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">

            <x-header/>

            <x-sidebar/>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">

                    @yield('content')

                </section>
            </div>

            <x-footer/>

        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('/') }}assets/backend/modules/jquery.min.js"></script>
    <script src="{{ asset('/') }}assets/backend/modules/popper.js"></script>
    <script src="{{ asset('/') }}assets/backend/modules/tooltip.js"></script>
    <script src="{{ asset('/') }}assets/backend/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ asset('/') }}assets/backend/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="{{ asset('/') }}assets/backend/modules/moment.min.js"></script>
    <script src="{{ asset('/') }}assets/backend/js/stisla.js"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
    @yield('script')
    <!-- Template JS File -->
    <script src="{{ asset('/') }}assets/backend/js/scripts.js"></script>
    <script src="{{ asset('/') }}assets/backend/js/custom.js"></script>

    @yield('extra_script')
</body>
</html>
