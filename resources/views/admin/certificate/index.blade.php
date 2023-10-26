@extends('admin.layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('admin/css/certificate.css?'.time()) }}">
@endsection

@section('content')

    <div class="card pl-3 pr-3 pb-3 pt-1 certificate">
        <div class="div-tahrirlash-btns">
            <button class="btn btn-primary btn-sm js_edit_btn mt-1">
                <i class="fas fa-pen"></i> &nbsp; Tahrirlash
            </button>

            <div class="cancel_save_btn d-none mt-1">
                <button data-url="{{ route('certificate.update', [1]) }}" class="btn btn-success btn-sm js_save_btn">
                    <i class="fa-solid fa-check"></i> Saqlash
                </button>
                <button class="btn btn-secondary btn-sm js_cancel_btn">
                    <i class="fa-solid fa-xmark"></i> Bekor qilish
                </button>
            </div>
        </div>

        <div class="card-body p-0 pt-1">

            <span>En:</span>
            @isset($certificate->language[0])
                @if($certificate->language[0]->locale == 'en')
                    <h3 class="js_name_en_html js_html">{{ $certificate->language[0]->name }}</h3>
                @endif

                @if($certificate->language[0]->locale == 'en')
                    <p class="js_description_en_html js_html">{{ $certificate->language[0]->description }}</p>
                @endif
            @endisset

            <div class="d-none js_div_form mt-1">
                <div>
                    <input type="text" name="name_en" class="form-control mb-1 js_name_en" value="@if(isset($certificate->language[0]) && $certificate->language[0]->locale == 'en') {{ $certificate->language[0]->name }} @endif">
                    <div class="invalid-feedback mb-1">{{ "The name en field is required." }}</div>
                </div>

                <div>
                    <textarea name="description_en" class="form-control js_description_en" rows="4">@if(isset($certificate->language[0]) && $certificate->language[0]->locale == 'en'){{ $certificate->language[0]->description }}@endif</textarea>
                    <div class="invalid-feedback mb-1">{{ "The description en field is required." }}</div>
                </div>
            </div>
            <hr>

            <span>Ru:</span>
            @isset($certificate->language[0])
                @if($certificate->language[1]->locale == 'ru')
                    <h3 class="js_name_ru_html js_html">{{ $certificate->language[1]->name }}</h3>
                @endif

                @if($certificate->language[1]->locale == 'ru')
                    <p class="js_description_ru_html js_html mt-1">{{ $certificate->language[1]->description }}</p>
                @endif
            @endisset

            <div class="d-none js_div_form">

                <div>
                    <input type="text" name="name_ru" class="form-control mb-2 js_name_ru" value="@if((isset($certificate->language[0])) && $certificate->language[1]->locale == 'ru'){{ $certificate->language[1]->name }}@endif">
                    <div class="invalid-feedback mb-1">{{ "The name ru field is required." }}</div>
                </div>

                <div>
                    <textarea name="description_ru" class="form-control js_description_ru" rows="4">@if((isset($certificate->language[0])) && $certificate->language[1]->locale == 'ru'){{ $certificate->language[1]->description }}@endif</textarea>
                    <div class="invalid-feedback mb-1">{{ "The description ru field is required." }}</div>
                </div>
            </div>
            <hr>

            <span>Uz:</span>
            @isset($certificate->language[0])
                @if($certificate->language[2]->locale == 'uz')
                    <h3 class="js_name_uz_html js_html">{{ $certificate->language[2]->name }}</h3>
                @endif

                @if($certificate->language[2]->locale == 'uz')
                    <p class="js_description_uz_html js_html mt-1">{{ $certificate->language[2]->description }}</p>
                @endif
            @endisset


            <div class="d-none js_div_form">
                <div>
                    <input type="text" name="name_uz" class="form-control mb-2 js_name_uz" value="@if(isset($certificate->language[0]) && $certificate->language[2]->locale == 'uz'){{ $certificate->language[2]->name }}@endif">
                    <div class="invalid-feedback mb-1">{{ "The name uz field is required." }}</div>
                </div>

                <div>
                    <textarea name="description_uz" class="form-control js_description_uz" rows="4">@if(isset($certificate->language[0]) && $certificate->language[2]->locale == 'uz'){{ $certificate->language[2]->description }}@endif</textarea>
                    <div class="invalid-feedback mb-1">{{ "The description uz field is required." }}</div>
                </div>
            </div>
            <hr class="last-hr">

            <div class="images-div mt-1" >
                @isset($certificate->files)
                    @foreach ($certificate->files as $file)

                    <div class="js_this_image_div certificate-one-div" >
                        <a data-fancybox="gallery" href="{{ asset('/file_uploaded/certificate/'.$file->file) }}">
                            <img src="{{ asset('/file_uploaded/certificate/'.$file->file) }}" class="file-image" alt="Image" />
                        </a>
                        <div class="file-name">
                            <p class="text-center mb-0 js_name_p">{{ $file->name }}</p>
                            <input type="hidden" name="name" value="{{ $file->name }}" class="js_name_input" />
                            <i class="fa-solid fa-circle-check d-none js_save_icon text-success" data-url="{{ route('certificate.file_name', [$file->id]) }}"></i>
                            <i class="fa-solid fa-xmark d-none js_cancel_icon text-danger"></i>
                            <i class="fas fa-pen js_edit_icon"></i>
                        </div>

                        <div class="d-none div-btns">
                            <button data-url="{{ route('certificate.file_delete', [$file->id]) }}" class="js_delete_file_yes_btn btn btn-sm btn-danger image-delete-btn">xa</button>
                            <button class="js_delete_file_no_btn btn btn-sm btn-secondary image-delete-btn">yo'q</button>
                        </div>
                        <button class="js_delete_file_btn btn btn-block btn-sm btn-outline-danger image-delete-btn"><i class="far fa-trash-alt"></i></button>
                    </div>

                @endforeach
                @endisset
                <button class="btn btn-outline-primary js_add_file_btn ml-1" data-toggle="modal" data-target="#add_file_modal"><i class="fa-solid fa-plus"></i></button>
            </div>

        </div>
    </div>


    @include('admin.certificate.add_edit_modal')

@endsection



@section('script')

    <script src="{{ asset('admin/js/certificate.js?'.time()) }}"></script>

@endsection
