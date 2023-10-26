<div class="modal fade text-left" id="add_edit_modal" tabindex="-1" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="add_edit_modal_label">Yangilik Qo\'shish</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST" class="js_add_edit_form" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="old_file" class="js_old_file" value="" />
                <div class="modal-body">
                    <div class="row">

                        <div class="col-md-8 form-group">
                            <label class="mb-0" for="file">Fayl</label>
                            <input type="file" name="file" class="form-control js_file" id="file" value="2023-01-18_09-23-59_5.jpg">
                            <div class="invalid-feedback">{{ "The file field is required." }}</div>
                        </div>

                        <div class="col-md-4 form-group">
                            <label class="mb-0" for="date">Vaqt</label>
                            <input type="date" name="date" class="form-control js_date" id="date" />
                            <div class="invalid-feedback">{{ "The date field is required." }}</div>
                        </div>

                        <div class="col-md-12 form-group">
                            <label class="mb-0" for="name_en">Nomi En</label>
                            <input type="text" name="name_en" class="form-control js_name_en" id="name_en" />
                            <div class="invalid-feedback">{{ "The name en field is required." }}</div>
                        </div>
                        <div class="col-md-12 form-group">
                            <label class="mb-0" for="description_en">Text En</label>
                            <textarea name="description_en" class="form-control js_description_en" rows="5"></textarea>
                            <div class="invalid-feedback">{{ "The description en field is required." }}</div>
                        </div>

                        <div class="col-md-12 form-group">
                            <label class="mb-0" for="name_ru">Nomi Ru</label>
                            <input type="text" name="name_ru" class="form-control js_name_ru" id="name_ru" />
                            <div class="invalid-feedback">{{ "The name ru field is required." }}</div>
                        </div>
                        <div class="col-md-12 form-group">
                            <label class="mb-0" for="description_ru">Text Ru</label>
                            <textarea name="description_ru" class="form-control js_description_ru" rows="5"></textarea>
                            <div class="invalid-feedback">{{ "The description ru field is required." }}</div>
                        </div>

                        <div class="col-md-12 form-group">
                            <label class="mb-0" for="name_uz">Nomi Uz</label>
                            <input type="text" name="name_uz" class="form-control js_name_uz" id="name_uz" />
                            <div class="invalid-feedback">{{ "The name uz field is required." }}</div>
                        </div>
                        <div class="col-md-12 form-group">
                            <label class="mb-0" for="description_uz">Text Uz</label>
                            <textarea name="description_uz" class="form-control js_description_uz" rows="5"></textarea>
                            <div class="invalid-feedback">{{ "The description uz field is required." }}</div>
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
