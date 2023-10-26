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
                <h3 class="text-center mb-0">Maxsulot qo'shish</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('product.store') }}" method="POST" class="js_add_form" enctype="multipart/form-data">
                    @csrf
                        <div class="row">
                            <div class="col-md-3 form-group">
                                <label for="category_id">Kategoriya</label>
                                <select name="category_id" id="category_id" class="form-control js_category_id">
                                    @foreach($category as $c)
                                        <option value="{{ $c->id }}" @selected(Session::get('category_id') == $c->id)>{{ $c->name_uz }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="model">Model</label>
                                <input type="text" name="model" class="form-control js_model" id="model" placeholder="XP-Q302F" required>
                                <div class="invalid-feedback">{{ "The model field is required." }}</div>
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="photo">Rasm</label>
                                <input type="file" name="photo" class="form-control js_photo" id="photo" required>
                                <div class="invalid-feedback">{{ "The photo field is required." }}</div>
                            </div>
                            <div class="col-md-2 form-group pl-0 pr-0">
                                <label for="pdf">Pdf</label>
                                <input type="file" name="pdf" class="form-control js_pdf" id="pdf">
                                <div class="invalid-feedback">{{ "The pdf field is required." }}</div>
                            </div>
                            <div class="col-md-1 form-group pl-5" style="margin-top: 34px;">
                                <input class="form-check-input" name="popular" type="checkbox" value="1" id="popular">
                                <label class="form-check-label" for="popular">
                                    Popular
                                </label>
                            </div>

                            {{-- Order Details--}}
                            <div class="row js_product_detail_div">
                                <div class="col-md-6 form-group mb-2 js_product_detail_one">
                                    <div class="row product-detail-div-one">
                                        <div class="col-md-6 mb-2">
                                            <label class="mb-0" for="key">Key En</label>
                                            <input type="text" class="form-control" name="key_en[]" value="Brand name" required />
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label class="mb-0" for="value">Value En</label>
                                            <input type="text" class="form-control" name="value_en[]" value="Xprinter" required/>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label class="mb-0" for="key">Key Ru</label>
                                            <input type="text" class="form-control" name="key_ru[]" value="Имя бренда" required/>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label class="mb-0" for="value">Value Ru</label>
                                            <input type="text" class="form-control" name="value_ru[]" value="Экспринтер" required/>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label class="mb-0" for="key">Key Uz</label>
                                            <input type="text" class="form-control" name="key_uz[]"  value="Brendning nomi" required/>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label class="mb-0" for="value">Value Uz</label>
                                            <input type="text" class="form-control" name="value_uz[]" value="Xprinter" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 js_product_detail_one">
                                    <div class="row product-detail-div-one">
                                        <div class="col-md-6 mb-2">
                                            <label class="mb-0" for="key">Key En</label>
                                            <input type="text" class="form-control" name="key_en[]" placeholder="Place of Origin" required/>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label class="mb-0" for="value">Value En</label>
                                            <input type="text" class="form-control" name="value_en[]" placeholder="China" required/>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label class="mb-0" for="key">Key Ru</label>
                                            <input type="text" class="form-control" name="key_ru[]" placeholder="Место происхождения" required/>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label class="mb-0" for="value">Value Ru</label>
                                            <input type="text" class="form-control" name="value_ru[]" placeholder="Китай" required/>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label class="mb-0" for="key">Key Uz</label>
                                            <input type="text" class="form-control" name="key_uz[]"  placeholder="Ishlab chiqarilgan" required/>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label class="mb-0" for="value">Value Uz</label>
                                            <input type="text" class="form-control" name="value_uz[]" placeholder="Xitoy" required/>
                                        </div>
                                    </div>
                                </div>
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
        $(document).on('submit', '.js_add_form', function(e) {
            e.preventDefault();
            let category_id = $('.js_category_id').val();
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
                        let url = window.location.href.slice(0, -7);
                        window.location.assign(url);
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
