@extends('admin.layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('admin/css/product_addition.css?'.time()) }}">
@endsection

@section('content')

    <div class="card pl-3 pr-3 pb-3 pt-1 product_photo">

        <div class="card-body p-0 pt-1">
            <div class="d-flex justify-content-between mt-1 mb-3">
                <a href="{{ route('product.index', [session('category_id')]) }}" class="back-btn">
                    <i class="fa-solid fa-arrow-left-long"></i>
                </a>
                <h3>{{ $model }}</h3>
                <i>+</i>
            </div>
            <div class="btn-group d-flex mb-3 ">
                <a href="#" class="btn btn-primary js_product_photo">Maxsulot rasmlari</a>
                <a href="#" class="btn btn-outline-primary js_product_overview">Maxsulotga umimiy malumot</a>
                <a href="#" class="btn btn-outline-primary js_product_specification">Mahsulot spetsifikatsiyasi</a>
                <a href="#" class="btn btn-outline-primary js_product_service_support">Service and Support</a>
            </div>
            <div>
                <div class="div_photo">
                    @include('admin.product.addition.photo')
                </div>
                <div class="div_overview d-none">
                    @include('admin.product.addition.product_overview')
                </div>
                <div class="div_specification d-none">
                    @include('admin.product.addition.product_specification')
                </div>
                <div class="div_service_support d-none">
                    @include('admin.product.addition.product_service_support')
                </div>
            </div>
        </div>
    </div>

@endsection


@section('script')
    <script src="{{ asset('admin/js/product_addition.js?'.time()) }}"></script>
    <script src="{{ asset('admin/js/product_photo.js?'.time()) }}"></script>
    <script src="{{ asset('admin/js/product_overview.js?'.time()) }}"></script>
    <script src="{{ asset('admin/js/product_specification.js?'.time()) }}"></script>
    <script src="{{ asset('admin/js/product_service_support.js?'.time()) }}"></script>
@endsection
