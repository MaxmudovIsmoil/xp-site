<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="https://img5541.weyesimg.com/uploads/rsirawa8.allweyes.com/images/15509020374428.ico">
    <link rel="stylesheet" href="{{ asset('client/packages/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('client/packages/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('client/packages/swiper/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('client/packages/fancybox/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('client/packages/xzoom/xzoom.min.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/_main.css') }}">
</head>

<body>
    @include('layouts.header')
        @yield('content')
    @include('layouts.footer')


    <script src="{{ asset('client/packages/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('client/packages/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('client/packages/popper/popper.min.js') }}"></script>
    <script src="{{ asset('client/packages/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('client/packages/fontawesome/js/pro.min.js') }}"></script>
    <script src="{{ asset('client/packages/fancybox/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('client/packages/hammer/hammer.min.js') }}"></script>
    <script src="{{ asset('client/packages/xzoom/xzoom.min.js') }}"></script>
    <script src="{{ asset('client/js/app.js') }}"></script>
</body>
</html>
