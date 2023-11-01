
<div class="card">
    <div class="card-header">
        <button data-url="{{ route('product_service_support.store') }}"
                class="btn btn-primary btn-sm js_add_service_support_btn" >
            <i class="fas fa-plus"></i> &nbsp; Qo'shish
        </button>
    </div>
    <div class="card-body p-0">
        <table class="table table-sm table-border table-striped table-hover">
            <thead>
                <tr>
                    <th class="text-center" width="3%">№</th>
                    <th>Nomi En, Text En</th>
                    <th>Nomi Ru, Text Ru</th>
                    <th>Nomi Uz, Text Uz</th>
                    <th class="text-right">Harakat</th>
                </tr>
            </thead>
            <tbody>

            @foreach ($product_service_supports as $pss)
                <tr class="js_this_tr" data-id="{{ $pss->id }}">
                    <td class="text-center">{{ 1 + $loop->index }}</td>
                    <td>
                        @if(isset($pss->language[0]) && $pss->language[0]->locale == 'en')
                            <p class="mb-0" style="font-weight: bold">{{ $pss->language[0]->name }}</p>
                            {{ $pss->language[0]->description }}
                        @endif
                    </td>
                    <td>
                        @if(isset($pss->language[1]) && $pss->language[1]->locale == 'ru')
                            <p class="mb-0" style="font-weight: bold">{{ $pss->language[1]->name }}</p>
                            {{ $pss->language[1]->description }}
                        @endif
                    </td>
                    <td>
                        @if(isset($pss->language[2]) && $pss->language[2]->locale == 'uz')
                            <p class="mb-0" style="font-weight: bold">{{ $pss->language[2]->name }}</p>
                            {{ $pss->language[2]->description }}
                        @endif
                    </td>
                    <td class="text-right">
                        <div class="d-flex" style="float: right;">
                            <a href="javascript:void(0);" class="text-primary mr-4 js_edit_service_support_btn"
                               data-one_service_support_url="{{ route('product_service_support.one', $pss->id) }}"
                               data-update_url="{{ route('product_service_support.update', $pss->id) }}" title="Edit">
                                <i class="fas fa-pen "></i>
                            </a>
                            <a class="text-danger js_delete_btn" href="javascript:void(0);" data-toggle="modal"
                               data-target="#deleteModal" data-name="
                                @if(isset($pss->language[0]) && $pss->language[0]->locale == 'en')
                                    {{ $pss->language[0]->name }}
                                @endif
                               "
                               data-url="{{ route('product_service_support.destroy', $pss->id) }}" title="Delete">
                                <i class="far fa-trash-alt "></i>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
</div>


<div class="modal fade text-left" id="add_edit_service_support_modal" tabindex="-1" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="add_edit_modal_label">{{ __("Qo'shish") }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST" class="js_add_edit_service_support_form">
                @csrf
                <input type="hidden" name="product_id" value="{{ $id }}">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="name_en" class="mb-0">Nomi En</label>
                            <input type="text" name="name_en" class="form-control js_name_en" id="name_en" required/>
                            <div class="invalid-feedback">{{ "The name en field is required." }}</div>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="description_en" class="mb-0">Text En</label>
                            <textarea class="form-control js_description_en" id="description_en" name="description_en" rows="3" required></textarea>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="name_ru" class="mb-0">Nomi Ru</label>
                            <input type="text" name="name_ru" class="form-control js_name_ru" id="name_ru" required/>
                            <div class="invalid-feedback">{{ "The name ru field is required." }}</div>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="description_ru" class="mb-0">Text Ru</label>
                            <textarea class="form-control js_description_ru" id="description_ru" name="description_ru" rows="3" required></textarea>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="name_uz" class="mb-0">Nomi Uz</label>
                            <input type="text" name="name_uz" class="form-control js_name_uz" id="name_uz" required/>
                            <div class="invalid-feedback">{{ "The name uz field is required." }}</div>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="description_uz" class="mb-0">Text Uz</label>
                            <textarea class="form-control js_description_uz" id="description_uz" name="description_uz" rows="3" required></textarea>
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
