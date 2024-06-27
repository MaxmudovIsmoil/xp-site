<div class="modal fade text-left" id="edit_modal" tabindex="-1" role="dialog" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <h4 class="modal-title" id="add_edit_modal_label">{{ __('Edit Contact') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="@isset($contact->id){{ route('contact.update', [$contact->id]) }}@endisset" method="POST" class="js_edit_form" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" class="form-control js_phone" id="phone"/>
                                <div class="invalid-feedback">{{ "The phone field is required." }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control js_email" id="email"/>
                                <div class="invalid-feedback">{{ "The email field is required." }}</div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="address_en">Address En</label>
                                <input type="text" name="address_en" class="form-control js_address_en" id="address_en"/>
                                <div class="invalid-feedback">{{ "The address en field is required." }}</div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="address_ru">Address Ru</label>
                                <input type="text" name="address_ru" class="form-control js_address_ru" id="address_ru"/>
                                <div class="invalid-feedback">{{ "The address en field is required." }}</div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="address_uz">Address Uz</label>
                                <input type="text" name="address_uz" class="form-control js_address_uz" id="address_uz"/>
                                <div class="invalid-feedback">{{ "The address en field is required." }}</div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="saveBtn">Saqlash</button>

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Bekor qilish</button>
                </div>
            </form>
        </div>
    </div>
</div>
