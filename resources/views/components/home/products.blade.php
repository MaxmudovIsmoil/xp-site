<section class="products-component mt-5xl">
    <div class="text-center font-500 mb-5 w-75 mx-auto">
        <h1>Popular products</h1>
        <p>Xprinter - The latest innovations and designs from printer manufacturers will help to drive your business into the future and beyond</p>
    </div>
    <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-xl-5 g-4">

        @foreach($products as $product)
            <div class="col">
                <a href="{{ route('product-detail', [$product->id] )}}">
                    <div class="card">
                        <img src="{{ asset('file_uploaded/product/' . $product->photo) }}" class="card-img-top" alt="Image not found">
                        <div class="card-body">
                            <p class="card-text text-center font-2xl">{{ $product->model }}</p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>

{{--    <div class="text-center mt-5">--}}
{{--        <a href="{{ route('product') }}" class="btn btn-light rounded">Show more</a>--}}
{{--    </div>--}}

</section>
