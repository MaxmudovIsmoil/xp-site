@extends('layouts.app')
@section('title', 'Xprinter - Products')
@section('content')
   <section class="product-section">
    @include('components.global.banner')
        <div class="container mt-5xl">
            <div class="d-flex justify-content-between mb-4 global-nav">
                <div class="title">Category</div>
                <div class="font-500 nav-url">
                    <a href="/">Home</a>
                    <i class="fa-solid fa-angle-right fz-12"></i>
                    <a href="#">Product</a>
                </div>
            </div>

            <div class="row">
                <div class="lg-none col-xl-3 col-xxl-3 left">
                    <ul class="list-group">
                        @foreach($product_category as $pc)
                            <li class="list-group-item">
                                <a class="hover-list-item @if(isset($products[0]) && $products[0]->category_id === $pc->id) active @endif" href="{{ route('product', [$pc->id]) }}">{{ $pc->name_uz }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-9 col-xxl-9 right">
                    <div class="row">
                        @foreach($products as $product)
                            <div class="col-6 col-sm-6 col-md-4 col-lg-3 mb-4">
                                <a href="{{ route('product-detail', [$product->id]) }}" class="card card-product-grid border-0">
                                    <div class="img-wrap">
                                        <img src="{{ asset('file_uploaded/product/'. $product->photo) }}" alt="1" />
                                    </div>
                                    <figcaption class="card-product-info">
                                        <p href="{{ route('product-detail', [$product->id]) }}" class="title">{{ $product->model }}</p>
                                    </figcaption>
                                </a>
                            </div>
                        @endforeach

                        <div class="news-pagination-div global-pagination">
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
            </div>

        </div>
   </section>
@endsection
