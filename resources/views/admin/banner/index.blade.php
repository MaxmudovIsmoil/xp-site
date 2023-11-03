@extends('admin.layouts.app')

@section('style')
    <style>
        .banner .image-div .file-image {
            width: 100%;
        }
    </style>
@endsection

@section('content')

    <div class="card pl-3 pr-3 pb-3 pt-1 banner">

        <div class="card-body p-0 pt-1">
            <div class="d-flex justify-content-end mt-1 mb-3">
                <button class="btn btn-outline-primary js_file_btn" data-toggle="modal" data-target="#file_modal">
                    <i class="fa-solid fa-plus"></i> Yangi rasm yuklash
                </button>
            </div>

            <div class="image-div">

                <a data-fancybox="gallery" href="{{ asset('file_uploaded/banner/' . $banner->file) }}">
                    <img src="{{ asset('file_uploaded/banner/' . $banner->file) }}" class="file-image" alt="Image" />
                </a>
                <span class="text-danger">1920 x 460</span>
            </div>

        </div>
    </div>


    @include('admin.banner.file_modal')

@endsection


@section('script')
    <script>


        $('.js_file_form').on('submit', function(e) {
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
                        if(response.error == "required")
                            $('.js_file').addClass('is-invalid');
                    }

                    if (response.status)
                        window.location.reload()
                },
                error: (response) => {
                    console.log('errors: ', response);
                    if (typeof response.responseJSON.errors !== 'undefined') {

                        if (response.responseJSON.errors.file)
                            form.find('.js_file').addClass('is-invalid')
                    }
                }
            });
        });


    </script>
@endsection
