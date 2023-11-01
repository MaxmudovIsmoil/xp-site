$('.js_text_editer').jqte();

function save_done(data) {
    $('.js_description_en_html').html(data.description_en);
    $('.js_description_ru_html').html(data.description_ru);
    $('.js_description_uz_html').html(data.description_uz);

    $('.js_edit_btn').removeClass('d-none')
    $('.js_div_form').addClass('d-none');
    $('.js_html').removeClass('d-none');
    $('.card-body').removeClass('pt-4');
}

$(document).on('click', '.js_edit_btn', function() {
    $(this).addClass('d-none')
    $('.cancel_save_btn').removeClass('d-none')

    $('.js_div_form').removeClass('d-none');
    $('.js_html').addClass('d-none');
    $('.card-body').addClass('pt-4');
});

$(document).on('click', '.js_cancel_btn', function() {
    $(this).closest('.cancel_save_btn').addClass('d-none');
    $('.js_edit_btn').removeClass('d-none')

    $('.js_div_form').addClass('d-none');
    $('.js_html').removeClass('d-none');
    $('.card-body').removeClass('pt-4');
});


$(document).on('click', '.js_save_btn', function() {

    let url = $(this).data('url')
    let token = $('meta[name="csrf-token"]').attr('content');
    let description_en = $('.js_description_en').val();
    let description_ru = $('.js_description_ru').val();
    let description_uz = $('.js_description_uz').val();

    let data = {
        '_token' : token,
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



/** file upload **/
$('.js_add_file_form').on('submit', function(e) {
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
            console.log(response)
            if(!response.status) {
                if(response.error === "file required")
                    $('.js_file').addClass('is-invalid');
            }

            if (response.status)
                location.reload()
        },
        error: (response) => {
            console.log('errors: ', response);
        }
    });
});


/** file delete **/
$(document).on('click', '.js_delete_file_btn', function() {

    $(this).siblings('.div-btns').removeClass('d-none');
    $(this).addClass('d-none');
});


$(document).on('click', '.js_delete_file_no_btn', function() {

    let div_btns = $(this).closest('.div-btns');
    div_btns.addClass('d-none');
    div_btns.siblings('.js_delete_file_btn').removeClass('d-none');
});


$(document).on('click', '.js_delete_file_yes_btn', function() {
    let url = $(this).data('url');
    let token = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: url,
        type: "DELETE",
        dataType: "JSON",
        data: { '_token': token },
        success: (response) => {
            // console.log('response: ', response);

            if(response.status)
                $(this).closest('.js_this_image_div').remove();

        },
        error: (response) => {
            console.log('error: ', response);
        }
    });

});



/** About banner image upload **/
$(document).on('submit', '.js_image_form', function(e) {
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

            if(!response.status) {
                if(response.error === "required")
                    $('.js_image').addClass('is-invalid');
            }

            if (response.status)
                window.location.reload()
        },
        error: (response) => {
            console.log('errors: ', response);
        }
    });
});


