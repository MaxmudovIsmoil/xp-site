@extends('layouts.app')
@section('title', 'Xprinter - Drivers')
@section('content')
<section class="drivers-section">
        @include('components.global.banner')
        <div class="container mt-5xl">
            <div class="d-flex justify-content-between mb-4 global-nav">
                <div class="title">Driver</div>
                <div class="font-500 nav-url">
                    <a href="/">Home</a>
                    <i class="fa-solid fa-angle-right fz-12"></i>
                    <a href="{{ route('product') }}">Product</a>
                    <i class="fa-solid fa-angle-right fz-12"></i>
                    <a href="{{ route('product-detail', [$product_id]) }}">{{ $model }}</a>
                </div>
            </div>

            <div class="row">
                @foreach ($drivers as $driver)
                    <div class="col-sm-6 col-md-4 col-lg-3 col-xxl-2">
                        <div class="card mb-4">
                            <div class="view overlay">
                                <img class="card-img-top" src="{{ asset('file_uploaded/driver/logo/'.$driver->driver->system.'.png') }}"
                                    alt="Logo" />
                                <a href="{{ asset('file_uploaded/driver/'.$driver->driver->file) }}" target="_blank"><div class="mask rgba-white-slight"></div></a>
                                <p class="card-text">{{ $driver->driver->language[0]->name }}</p>
                            </div>
                            <div class="card-body">
                                <p class="card-text">{{ $driver->driver->language[0]->description }}</p>
                                <a href="{{ asset('file_uploaded/driver/'.$driver->driver->file) }}"  target="_blank" class="btn btn-primary">Download</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection
