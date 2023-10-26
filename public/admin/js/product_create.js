function add_product_detail_div() {

    let div = '<div class="col-md-6 js_product_detail_one"><div class="row product-detail-div-one">\n' +
              '    <div class="col-md-6 mb-2">\n' +
              '        <label class="mb-0" for="key">Key En</label>\n' +
              '        <input type="text" class="form-control" name="key_en[]" required/>\n' +
              '    </div>\n' +
              '    <div class="col-md-6 mb-2">\n' +
              '        <label class="mb-0" for="value">Value En</label>\n' +
              '        <input type="text" class="form-control" name="value_en[]" required/>\n' +
              '    </div>\n' +
              '    <div class="col-md-6 mb-2">\n' +
              '        <label class="mb-0" for="key">Key Ru</label>\n' +
              '        <input type="text" class="form-control" name="key_ru[]" required/>\n' +
              '    </div>\n' +
              '    <div class="col-md-6 mb-2">\n' +
              '        <label class="mb-0" for="value">Value Ru</label>\n' +
              '        <input type="text" class="form-control" name="value_ru[]" required/>\n' +
              '    </div>\n' +
              '    <div class="col-md-6 mb-2">\n' +
              '        <label class="mb-0" for="key">Key Uz</label>\n' +
              '        <input type="text" class="form-control" name="key_uz[]" required/>\n' +
              '    </div>\n' +
              '    <div class="col-md-6 mb-2">\n' +
              '        <label class="mb-0" for="value">Value Uz</label>\n' +
              '        <input type="text" class="form-control" name="value_uz[]" required/>\n' +
              '    </div>\n' +
              '</div></div>';

    let product_detail_div = $('.js_product_detail_div');

    product_detail_div.append(div);
}



$(document).on('click', '.js_add_product_detail_btn', function(e) {
    e.preventDefault();

    add_product_detail_div()
});


$(document).on('click', '.js_remove_product_detail_btn', function(e) {
    e.preventDefault();

    let product_detail_div = $('.js_product_detail_div');
    let length = product_detail_div.children('.js_product_detail_one').length;

    if (length > 1)
        product_detail_div.children('.js_product_detail_one').last().remove();

});

/** Product overview **/

$(document).on('click', '.js_add_product_overview_btn', function(e) {
    e.preventDefault();

    let div = '<div class="row js_product_overview_one">\n' +
        '    <div class="form-group col-md-4 pr-1">\n' +
        '        <label for="p-o-name-en">Name En</label>\n' +
        '        <input type="text" class="form-control" id="p-o-name-en" name="name_en[]">\n' +
        '    </div>\n' +
        '    <div class="form-group col-md-4 pr-1">\n' +
        '        <label for="p-o-name_ru">Name Ru</label>\n' +
        '        <input type="text" class="form-control" id="p-o-name-ru" name="name_ru[]">\n' +
        '    </div>\n' +
        '    <div class="form-group col-md-4">\n' +
        '        <label for="p-o-name-uz">Name Uz</label>\n' +
        '        <input type="text" class="form-control" id="p-o-name-uz" name="name_uz[]" >\n' +
        '    </div>\n' +
        '</div>';

    let product_overview_div = $('.js_product_overview_div');

    product_overview_div.append(div);
});


$(document).on('click', '.js_remove_product_overview_btn', function(e) {
    e.preventDefault();

    let product_overview_div = $('.js_product_overview_div');
    let length = product_overview_div.children('.js_product_overview_one').length;

    if (length > 1)
        product_overview_div.children('.js_product_overview_one').last().remove();

});



$(document).on('click', '.js_save_btn', function() {

    let url = $(this).data('url')
    let token = $('meta[name="csrf-token"]').attr('content');
    let name_en = $('.js_name_en').val();
    let name_ru = $('.js_name_ru').val();
    let name_uz = $('.js_name_uz').val();
    let description_en = $('.js_description_en').val();
    let description_ru = $('.js_description_ru').val();
    let description_uz = $('.js_description_uz').val();

    let data = {
        '_token' : token,
        'name_en' : name_en,
        'name_ru' : name_ru,
        'name_uz' : name_uz,
        'description_en' : description_en,
        'description_ru' : description_ru,
        'description_uz' : description_uz,
        '_method' : 'PUT'
    };

    $.ajax({
        url: url,
        type: "POST",
        dataType: "JSON",
        data: data,
        success: (response) => {
            console.log('res', response);

            if(response.status) {
                save_done(data);
                $(this).closest('.cancel_save_btn').addClass('d-none');
            }
        },
        error: (response) => {

            console.log('errors: ', response);
            if (typeof response.responseJSON.errors !== 'undefined') {
                if (response.responseJSON.errors.name_en)
                    $('.js_name_en').addClass('is-invalid')

                if (response.responseJSON.errors.name_ru)
                    $('.js_name_ru').addClass('is-invalid')

                if (response.responseJSON.errors.name_uz)
                    $('.js_name_uz').addClass('is-invalid')

                if (response.responseJSON.errors.description_en)
                    $('.js_description_en').addClass('is-invalid')

                if (response.responseJSON.errors.description_ru)
                    $('.js_description_ru').addClass('is-invalid')

                if (response.responseJSON.errors.description_uz)
                    $('.js_description_uz').addClass('is-invalid')
            }

        }
    });
});




/** file delete **/
$(document).on('click', '.js_delete_file_btn', function() {

    $(this).siblings('.div-btns').removeClass('d-none');
    $(this).addClass('d-none');
});












