@extends('admin.layouts.app')

@section('content')

        <div class="card">
            <div class="card-body p-0">

                <button data-url="{{ route('product_category.store') }}" class="btn btn-primary btn-sm add-user-btn js_add_btn">
                    <i class="fas fa-plus"></i> &nbsp; Qo'shish
                </button>

                <table class="table table-sm table-border table-striped table-hover" id="product_category_datatable">
                    <thead>
                        <tr>
                            <th class="text-center" width="3%">№</th>
                            <th>Nomi En</th>
                            <th>nomi Ru</th>
                            <th>nomi Uz</th>
                            <th class="text-right">Harakat</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($categories as $product_category)
                            <tr class="js_this_tr" data-id="{{ $product_category->id }}">
                                <td class="text-center">{{ 1 + $loop->index }}</td>
                                <td>
                                    {{ $product_category->name_en }}
                                </td>
                                <td>
                                {{ $product_category->name_ru }}
                                </td>
                                <td>
                                    {{ $product_category->name_uz }}
                                </td>
                                <td class="text-right">
                                    <div class="d-flex" style="float: right;">
                                        <a href="javascript:void(0);" class="text-primary mr-5 js_edit_btn"
                                            data-one_product_category_url="{{ route('product_category.getOne', $product_category->id) }}"
                                            data-update_url="{{ route('product_category.update', $product_category->id) }}" title="Edit">
                                            <i class="fas fa-pen mr-50"></i>
                                        </a>
                                        <a class="text-danger js_delete_btn" href="javascript:void(0);" data-toggle="modal"
                                            data-target="#deleteModal" data-name="{{ $product_category->name_ru }}"
                                            data-url="{{ route('product_category.destroy', $product_category->id) }}" title="Delete">
                                            <i class="far fa-trash-alt mr-50"></i>
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



    @include('admin.product_category.add_edit_modal')

@endsection


@section('script')
    <script>
        function user_form_clear(form) {
            form.find("input[type='text']").val('')
            form.remove('input[name="_method"]');
        }

        var modal = $('#add_edit_modal')

        $('#product_category_datatable').DataTable({
            scrollY: '80vh',
            scrollCollapse: true,
            paging: true,
            pageLength: 50,
            lengthChange: false,
            searching: true,
            ordering: true,
            info: true,
            autoWidth: true,
            language: {
                search: "",
                searchPlaceholder: "Search",
            }
        });

        $(document).on('click', '.js_add_btn', function() {
            let url = $(this).data('url')
            let form = modal.find('.js_add_edit_form')

            form.attr('action', url)
            user_form_clear(form)
            modal.find('.modal-title').html('Kategoriya qo\'shish');
            modal.modal('show')
        })


        $(document).on('click', '.js_edit_btn', function() {

            let one_url = $(this).data('one_product_category_url')
            let update_url = $(this).data('update_url')
            let form = modal.find('.js_add_edit_form')
            user_form_clear(form)

            form.attr('action', update_url)
            form.append('<input type="hidden" name="_method" value="PUT">')
            $.ajax({
                type: 'GET',
                url: one_url,
                dataType: 'JSON',
                success: (response) => {
                    console.log(response)

                    if (response.status) {
                        form.find('.js_name_en').val(response.data.name_en)
                        form.find('.js_name_ru').val(response.data.name_ru)
                        form.find('.js_name_uz').val(response.data.name_uz)

                    }
                    modal.find('.modal-title').html('Kategoriya Tahrirlash')
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
                dataType: "JSON",
                data: form.serialize(),
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
                    }

                }
            })
        });
    </script>
@endsection
