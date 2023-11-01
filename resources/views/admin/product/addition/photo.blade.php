<div class="images-div">
    @foreach($product_photos as $pf)
        <div class="js_this_image_div product_photo-one-div">
            <a data-fancybox="gallery" href="{{ asset('/file_uploaded/product/'. $pf->photo) }}">
                <img src="{{ asset('/file_uploaded/product/'. $pf->photo) }}" class="file-image"
                     alt="Image"/>
            </a>

            <div class="d-none div-btns">
                <button data-url="{{ route('product_photo.destroy', $pf->id) }}" data-photo="{{$pf->photo}}" class="js_delete_file_yes_btn btn btn-sm btn-danger">xa</button>
                <button class="js_delete_file_no_btn btn btn-sm btn-secondary">yo'q</button>
            </div>
            <button class="js_delete_file_btn btn btn-block btn-sm btn-outline-danger"><i
                    class="far fa-trash-alt"></i></button>
        </div>
    @endforeach

    <button class="btn btn-outline-primary js_photo_add_btn @if($product_photos->count() >= 6) d-none @endif" data-toggle="modal" data-target="#product_photo_modal">
        <i class="fa-solid fa-plus"></i>
    </button>
</div>
<span class="font-sm">Max: 6</span>



<div class="modal fade text-left" id="product_photo_modal" tabindex="-1" role="dialog" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="add_file_modal_label">{{ __('Maxsulot uchun rasm yuklash') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('product_photo.upload', $id) }}" method="POST" class="js_product_photo_form" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="photo">Rasm</label>
                        <input type="file" name="photo" class="form-control js_photo" id="photo"/>
                        <div class="invalid-feedback">{{ "The photo field is required." }}</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="saveBtn">Saqlash</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" style="margin-top: 4px;">Bekor qilish</button>
                </div>
            </form>
        </div>
    </div>
</div>

