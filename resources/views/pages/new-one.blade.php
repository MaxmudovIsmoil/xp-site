@extends('layouts.app')
@section('title', 'Xprinter - News')
@section('content')
    <section class="news-section">
        @include('components.global.banner')
        <div class="container mt-5xl">

            <div class="d-flex justify-content-between mb-4 global-nav">
                <div class="title">New</div>
                <div class="font-500 nav-url">
                    <a href="{{ route('index') }}">Home</a>
                    <i class="fa-solid fa-angle-right fz-12"></i>
                    <a href="{{ route('news') }}">News</a>
                    <i class="fa-solid fa-angle-right fz-12"></i>
                    <a href="#">New</a>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 col-xxl-8">
                    <h2 class="title">{{ $new->name }}</h2>
                    <p class="subtitle opacity-75 text-link">{{ date('d.m.Y', strtotime($new->files->date)) }}</p>
                    <div>
                        <img class="img-thumbnail" src="{{ asset('file_uploaded/new/' . $new->files->file) }}" alt="Image not found">
                    </div>
                    <p class="description mt-3 font-500">{{ $new->description }}</p>
                </div>

                @empty(!$last_news)
                <div class="col-md-none col-lg-4 col-xl-4 col-xxl-4 global-card">
                    <div class="card">
                        <h4 class="card-title text-center mt-3">Last News</h4>
                        @foreach ($last_news as $last_new)
                        <a href="{{ $last_new->id }}" class="recently-products">
                            <img class="img-thumbnail card-img-top"
                                src="{{ asset('file_uploaded/new/'. $last_new->file) }}" alt="Image">
                            <div class="card-body">
                                <p class="card-title text-center font-500">{{ $last_new->language[0]->name }}</p>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
                @endempty
            </div>
        </div>
    </section>
@endsection
