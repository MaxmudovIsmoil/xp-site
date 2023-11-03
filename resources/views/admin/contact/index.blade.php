@extends('admin.layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('admin/css/about.css?'.time()) }}">
@endsection

@section('content')

    <div class="card pl-3 pr-3 pb-3 pt-1 about">
        <div class="card-body p-0 pt-1">

            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="contact-banner">
                        <div class="d-flex justify-content-end position-relative">
                            <button class="btn btn-primary position-absolute" data-toggle="modal" data-target="#image_modal" >O'rniga Yuklash</button>
                        </div>
                        <img src="{{ asset('file_uploaded/contact/'. $contact->image) }}" class="w-100" alt="contact banner" />
                    </div>
                </div>
                <div class="col-md-6">
                    <h4>Phone: <span class="js_phone">{{ Helper::phone_number_format($contact->phone) }}</span></h4>
                </div>
                <div class="col-md-6">
                    <h4>Email: <span class="js_email">{{ $contact->email }}</span></h4>
                </div>
            </div>

            <span>En:</span>
            @isset($contact->language[0])
                @if($contact->language[0]->locale == 'en')
                    <div class="js_address_en_html js_html mb-0">{!! $contact->language[0]->address !!}</div>
                @endif
            @endisset
            <hr class="last-hr mt-2 mb-2">

            <span>Ru:</span>
            @isset($contact->language[1])
                @if($contact->language[1]->locale == 'ru')
                    <div class="js_address_ru_html js_html mt-1 mb-0">{!! $contact->language[1]->address !!}</div>
                @endif
            @endisset
            <hr class="last-hr mt-2 mb-2">

            <span>Uz:</span>
            @isset($contact->language[2])
                @if($contact->language[2]->locale == 'uz')
                    <div class="js_address_uz_html js_html mt-1 mb-0">{!! $contact->language[2]->address !!}</div>
                @endif
            @endisset

            <hr class="last-hr mt-2 mb-2">
            <button class="btn btn-primary js_edit_btn" data-url="{{ route('contact.getOne') }}" data-id="{{ $contact->id }}">Edit</button>
        </div>
    </div>


    @include('admin.contact.add_edit_modal')

    @include('admin.contact.image_modal')

@endsection



@section('script')
    <script src="{{ asset('admin/js/contact.js?'.time()) }}"></script>
    <script>
        var modal = $('#edit_modal')
        $(document).on('click', '.js_edit_btn', function() {
            let url = $(this).data('url')
            let id = $(this).data('id');
            let form = modal.find('.js_edit_form')
            $.ajax({
                url: url,
                data: {'id': id},
                type: "GET",
                dataType: "JSON",
                success: (response) => {
                    // console.log('res', response);
                    form.find('.js_phone').val(response.data.phone);
                    form.find('.js_email').val(response.data.email);
                    $(response.data.language).each(function( i, item ) {
                        if(item.locale === 'en')
                            form.find('.js_address_en').val(item.address);
                        if(item.locale === 'ru')
                            form.find('.js_address_ru').val(item.address);
                        if(item.locale === 'uz')
                            form.find('.js_address_uz').val(item.address);
                    });
                },
                error: (response) => {
                    console.log('errors: ', response);
                }
            });
            modal.modal('show')
        })


        $(document).on('submit', '.js_edit_form', function(e) {
            e.preventDefault();
            let form = $(this);
            $.ajax({
                url: form.attr('action'),
                data: form.serialize(),
                type: "POST",
                dataType: "JSON",
                success: (response) => {
                    console.log('res', response);
                    if (response.status)
                        location.reload()
                },
                error: (response) => {

                    console.log('errors: ', response);
                    if (typeof response.responseJSON.errors !== 'undefined') {

                        if (response.responseJSON.errors.phone)
                            $('.js_phone').addClass('is-invalid')

                        if (response.responseJSON.errors.email)
                            $('.js_email').addClass('is-invalid')

                        if (response.responseJSON.errors.address_en)
                            $('.js_address_en').addClass('is-invalid')

                        if (response.responseJSON.errors.address_ru)
                            $('.js_address_ru').addClass('is-invalid')

                        if (response.responseJSON.errors.address_uz)
                            $('.js_address_uz').addClass('is-invalid')
                    }

                }
            });
        });

    </script>
@endsection
