<div class="modal fade text-left" id="add_file_modal" tabindex="-1" role="dialog" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="add_file_modal_label">{{ __('File yuklash') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('carousel.store') }}" method="POST" class="js_add_file_form" enctype="multipart/form-data">
                @csrf

                <div class="modal-body">
                    <div class="row">

                        <div class="col-md-3 form-group">
                            <label for="number">Tartib Raqami</label>
                            <input type="number" name="number" class="form-control js_number" id="number"/>
                            <div class="invalid-feedback">{{ "The number field is required." }}</div>
                        </div>

                        <div class="col-md-9 form-group">
                            <label for="file">Fayl</label>
                            <input type="file" name="file" class="form-control js_file" id="file" multiple/>
                            <div class="invalid-feedback">{{ "The file field is required." }}</div>
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
