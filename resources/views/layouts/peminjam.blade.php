<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Digital Library</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{ asset('DashboardFront/assets/icon.png') }}" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('DashboardFront/css/styles.css') }}" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        @include('layouts.include.user-part.navbar')
        <!-- Header-->
        @include('layouts.include.user-part.header')
        <!-- Section-->
        @yield('content')
        <!-- Footer-->
        @include('layouts.include.user-part.footer')
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('DashboardFront/js/scripts.js') }}"></script>
    </body>
</html>
