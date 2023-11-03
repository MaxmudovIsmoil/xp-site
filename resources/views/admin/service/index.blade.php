@extends('admin.layouts.app')

@section('content')

        <div class="card">
            <div class="card-body p-0">

                <button data-url="{{ route('service.store') }}" class="btn btn-primary btn-sm add-user-btn js_add_btn">
                    <i class="fas fa-plus"></i> &nbsp; Qo'shish
                </button>

                <table class="table table-sm table-border table-striped table-hover" id="service_datatable">
                    <thead>
                        <tr>
                            <th class="text-center" width="3%">№</th>
                            <th>Icon</th>
                            <th>Nomi, Text En</th>
                            <th>Nomi, Text Ru</th>
                            <th>Nomi, Text Uz</th>
                            <th class="text-right">Harakat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($services as $service)
                            <tr class="js_this_tr" data-id="{{ $service->id }}">
                                <td class="text-center">{{ 1 + $loop->index }}</td>
                                <td class="pl-3" style="font-size: 30px;">{!! $service->icon !!}</td>
                                <td>
                                    @isset($service->language[0]->locale)
                                        @if($service->language[0]->locale == 'en')
                                            <h5 class="m-0 f-s-15">{{ $service->language[0]->name }}</h5>
                                        @endif
                                    @endisset

                                    @isset($service->language[0]->locale)
                                        @if($service->language[0]->locale == 'en')
                                            <p class="text-justify f-s-12">{{ $service->language[0]->description }}</p>
                                        @endif
                                    @endisset
                                </td>
                                <td>
                                    @isset($service->language[0]->locale)
                                        @if($service->language[1]->locale == 'ru')
                                            <h5 class="m-0 f-s-15">{{ $service->language[1]->name }}</h5>
                                        @endif
                                    @endisset

                                    @isset($service->language[0]->locale)
                                        @if($service->language[1]->locale == 'ru')
                                            <p class="text-justify f-s-12">{{ $service->language[1]->description }}</p>
                                        @endif
                                    @endisset
                                </td>
                                <td>
                                    @isset($service->language[0]->locale)
                                        @if($service->language[2]->locale == 'uz')
                                            <h5 class="m-0 f-s-15">{{ $service->language[2]->name }}</h5>
                                        @endif
                                    @endisset

                                    @isset($service->language[0]->locale)
                                        @if($service->language[2]->locale == 'uz')
                                            <p class="text-justify f-s-12">{{ $service->language[2]->description }}</p>
                                        @endif
                                    @endisset
                                </td>
                                <td class="text-right">
                                    <div class="d-flex" style="float: right;">
                                        <a href="javascript:void(0);" class="text-primary mr-4 js_edit_btn"
                                            data-one_new_url="{{ route('service.getOne', $service->id) }}"
                                            data-update_url="{{ route('service.update', $service->id) }}" title="Edit">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <a class="text-danger js_delete_btn mr-1" href="javascript:void(0);" data-toggle="modal"
                                            data-target="#deleteModal" data-name="@isset($service->language[2]->name) {{ $service->language[2]->name }} @endisset"
                                            data-url="{{ route('service.destroy', $service->id) }}" title="Delete">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
        <!-- list section end -->


    @include('admin.service.add_edit_modal')

@endsection


@section('script')
    <script>
        function user_form_clear(form) {
            form.find("input[type='text']").val('')
            form.find("textarea").val('')
            form.remove('input[name="_method"]');
        }


        $('#service_datatable').DataTable({
            scrollY: '80vh',
            scrollCollapse: true,
            paging: false,
            pageLength: 50,
            lengthChange: false,
            searching: true,
            ordering: true,
            info: false,
            autoWidth: true,
            language: {
                search: "",
                searchPlaceholder: "Search",
            }
        });


        $(document).on('click', '.js_add_btn', function() {
            let url = $(this).data('url');
            let modal = $('#add_edit_modal');
            let form = modal.find('.js_add_edit_form');

            form.attr('action', url);
            user_form_clear(form);
            modal.find('.modal-title').html('Servis qo\'shish');
            modal.modal('show');

        });


        $(document).on('click', '.js_edit_btn', function() {

            let one_url = $(this).data('one_new_url')
            let update_url = $(this).data('update_url')
            let modal = $('#add_edit_modal')
            let form = modal.find('.js_add_edit_form')
            user_form_clear(form)

            form.attr('action', update_url)
            form.append('<input type="hidden" name="_method" value="PUT">')
            $.ajax({
                type: 'GET',
                url: one_url,
                dataType: 'JSON',
                success: (response) => {
                    // console.log(response)

                    if (response.status) {
                        form.find('.js_icon').val(response.data.icon);

                        if( typeof response.data.language !== 'undefined' && response.data.language.length != 0) {

                            form.find('.js_name_en').val(response.data.language[0].name)
                            form.find('.js_description_en').val(response.data.language[0].description)

                            form.find('.js_name_ru').val(response.data.language[1].name)
                            form.find('.js_description_ru').val(response.data.language[1].description)

                            form.find('.js_name_uz').val(response.data.language[2].name)
                            form.find('.js_description_uz').val(response.data.language[2].description)
                        }
                    }

                    modal.find('.modal-title').html('Servis tahrirlash')
                    modal.modal('show')
                },
                error: (response) => {
                    console.log('error: ', response)
                }
            })
        })


        /** User submit store or update **/
        $('.js_add_edit_form').on('submit', function(e) {
            e.preventDefault()
            let form = $(this)
            let action = form.attr('action')

            $.ajax({
                url: action,
                type: "POST",
                data: form.serialize(),
                dataType: "JSON",
                success: (response) => {
                    // console.log(response)

                    if (response.status)
                        location.reload()
                },
                error: (response) => {
                    console.log('errors: ', response);
                    if (typeof response.responseJSON.errors !== 'undefined') {
                        if (response.responseJSON.errors.name_ru)
                            form.find('.js_name_ru').addClass('is-invalid')

                        if (response.responseJSON.errors.name_en)
                            form.find('.js_name_en').addClass('is-invalid')

                        if (response.responseJSON.errors.name_uz)
                            form.find('.js_name_uz').addClass('is-invalid')

                        if (response.responseJSON.errors.description_en)
                            form.find('.js_description_en').addClass('is-invalid')

                        if (response.responseJSON.errors.description_ru)
                            form.find('.js_description_ru').addClass('is-invalid')

                        if (response.responseJSON.errors.description_uz)
                            form.find('.js_description_uz').addClass('is-invalid')

                        if (response.responseJSON.errors.icon)
                            form.find('.js_icon').addClass('is-invalid')
                    }

                }
            })
        });
    </script>
@endsection
