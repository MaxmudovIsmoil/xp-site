<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>XPrinter</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

{{--    <link rel="icon" href="{{ asset('admin/images/hikvision_icon.png') }}" type="image/icon">--}}

    <link rel="stylesheet" href="{{ asset('admin/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/icons-css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/fontawesome-free-6.1/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/fancybox3.5/fancybox.min.css') }}">

    {{-- Text editer --}}
    <link rel="stylesheet" href="{{ asset('admin/text_editer/jquery-te-1.4.0.css') }}">

    {{-- <link rel="stylesheet" href="{{ asset('admin/css/bootstrap5.2.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('admin/css/form-validation.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/datatable.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/main.css') }}">

    @yield('style')
    <style>
        .active {
            color: #fff !important;
            background: #321fdb !important;
        }
    </style>

    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());
        gtag('config', 'UA-118965717-1');
    </script>

</head>
<body class="c-app">
<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand d-lg-down-none">
        <h3 class="h4">AiSoft</h3>
{{--        <img src="{{ asset('admin/images/hikvision_logo.png') }}" class="w-100" alt="Hikvision"/>--}}
    </div>
    <ul class="c-sidebar-nav ps ps--active-y">
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link @if(Request::segment(2) == 'dashboard') active @endif" href="{{ route('dashboard') }}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('admin/icons/sprites/free.svg#cil-home') }}"></use>
                </svg>
                Dashboard
            </a>
        </li>

        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link @if(Request::segment(2) == 'carousel') active @endif" href="{{ route('carousel.index') }}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('admin/icons/sprites/free.svg#cil-layers') }}"></use>
                </svg> Carousel
            </a>
        </li>

        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link @if(Request::segment(2) == 'banner') active @endif" href="{{ route('banner') }}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('admin/icons/sprites/free.svg#cil-user') }}"></use>
                </svg>
                Banner
            </a>
        </li>

        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link @if(Request::segment(2) == 'product-category') active @endif" href="{{ route('product_category.index') }}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('admin/icons/sprites/free.svg#cil-user') }}"></use>
                </svg>
               Product Category
            </a>
        </li>

        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link @if(Request::segment(2) == 'product') active @endif" href="{{ route('product.index', [1]) }}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('admin/icons/sprites/free.svg#cil-user') }}"></use>
                </svg>
                Products
            </a>
        </li>

        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link @if(Request::segment(2) == 'certificate') active @endif" href="{{ route('certificate.index') }}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('admin/icons/sprites/free.svg#cil-layers') }}"></use>
                </svg> Certificate
            </a>
        </li>


        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link @if(Request::segment(2) == 'new') active @endif" href="{{ route('new.index') }}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('admin/icons/sprites/free.svg#cil-layers') }}"></use>
                </svg> News
            </a>
        </li>


        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link @if(Request::segment(2) == 'about') active @endif" href="{{ route('about.index') }}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('admin/icons/sprites/free.svg#cil-font') }}"></use>
                </svg> About
            </a>
        </li>

        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link @if(Request::segment(2) == 'contact') active @endif" href="{{ route('contact.index') }}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('admin/icons/sprites/free.svg#cil-address-book') }}"></use>
                </svg> Contact
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link @if(Request::segment(2) == 'driver') active @endif" href="{{ route('driver.index') }}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('admin/icons/sprites/free.svg#cil-window-maximize') }}"></use>
                </svg> Drayverlar
            </a>
        </li>

        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link @if(Request::segment(2) == 'service') active @endif" href="{{ route('service.index') }}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('admin/icons/sprites/free.svg#cil-bar-chart') }}"></use>
                </svg> Servislar
            </a>
        </li>

    </ul>
    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
</div>
<div class="c-wrapper c-fixed-components">
    <header class="c-header c-header-light c-header-fixed c-header-with-subheader">
        <button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar"
                data-class="c-sidebar-show">
            <svg class="c-icon c-icon-lg">
                <use xlink:href="{{ asset('admin/icons/sprites/free.svg#cil-menu') }}"></use>
            </svg>
        </button>
        <a class="c-header-brand d-lg-none" href="#">
            <svg width="118" height="46" alt="CoreUI Logo">
                <use xlink:href="{{ asset('admin/icons/sprites/free.svg#full') }}"></use>
            </svg>
        </a>
        <button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar"
                data-class="c-sidebar-lg-show" responsive="true">
            <svg class="c-icon c-icon-lg">
                <use xlink:href="{{ asset('admin/icons/sprites/free.svg#cil-menu') }}"></use>
            </svg>
        </button>
        <ul class="c-header-nav ml-auto mr-4">
            <li class="c-header-nav-item d-md-down-none mx-2"><a class="c-header-nav-link" href="#">
                    <svg class="c-icon">
                        <use xlink:href="{{ asset('admin/icons/sprites/free.svg#cil-bell')  }}"></use>
                    </svg>
                </a></li>

            <li class="c-header-nav-item dropdown">
                <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <svg class="c-icon">
                        <use xlink:href="{{ asset('admin/icons/sprites/free.svg#cil-user') }}"></use>
                    </svg>
                    <div class="c-avatar ml-2">Admin</div>
                </a>
                <div class="dropdown-menu dropdown-menu-right pt-0 pb-0">

                    <a class="dropdown-item @if(Request::segment(1) == 'user-profile-show') active @endif" href="">
                        <svg class="c-icon mr-2">
                            <use xlink:href="{{ asset('admin/icons/sprites/free.svg#cil-settings') }}"></use>
                        </svg>
                        Parolni o'zgartirish
                    </a>
                    <a href="#" class="dropdown-item"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <svg class="c-icon mr-2">
                            <use xlink:href="{{ asset('admin/icons/sprites/free.svg#cil-account-logout') }}"></use>
                        </svg>
                        Tizimdan chiqish
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                </div>
            </li>
        </ul>
    </header>
    <div class="c-body">
        <main class="c-main p-3">
            <div class="container-fluid p-0">
                @yield('content')
            </div>
        </main>

    </div>
</div>

@include('admin.layouts.deleteModal')


<script src="{{ asset('admin/js/jQurey.js') }}"></script>
<script src="{{ asset('admin/js/coreui.bundle.min.js') }}"></script>
<!--[if IE]><!-->
<script src="{{ asset('admin/js/svgxuse.min.js') }}"></script>
<script src="{{ asset('admin/js/jquery-ui.js') }}"></script>
<!--<![endif]-->

@yield('text-editor')

<script src="{{ asset('admin/js/coreui-utils.js') }}"></script>
<script src="{{ asset('admin/js/datatable.js') }}"></script>

<script src="{{ asset('admin/fancybox3.5/fancybox.min.js') }}"></script>

<script src="{{ asset('admin/select2/js/select2.min.js') }}"></script>
{{-- number format --}}
<script src="{{ asset('admin/js/numeral.js') }}"></script>
<script src="{{ asset('admin/js/form-validation.js') }}"></script>

<script src="{{ asset('admin/js/function_validate.js') }}"></script>

<script src="{{ asset('admin/js/functionDelete.js') }}"></script>
<script src="{{ asset('admin/js/functions.js') }}"></script>

@yield('script')

</body>
</html>
