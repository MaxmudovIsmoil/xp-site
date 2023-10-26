@extends('layouts.app')
@section('title', 'Xprinter - News')
@section('content')
    <section class="news-section">
        @include('components.global.banner')
        <div class="container mt-5xl">
{{--            @include('components.global.navlink')--}}
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 col-xxl-8">

                    @foreach($news as $new)

                        <h2 class="title">{{ $new->name }}</h2>
                        <p class="subtitle opacity-75 text-link">{{ date('d.m.Y', strtotime($new->files->date)) }}</p>
                        <div>
                            <img class="img-thumbnail" src="{{ asset('file_uploaded/new/'.$new->files->file) }}" alt="Image not found">
                        </div>
                        <p class="description mt-3 mb-5 font-500">{{ $new->description }}</p>

                    @endforeach

                    <div class="news-pagination-div">
                        {{ $news->links() }}
                    </div>
                </div>

{{--                <div class="col-md-none col-lg-4 col-xl-4 col-xxl-4 global-card">--}}
{{--                    <div class="card">--}}
{{--                        <h4 class="card-title text-center mt-3">Related News</h4>--}}
{{--                        @for ($i = 0; $i < 2; $i++)--}}
{{--                        <a href="1" class="recently-products">--}}
{{--                            <img class="img-thumbnail"--}}
{{--                                src="{{ asset('client/img/news/2.jpg') }}"--}}
{{--                                class="card-img-top" alt="">--}}
{{--                            <div class="card-body">--}}
{{--                                <p class="card-title text-center font-500">Great Success on Computex 2019 sadf sad fsad fsad fsd</p>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                        @endfor--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>


        </div>
    </section>
@endsection
