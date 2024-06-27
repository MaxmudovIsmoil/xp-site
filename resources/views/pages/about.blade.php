@extends('layouts.app')

@section('title', 'Xprinter - About')

@section('content')
    <section class="about-section">
        @include('components.global.banner')
        <div class="container mt-5xl">
{{--            @include('components.global.navlink')--}}

            <div class="row">
                <div class="col-sm-12 col-lg-6 col-xl-6">
                    @isset($about->language[0]->description)
                        {!! $about->language[0]->description !!}
                    @endisset
                </div>
                <div class="col-sm-12 col-lg-6 col-xl-6">
                    @isset($about->image)
                    <img src="{{ asset('file_uploaded/about/'.$about->image) }}" alt="Image not found"
                         class="img-thumbnail">
                    @endisset
                </div>
            </div>

            <div class="swiper aboutSlider mt-5">
                <div class="swiper-wrapper">

                    @isset($about->files)
                    @foreach($about->files as $file)
                        <div class="swiper-slide">
                            <img class="rounded" src="{{ asset('file_uploaded/about/'.$file->file) }}" alt="Image not found">
                        </div>
                    @endforeach
                    @endisset

                </div>
                <div class="swiper-pagination"></div>
        </div>
    </section>
@endsection
