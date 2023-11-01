<div class="card">
    <div class="card-header">
        <button data-url="{{ route('product_overview.store') }}"
                class="btn btn-primary btn-sm js_add_overview_btn" >
            <i class="fas fa-plus"></i> &nbsp; Qo'shish
        </button>
    </div>
    <div class="card-body p-0">
        <table class="table table-sm table-border table-striped table-hover">
            <thead>
            <tr>
                <th class="text-center" width="3%">№</th>
                <th>Nomi En</th>
                <th>Nomi Ru</th>
                <th>Nomi Uz</th>
                <th class="text-right">Harakat</th>
            </tr>
            </thead>
            <tbody>

            @foreach ($product_overviews as $po)
                <tr class="js_this_tr" data-id="{{ $po->id }}">
                    <td class="text-center">{{ 1 + $loop->index }}</td>
                    <td>
                        @if(isset($po->language[0]) && $po->language[0]->locale == 'en')
                            {{ $po->language[0]->name }}
                        @endif
                    </td>
                    <td>
                        @if(isset($po->language[1]) && $po->language[1]->locale == 'ru')
                            {{ $po->language[1]->name }}
                        @endif
                    </td>
                    <td>
                        @if(isset($po->language[2]) && $po->language[2]->locale == 'uz')
                            {{ $po->language[2]->name }}
                        @endif
                    </td>
                    <td class="text-right">
                        <div class="d-flex" style="float: right;">
                            <a href="javascript:void(0);" class="text-primary mr-5 js_edit_btn"
                               data-one_overview_url="{{ route('product_overview.one', $po->id) }}"
                               data-update_url="{{ route('product_overview.update', $po->id) }}" title="Edit">
                                <i class="fas fa-pen mr-50"></i>
                            </a>
                            <a class="text-danger js_delete_btn" href="javascript:void(0);" data-toggle="modal"
                               data-target="#deleteModal" data-name="
                                @if(isset($po->language[0]) && $po->language[0]->locale == 'en')
                                    {{ $po->language[0]->name }}
                                @endif
                               "
                               data-url="{{ route('product_overview.destroy', $po->id) }}" title="Delete">
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


<div class="modal fade text-left" id="add_edit_overview_modal" tabindex="-1" role="dialog" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="add_edit_modal_label">{{ __('Qo\'shish') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST" class="js_add_edit_overview_form">
                @csrf
                <input type="hidden" name="product_id" value="{{ $id }}">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="name_en">Nomi En</label>
                            <input type="text" name="name_en" class="form-control js_name_en" id="name_en" required/>
                            <div class="invalid-feedback">{{ "The name en field is required." }}</div>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="name_ru">Nomi Ru</label>
                            <input type="text" name="name_ru" class="form-control js_name_ru" id="name_ru" required/>
                            <div class="invalid-feedback">{{ "The name ru field is required." }}</div>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="name_uz">Nomi Uz</label>
                            <input type="text" name="name_uz" class="form-control js_name_uz" id="name_uz" required/>
                            <div class="invalid-feedback">{{ "The name uz field is required." }}</div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Saqlash</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" style="margin-top: 4px;">Bekor qilish</button>
                </div>
            </form>
        </div>
    </div>
</div>
