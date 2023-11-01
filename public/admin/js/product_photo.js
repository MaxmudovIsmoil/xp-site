/** photo upload **/
$('.js_product_photo_form').on('submit', function (e) {
    e.preventDefault()
    let form = $(this)
    let action = form.attr('action')

    $.ajax({
        url: action,
        type: "POST",
        data: new FormData(this),
        dataType: "JSON",
        contentType: false,
        processData: false,
        success: (response) => {
            // console.log(response)
            if (!response.status) {
                if (response.error === "photo field")
                    $('.js_photo').addClass('is-invalid');
            }

            if (response.status)
                location.reload()
        },
        error: (response) => {
            console.log('errors: ', response);
            if (typeof response.responseJSON.errors !== 'undefined') {
                if (response.responseJSON.errors.photo)
                    form.find('.js_file').addClass('is-invalid')
            }
        }
    });
});


/** file delete **/
$(document).on('click', '.js_delete_file_btn', function () {

    $(this).siblings('.div-btns').removeClass('d-none');
    $(this).addClass('d-none');
});


$(document).on('click', '.js_delete_file_no_btn', function () {

    let div_btns = $(this).closest('.div-btns');
    div_btns.addClass('d-none');
    div_btns.siblings('.js_delete_file_btn').removeClass('d-none');
});


$(document).on('click', '.js_delete_file_yes_btn', function () {
    let url = $(this).data('url');
    let token = $('meta[name="csrf-token"]').attr('content');
    let photo = $(this).data('photo');
    let add_btn = $('.js_photo_add_btn');
    $.ajax({
        url: url,
        type: "DELETE",
        dataType: "JSON",
        data: {'_token': token, 'photo': photo},
        success: (response) => {
            // console.log('res:', response);
            if (response.status) {
                $(this).closest('.js_this_image_div').remove();
                if(add_btn.hasClass('d-none')) {
                    add_btn.removeClass('d-none')
                }
            }
        },
        error: (response) => {
            console.log('error: ', response);
        }
    });

});
