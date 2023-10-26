@extends('layouts.app')
@section('title', 'Xprinter - Products')
@section('content')
   <section class="product-section">
    @include('components.global.banner')
        <div class="container mt-5xl">
            @include('components.global.navlink')
            <div class="row">
                <div class="lg-none col-xl-3 col-xxl-3 left">
                    <ul class="list-group">
                        @foreach($product_category as $pc)
                            <li class="list-group-item">
                                <a class="hover-list-item" href="{{ route('product', [$pc->id]) }}">{{ $pc->name_uz }}</a>
                            </li>
                        @endforeach

{{--                        <li class="list-group-item">--}}
{{--                            <a class="" href="/"><i class="fa-regular fa-chevron-down fz-14"></i> Receipt--}}
{{--                                Printer</a>--}}
{{--                            <ul class="list-group2">--}}
{{--                                <li class="i2 list-group-item">--}}
{{--                                    <a class="" href="/">--}}
{{--                                        80mm Series </a>--}}
{{--                                </li>--}}
{{--                                <li class="i2 list-group-item">--}}
{{--                                    <a class="" href="/">--}}
{{--                                        58mm Series </a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li class="list-group-item">--}}
{{--                            <a class="" href="/"><i class="fa-regular fa-chevron-down fz-14"></i> Label--}}
{{--                                Printer</a>--}}
{{--                            <ul class="list-group2">--}}
{{--                                <li class="i2 list-group-item">--}}
{{--                                    <a class="" href="/">--}}
{{--                                        2 Inch / 58mm Series </a>--}}
{{--                                </li>--}}
{{--                                <li class="i2 list-group-item">--}}
{{--                                    <a class="" href="/">--}}
{{--                                        3 Inch / 80mm Series </a>--}}
{{--                                </li>--}}
{{--                                <li class="i2 list-group-item">--}}
{{--                                    <a class="" href="/">--}}
{{--                                        Thermal Transfer Series--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li class="list-group-item">--}}
{{--                            <a class="" href="/"><i class="fa-regular fa-chevron-down fz-14"></i> Mobile--}}
{{--                                Printer</a>--}}
{{--                            <ul class="list-group2">--}}
{{--                                <li class="i2 list-group-item">--}}
{{--                                    <a class="" href="/">--}}
{{--                                        Mobile receipt printer--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="i2 list-group-item">--}}
{{--                                    <a class="" href="/">--}}
{{--                                        Mobile label printer </a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li class="list-group-item">--}}
{{--                            <a class="" href="/">Handheld POS Printer</a>--}}
{{--                        </li>--}}
{{--                        <li class="list-group-item">--}}
{{--                            <a class="" href="/">Panel printer</a>--}}
{{--                        </li>--}}

                    </ul>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-9 col-xxl-9 right">
                    <div class="row">
                        <div class="col-6 col-sm-6 col-md-4 col-lg-3 mb-4">
                            <a href="" class="card card-product-grid border-0">
                                <div class="img-wrap">
                                    <img src="{{ asset('client/img/products/1.jpg') }}" alt="1">
                                </div>
                                <figcaption class="card-product-info">
                                    <p href="" class="title">1</p>
                                </figcaption>
                            </a>
                        </div>
                        <div class="col-6 col-sm-6 col-md-4 col-lg-3 mb-4">
                            <a href="" class="card card-product-grid border-0">
                                <div class="img-wrap">
                                    <img src="{{ asset('client/img/products/2.jpg') }}" alt="2">
                                </div>
                                <figcaption class="card-product-info">
                                    <p href="" class="title">2</p>
                                </figcaption>
                            </a>
                        </div>
                        <div class="col-6 col-sm-6 col-md-4 col-lg-3 mb-4">
                            <a href="" class="card card-product-grid border-0">
                                <div class="img-wrap">

                                    <img src="{{ asset('client/img/products/3.jpg') }}" alt="3">
                                </div>
                                <figcaption class="card-product-info">
                                    <p href="" class="title">3</p>

                                </figcaption>
                            </a>
                        </div>
                        <div class="col-6 col-sm-6 col-md-4 col-lg-3 mb-4">
                            <a href="" class="card card-product-grid border-0">
                                <div class="img-wrap">

                                    <img src="{{ asset('client/img/products/1.jpg') }}" alt="4">
                                </div>
                                <figcaption class="card-product-info">
                                    <p href="" class="title">4</p>
                                </figcaption>
                            </a>
                        </div>
                        <div class="col-6 col-sm-6 col-md-4 col-lg-3 mb-4">
                            <a href="" class="card card-product-grid border-0">
                                <div class="img-wrap">

                                    <img src="{{ asset('client/img/products/2.jpg') }}" alt="5">
                                </div>
                                <figcaption class="card-product-info">
                                    <p href="" class="title">5</p>
                                </figcaption>
                            </a>
                        </div>
                        @include('components.global.pagination')
                    </div>
                </div>
            </div>

        </div>
   </section>
@endsection
