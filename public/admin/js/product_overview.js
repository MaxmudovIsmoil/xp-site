$(document).ready(function() {
    var modal = $('#add_edit_overview_modal')
    $(document).on('click', '.js_add_overview_btn', function (e) {
        e.preventDefault();
        let url = $(this).data('url');
        $('.js_add_edit_overview_form').attr('action', url);
        modal.find('#add_edit_modal_label').html("Qo'shish")
        modal.modal('show')
    });

    // edit
    $(document).on('click', '.js_edit_btn', function (e) {
        e.preventDefault();
        let token = $('meta[name="csrf-token"]').attr('content');
        let url = $(this).data('one_overview_url');
        let update_url = $(this).data('update_url');
        modal.find('.js_add_edit_overview_form').attr('action', update_url);
        modal.find('#add_edit_modal_label').html("Tahrirlash");

        $.ajax({
            url: url,
            type: "POST",
            dataType: "JSON",
            data: { '_token': token },
            success: (response) => {
                // console.log('res:', response);
                if (response.status) {
                    if (response.data.language[0].locale === 'en')
                        modal.find('.js_name_en').val(response.data.language[0].name)

                    if (response.data.language[1].locale === 'ru')
                        modal.find('.js_name_ru').val(response.data.language[1].name)

                    if (response.data.language[2].locale === 'uz')
                        modal.find('.js_name_uz').val(response.data.language[2].name)

                    modal.modal('show')
                }
            },
            error: (response) => {
                console.log('error: ', response);
            }
        });

    });

    $(document).on('submit', '.js_add_edit_overview_form', function (e) {
        e.preventDefault();

        $.ajax({
            url: $(this).attr('action'),
            type: "POST",
            dataType: "JSON",
            data: $(this).serialize(),
            success: (response) => {
                console.log('res:', response);
                if (response.status) {
                    window.location.reload()
                }
            },
            error: (response) => {
                console.log('error: ', response);
            }
        });

    });



});
