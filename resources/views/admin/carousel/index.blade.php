@extends('admin.layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('admin/css/carousel.css?'.time()) }}">
@endsection

@section('content')

    <div class="card pl-3 pr-3 pb-3 pt-1 carousel">

        <div class="card-body p-0 pt-1">
            <div class="d-flex justify-content-end mt-1 mb-3">
                <button class="btn btn-outline-primary js_add_file_btn" data-toggle="modal" data-target="#add_file_modal"><i class="fa-solid fa-plus"></i> Qo'shish</button>
            </div>

            <div class="images-div">

                @foreach ($carousel as $c)
                    <div class="js_this_image_div carousel-one-div">
                        <span class="number-image">{{ $c->number }}</span>
                        <a data-fancybox="gallery" href="{{ asset('file_uploaded/carousel/'.$c->file) }}">
                            <img src="{{ asset('file_uploaded/carousel/'.$c->file) }}" class="file-image" alt="Image" />
                        </a>

                        <div class="d-none div-btns">
                            <button data-url="{{ route('carousel.destroy', [$c->id]) }}" class="js_delete_file_yes_btn btn btn-sm btn-danger">xa</button>
                            <button class="js_delete_file_no_btn btn btn-sm btn-secondary">yo'q</button>
                        </div>
                        <button class="js_delete_file_btn btn btn-block btn-sm btn-outline-danger"><i class="far fa-trash-alt"></i></button>
                    </div>

                @endforeach

            </div>

        </div>
    </div>


    @include('admin.carousel.add_edit_modal')

@endsection


@section('script')
    <script>

        /** file upload **/
        $('.js_add_file_form').on('submit', function(e) {
            e.preventDefault()
            let form = $(this)
            let action = form.attr('action')

            $.ajax({
                url: action,
                type: "POST",
                data: new FormData(this),
                dataType: "JSON",
                contentType: false,
                processData: false,
                success: (response) => {
                    console.log(response)

                    if(!response.status) {
                        if(response.error == "file required")
                            $('.js_file').addClass('is-invalid');
                    }

                    if (response.status)
                        location.reload()
                },
                error: (response) => {
                    console.log('errors: ', response);
                    if (typeof response.responseJSON.errors !== 'undefined') {

                        if (response.responseJSON.errors.number)
                            form.find('.js_number').addClass('is-invalid')

                        if (response.responseJSON.errors.file)
                            form.find('.js_file').addClass('is-invalid')

                    }
                }
            });
        });


        /** file delete **/
        $(document).on('click', '.js_delete_file_btn', function() {

            $(this).siblings('.div-btns').removeClass('d-none');
            $(this).addClass('d-none');
        });


        $(document).on('click', '.js_delete_file_no_btn', function() {

            let div_btns = $(this).closest('.div-btns');
            div_btns.addClass('d-none');
            div_btns.siblings('.js_delete_file_btn').removeClass('d-none');
        });


        $(document).on('click', '.js_delete_file_yes_btn', function() {
            let url = $(this).data('url');
            let token = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: url,
                type: "DELETE",
                dataType: "JSON",
                data: { '_token': token },
                success: (response) => {

                    if(response.status) {
                        $(this).closest('.js_this_image_div').remove();
                    }
                },
                error: (response) => {
                    console.log('error: ', response);
                }
            });

        });


    </script>
@endsection
