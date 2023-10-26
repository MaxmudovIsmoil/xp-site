<div class="modal fade text-left" id="image_modal" tabindex="-1" role="dialog" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="add_file_modal_label">{{ __('File yuklash') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('contact.file_upload', [$contact->id]) }}" method="POST" class="js_image_form" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ $contact->id }}" />
                <input type="hidden" name="old_image" value="{{ $contact->image }}" />
                <div class="modal-body">

                    <div class="form-group">
                        <label for="image">Rasm yuklang</label>
                        <input type="file" name="image" class="form-control js_image" id="image"/>
                        <div class="invalid-feedback">{{ "The image field is required." }}</div>
                    </div>

                </div>
                <div class="modal-footer">

                    <p class="text-danger mr-5 pr-3">Eski rasm o'chib ketadi.</p>

                    <button type="submit" class="btn btn-primary" name="saveBtn">Saqlash</button>

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Bekor qilish</button>
                </div>
            </form>
        </div>
    </div>
</div>
