function save_done(data) {

  $('.js_name_en_html').html(data.name_en);
  $('.js_name_ru_html').html(data.name_ru);
  $('.js_name_uz_html').html(data.name_uz);
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
              if(response.error == "file required")
                  $('.js_file').addClass('is-invalid');

              if(response.error == "name required")
                  $('.js_name').addClass('is-invalid');
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

          if(response.status) {
              $(this).closest('.js_this_image_div').remove();
          }
      },
      error: (response) => {
          console.log('error: ', response);
      }
  });

});



// certificate name icon pen
$(document).on('click', '.js_edit_icon', function() {
    let input = $(this).siblings('input');
    let p = $(this).siblings('p');
    let save_icon = $(this).siblings('.js_save_icon');
    let cancel_icon = $(this).siblings('.js_cancel_icon');
    let file_name_div = $(this).closest('.file-name')


    file_name_div.css({'margin-top': '7px', 'margin-bottom': '7px'});
    input.attr('type', 'text');
    p.addClass('d-none');
    save_icon.removeClass('d-none');
    cancel_icon.removeClass('d-none');
    $(this).addClass('d-none');

});


// icon cancel
$(document).on('click', '.js_cancel_icon', function() {
    let input = $(this).siblings('input');
    let p = $(this).siblings('p');
    let save_icon = $(this).siblings('.js_save_icon');
    let edit_icon = $(this).siblings('.js_edit_icon');

    let file_name_div = $(this).closest('.file-name')
    file_name_div.css({'margin-top': '10px', 'margin-bottom': '10px'});

    input.attr('type', 'hidden');
    p.removeClass('d-none');
    save_icon.addClass('d-none');
    edit_icon.removeClass('d-none');
    $(this).addClass('d-none');

});


// icon save
$(document).on('click', '.js_save_icon', function() {
    let input = $(this).siblings('input');
    let p = $(this).siblings('p');
    let save_icon = $(this);
    let cancel_icon = $(this).siblings('.js_cancel_icon');
    let edit_icon = $(this).siblings('.js_edit_icon');

    let file_name_div = $(this).closest('.file-name')
    file_name_div.css({'margin-top': '10px', 'margin-bottom': '10px'});

    let url = $(this).data('url');
    let token = $('meta[name="csrf-token"]').attr('content');

    console.log('url: ', url);
    $.ajax({
        url: url,
        type: "POST",
        dataType: "JSON",
        data: { '_token': token, 'name': input.val(), '_method': "PUT" },
        success: (response) => {
            // console.log('res', response);

            if(response.status) {
                input.attr('type', 'hidden');
                p.html(input.val());
                p.removeClass('d-none');

                cancel_icon.addClass('d-none');
                save_icon.addClass('d-none');
                edit_icon.removeClass('d-none');
            }
        },
        error: (response) => {
            console.log('error: ', response);
        }
    });



});







