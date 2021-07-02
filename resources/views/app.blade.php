<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title') | {{ config("app.name") }}</title>

    <link rel="stylesheet" href="{{ asset('assets/backend/modules/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ mix('css/all.css') }}">
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">

            <x-header/>

            <x-sidebar/>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">

                    <router-view></router-view>

                </section>
            </div>

            <x-footer/>

        </div>
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
