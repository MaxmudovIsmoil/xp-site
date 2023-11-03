@extends('admin.layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('admin/css/about.css?'.time()) }}">
@endsection

@section('content')

    <div class="card pl-3 pr-3 pb-3 pt-1 about">
        <div class="div-btn-edit">
            <button class="btn btn-primary btn-sm js_edit_btn"><i class="fas fa-pen"></i> &nbsp; Tahrirlash </button>

            <div class="cancel_save_btn d-none">
                <button data-url="{{ route('about.update', [1]) }}" class="btn btn-success btn-sm js_save_btn">
                    <i class="fa-solid fa-check"></i> Saqlash
                </button>
                <button class="btn btn-secondary btn-sm js_cancel_btn">
                    <i class="fa-solid fa-xmark"></i> Bekor qilish
                </button>
            </div>
        </div>

        <div class="card-body p-0 pt-1">

            <span>En:</span>
            @isset($about->language)
                @if($about->language[0]->locale == 'en')
                    <div class="js_description_en_html js_html mb-0">{!! $about->language[0]->description !!}</div>
                @endif
            @endisset
                <div class="d-none js_div_form mt-0">
                    <textarea name="description_en" class="form-control js_description_en js_text_editer" rows="8">@if(isset($about->language[0]) && $about->language[0]->locale == 'en'){{ $about->language[0]->description }}@endif</textarea>
                    <div class="invalid-feedback mb-1">{{ "The description en field is required." }}</div>
                </div>

            <hr>

            <span>Ru:</span>
            @isset($about->language[1])
                @if($about->language[1]->locale == 'ru')
                    <div class="js_description_ru_html js_html mt-1 mb-0">{!! $about->language[1]->description !!}</div>
                @endif
            @endisset

            <div class="d-none js_div_form mt-0">
                <textarea name="description_ru" class="form-control js_description_ru js_text_editer" rows="8">@if(isset($about->language[1]) && $about->language[1]->locale == 'ru'){{ $about->language[1]->description }}@endif</textarea>
                <div class="invalid-feedback mb-1">{{ "The description ru field is required." }}</div>
            </div>
            <hr>

            <span>Uz:</span>
            @isset($about->language[2])
                @if($about->language[2]->locale == 'uz')
                    <div class="js_description_uz_html js_html mt-1 mb-0">{!! $about->language[2]->description !!}</div>
                @endif
            @endisset

            <div class="d-none js_div_form mt-0">
                <textarea name="description_uz" class="form-control js_description_uz js_text_editer" rows="8">@if(isset($about->language[2]) && $about->language[2]->locale == 'uz'){{ $about->language[2]->description }}@endif</textarea>
                <div class="invalid-feedback mb-1">{{ "The description uz field is required." }}</div>
            </div>

            <hr class="last-hr">

            <div class="about-banner">
                <div class="d-flex justify-content-end position-relative">
                    <button class="btn btn-primary position-absolute" data-toggle="modal" data-target="#image_modal" >O'rniga Yuklash</button>
                </div>
                <img src="{{ asset('file_uploaded/about/'.$about->image) }}" alt="about banner" />
            </div>

            <hr class="last-hr">

            <div class="images-div mt-1">
                @isset($about->files)
                    @foreach ($about->files as $file)

                    <div class="js_this_image_div about-one-div">
                        <a data-fancybox="gallery" href="{{ asset('file_uploaded/about/'.$file->file) }}">
                            <img src="{{ asset('file_uploaded/about/'.$file->file) }}" class="file-image" alt="Image" />
                        </a>

                        <div class="d-none div-btns">
                            <button data-url="{{ route('about.file_delete', [$file->id]) }}" class="js_delete_file_yes_btn btn btn-sm btn-danger image-delete-btn">xa</button>
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


    @include('admin.about.add_edit_modal')

    @include('admin.about.image_modal')

@endsection


@section('text-editor')
    {{-- Tet editer --}}
    <script src="{{ asset('admin/text_editer/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/text_editer/jquery-te-1.4.0.min.js') }}"></script>
@endsection



@section('script')
    <script src="{{ asset('admin/js/about.js?'.time()) }}"></script>
@endsection
