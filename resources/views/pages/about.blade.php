@extends('layouts.app')

@section('title', 'Xprinter - About')

@section('content')
    <section class="about-section">
        @include('components.global.banner')
        <div class="container mt-5xl">
{{--            @include('components.global.navlink')--}}

            <div class="row">
                <div class="col-sm-12 col-lg-6 col-xl-6">
                    {!! $about->description !!}
                </div>
                <div class="col-sm-12 col-lg-6 col-xl-6">
                    <img src="https://img5541.weyesimg.com/uploads/www.xprintertech.com/images/16697085372540.jpg?imageView2/2/w/915/q/75/format/webp" alt="Image not found" class="img-thumbnail">
                </div>
            </div>

            <div class="swiper aboutSlider mt-5">
                <div class="swiper-wrapper">

                    @foreach($about->files as $file)

                        <div class="swiper-slide">
                            <img class="rounded" src="{{ asset('/file_uploaded/about/'.$file->file) }}" alt="Image not found">
                        </div>

                    @endforeach

                </div>
                <div class="swiper-pagination"></div>
        </div>
    </section>
@endsection
