@extends('admin.layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('admin/css/product.css?'.time()) }}">
@endsection

@section('content')

    <div class="card product-create-card">
        <a href="{{ route('product.index', [session('category_id')]) }}" class="back-btn">
            <i class="fa-solid fa-arrow-left-long"></i>
        </a>
        <div class="card-header d-flex justify-content-center">
            <h3 class="text-center mb-0">Maxsulot Tahrirlash</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('product.update', ['product_id' => $id]) }}" method="POST" class="js_edit_form">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-3 form-group">
                        <label for="category_id">Kategoriya</label>
                        <select name="category_id" id="category_id" class="form-control js_category_id">
                            @foreach($category as $c)
                                <option value="{{ $c->id }}" @selected($product->category_id === $c->id)>{{ $c->name_uz }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="model">Model</label>
                        <input type="text" name="model" class="form-control js_model" id="model" placeholder="XP-Q302F" value="{{ $product->model }}" required>
                        <div class="invalid-feedback">{{ "The model field is required." }}</div>
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="photo">Rasm</label>
                        <input type="file" name="photo" class="form-control js_photo" id="photo">
                        <div class="invalid-feedback">{{ "The photo field is required." }}</div>
                    </div>
                    <div class="col-md-2 form-group pl-0 pr-0">
                        <label for="pdf">Pdf</label>
                        <input type="file" name="pdf" class="form-control js_pdf" id="pdf">
                        <div class="invalid-feedback">{{ "The pdf field is required." }}</div>
                    </div>
                    <div class="col-md-1 form-group pl-5" style="margin-top: 34px;">
                        <input class="form-check-input" name="popular" type="checkbox" value="1" @checked($product->popular) id="popular">
                        <label class="form-check-label" for="popular">
                            Popular
                        </label>
                    </div>

                    {{-- Order Details--}}
                    <div class="row js_product_detail_div">
                        @foreach($product_detail as $pd)
                            <div class="col-md-6 form-group mb-2 js_product_detail_one">
                                <div class="row product-detail-div-one">
                                    @foreach($pd->language as $pdl)
                                        <div class="col-md-6 mb-2">
                                            <label class="mb-0" for="key">Key {{ $pdl->locale }}</label>
                                            <input type="text" class="form-control" name="key_{{$pdl->locale}}[]" value="{{ $pdl->key }}" required />
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label class="mb-0" for="value">Value {{ $pdl->locale }}</label>
                                            <input type="text" class="form-control" name="value_{{$pdl->locale}}[]" value="{{ $pdl->value }}" required/>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="d-flex ml-2 js_product_detail_add_remove_btns">
                        <button class="btn btn-primary mr-1 js_add_product_detail_btn"><i class="fas fa-plus"></i> Qo'shish</button>
                        <button class="btn btn-danger mr-1 js_remove_product_detail_btn"><i class="fas fa-times"></i> O'chirish</button>
                        <button class="btn btn-success js_add_product_overview_btn1"><i class="fas fa-save"></i> Saqlash</button>
                    </div>
                </div>


            </form>

        </div>
    </div>


@endsection


@section('script')

    <script src="{{ asset('admin/js/product_create.js?'.time()) }}"></script>

    <script>
        function index_url() {
            let url = window.location.href;
            const index = url.indexOf('edit');
            if (index !== -1) {
                return url.substring(0, index - 1);
            }
            return url;
        }
        $(document).on('submit', '.js_edit_form', function(e) {
            e.preventDefault();

            $.ajax({
                url: $(this).attr('action'),
                type: "POST",
                data: new FormData(this),
                dataType: "JSON",
                contentType: false,
                processData: false,
                success: (response) => {
                    // console.log('res', response);
                    if(response.status) {
                        window.location.href = index_url();
                    }
                },
                error: (response) => {

                    console.log('errors: ', response);
                    if (typeof response.responseJSON.errors !== 'undefined') {
                        if (response.responseJSON.errors.model)
                            $('.js_model').addClass('is-invalid')
                    }

                }
            });
        });

    </script>
@endsection
