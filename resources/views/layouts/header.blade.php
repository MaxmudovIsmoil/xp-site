<div class="container">
    <nav class="navbar navbar-expand-lg mb-3">

        <a href="{{ route('index') }}"><img src="{{ asset('client/img/logo.png') }}" alt="" class="navbar-brand"></a>

        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-content">
            <div class="hamburger-toggle">
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbar-content">
            <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link @if (Request::segment(1) === null || Request::segment(1) === 'index') active @endif" aria-current="page"
                        href="{{ route('index') }}">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link @if (Request::segment(1) === 'product' || Request::segment(1) === 'product-detail') active @endif" href="{{ route('product') }}">Products</a>

{{--                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">Products</a>--}}
{{--                    <ul class="dropdown-menu">--}}
{{--                        <li><a class="dropdown-item" href="">Cloud Printer</a></li>--}}
{{--                        <li class="dropend">--}}
{{--                            <a href="#" class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown"--}}
{{--                                data-bs-auto-close="outside">Receipt Printer</a>--}}
{{--                            <ul class="dropdown-menu">--}}
{{--                                <li><a class="dropdown-item" href="">80mm Series</a></li>--}}
{{--                                <li><a class="dropdown-item" href="">58mm Series</a></li>--}}
{{--                                <li><a class="dropdown-item" href="">76mm Series</a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li class="dropend">--}}
{{--                            <a href="#" class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown"--}}
{{--                                data-bs-auto-close="outside">Label Printer</a>--}}
{{--                            <ul class="dropdown-menu dropdown-submenu">--}}
{{--                                <li><a class="dropdown-item" href=""> Third level 1</a></li>--}}
{{--                                <li><a class="dropdown-item" href=""> Third level 2</a></li>--}}
{{--                                <li><a class="dropdown-item" href=""> Third level 3</a></li>--}}
{{--                                <li><a class="dropdown-item" href=""> Third level 4</a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li><a class="dropdown-item" href="#">Mobile Printer</a></li>--}}
{{--                        <li><a class="dropdown-item" href="#">Other Printer</a></li>--}}
{{--                    </ul>--}}
                </li>
                <li class="nav-item">
                    <a class="nav-link @if (Request::segment(1) == 'news' || Request::segment(1) == 'new') active @endif"
                        href="{{ route('news') }}">News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(Request::segment(1) == 'about') active @endif" href="{{ route('about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(Request::segment(1) == 'contact') active @endif" href="{{ route('contact') }}">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(Request::segment(1) == 'drivers') active @endif" href="{{ route('driver') }}">Drivers</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                        data-bs-auto-close="outside"><i class="fa-regular fa-globe"></i> Lang</a>
                    <ul class="dropdown-menu flags">
                        <li><a href="{{ route('locale', ['uz']) }}" class="dropdown-item @if(session('locale') === 'uz') active @endif">
                                <img src="{{ asset('client/img/flags/uz.png') }}" alt="uz"/> UZ</a>
                        </li>
                        <li><a href="{{ route('locale', ['en']) }}" class="dropdown-item @if(session('locale') === 'en') active @endif">
                                <img src="{{ asset('client/img/flags/en.png') }}" alt="en"/> EN</a>
                        </li>
                        <li><a href="{{ route('locale', ['ru']) }}" class="dropdown-item @if(session('locale') === 'ru') active @endif">
                                <img src="{{ asset('client/img/flags/ru.png') }}" alt="ru"/> RU</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item" id="changeTheme">
                    <a class="nav-link" href="#" id="theme-toggle"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link border rounded-2 bg-gradient-info dark-text-dark" href="tel:+8613910998888">
                        <i class="fa-solid fa-phone font-sm"></i> {{ Helper::contact_phone() }}</a>
                </li>
            </ul>
        </div>
    </nav>

    @include('components.global.search')
</div>
