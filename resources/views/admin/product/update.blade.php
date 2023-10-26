@extends('admin.layouts.app')

@section('content')

        <div class="card">
            <div class="card-body p-0">

                <button data-url="{{ route('product.store') }}" class="btn btn-primary btn-sm add-user-btn js_add_btn">
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

                        @foreach ($product as $product)
                            <tr class="js_this_tr" data-id="{{ $product->id }}">
                                <td class="text-center">{{ 1 + $loop->index }}</td>
                                <td>
                                    {{ $product->name_en }}
                                </td>
                                <td>
                                {{ $product->name_ru }}
                                </td>
                                <td>
                                    {{ $product->name_uz }}
                                </td>
                                <td class="text-right">
                                    <div class="d-flex" style="float: right;">
                                        <a href="javascript:void(0);" class="text-primary mr-5 js_edit_btn"
                                            data-one_product_category_url="{{ route('product.getOne', $product->id) }}"
                                            data-update_url="{{ route('product.update', $product->id) }}" title="Edit">
                                            <i class="fas fa-pen mr-50"></i>
                                        </a>
                                        <a class="text-danger js_delete_btn" href="javascript:void(0);" data-toggle="modal"
                                            data-target="#deleteModal" data-name="{{ $product->name_ru }}"
                                            data-url="{{ route('product.destroy', $product->id) }}" title="Delete">
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

    </script>
@endsection
