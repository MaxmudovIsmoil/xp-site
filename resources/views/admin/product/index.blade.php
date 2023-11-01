@extends('admin.layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('admin/css/product.css?'. time()) }}">
@endsection
@section('content')

        <div class="card product">
            <div class="btn-group">
                @foreach($category as $c)
                    <a href="{{ route('product.index', [$c->id]) }}" class="btn @if(Session::get('category_id') == $c->id) btn-primary @else btn-outline-primary @endif">{{ $c->name_uz }}</a>
                @endforeach
            </div>

            <div class="card-body p-0 position-relative">

                <a href="{{ route('product.create', [Session::get('category_id')]) }}" class="btn btn-primary btn-sm add-user-btn">
                    <i class="fas fa-plus"></i> &nbsp; Qo'shish
                </a>

                <table class="table table-sm table-border table-striped table-hover" id="product_datatable">
                    <thead>
                        <tr>
                            <th class="text-center" width="5%">№</th>
                            <th width="35%">Photo</th>
                            <th width="30%">Model</th>
                            <th width="5%">Popular</th>
                            <th width="25%" class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($products as $product)
                            <tr class="js_this_tr" data-id="{{ $product->id }}">
                                <td class="text-center">{{ 1 + $loop->index }}</td>
                                <td class="td-photo">
                                    <a data-fancybox="gallery" href="{{ asset('/file_uploaded/product/' . $product->photo) }}">
                                        <img src="{{ asset('/file_uploaded/product/' . $product->photo) }}" class="product-photo" alt="Image" />
                                    </a>
                                </td>
                                <td>
                                    {{ $product->model }}
                                </td>
                                <td class="pl-4 td-star">
                                    @if($product->popular == 1)
                                        <i class="fas fa-star" style="color: orange"></i>
                                    @else
                                        <i class="fa-regular fa-star"></i>
                                    @endif

                                </td>
                                <td class="text-right">
                                    <div class="d-flex" style="float: right;">
                                        <a href="{{ route('product.addition', $product->id) }}" class="btn btn-info btn-sm mr-1">
                                            <i class="fa-solid fa-plus"></i> Qo'shimchalar
                                        </a>
                                        <a href="{{ route('product.edit', ['category_id' => session('category_id'), 'product_id' => $product->id]) }}" class="btn btn-sm btn-primary mr-1" title="Edit">
                                            <i class="fas fa-pen mr-1"></i> Tahrirlash
                                        </a>
                                        <a class="btn btn-sm btn-danger js_delete_btn" href="javascript:void(0);" data-toggle="modal"
                                            data-target="#deleteModal" data-name="{{ $product->model }}"
                                            data-url="{{ route('product.destroy', $product->id) }}" title="Delete">
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



{{--    @include('admin.product.add_edit_modal')--}}

@endsection


@section('script')
    <script>

        $('#product_datatable').DataTable({
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
