

/** file upload **/
$('.js_image_form').on('submit', function(e) {
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
            if(response.status === false) {
                if(response.error === "required") {
                    $('.js_image').addClass('is-invalid');
                    $('.js_image').siblings('.invalid-feedback').addClass('is-invalid');
                }
            }

            if (response.status)
                location.reload()
        },
        error: (response) => {
            console.log('errors: ', response);
        }
    });
});


