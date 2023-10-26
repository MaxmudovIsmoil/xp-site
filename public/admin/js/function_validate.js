$(document).ready(function() {

    /** btn user and task modal close inputs in clear **/
    $('#add_edit_modal button[data-dismiss="modal"]').click(function () {

        let form = $('.js_add_edit_form')

        let name = form.find('.js_name')
        name.val('')
        name.removeClass('is-invalid')

        let full_name = form.find('.js_full_name')
        full_name.val('')
        full_name.removeClass('is-invalid')

        let job_title = form.find('.js_job_title')
        job_title.val('')
        job_title.removeClass('is-invalid')

        let phone = form.find('.js_phone')
        phone.val('')
        phone.removeClass('is-invalid')

        let name_en = form.find('.js_name_en')
        name_en.val('')
        name_en.removeClass('is-invalid')

        let name_ru = form.find('.js_name_ru')
        name_ru.val('')
        name_ru.removeClass('is-invalid')

        let name_uz = form.find('.js_name_uz')
        name_uz.val('')
        name_uz.removeClass('is-invalid')


        let description_en = form.find('.js_description_en')
        description_en.val('')
        description_en.removeClass('is-invalid')

        let description_ru = form.find('.js_description_ru')
        description_ru.val('')
        description_ru.removeClass('is-invalid')

        let description_uz = form.find('.js_description_uz')
        description_uz.val('')
        description_uz.removeClass('is-invalid')

        let date = form.find('.js_date')
        date.val('')
        date.removeClass('is-invalid')

        let file = form.find('.js_file')
        file.val('')
        file.removeClass('is-invalid')

        let number = form.find('.js_number')
        number.val('')
        number.removeClass('is-invalid')
    })

    $('#add_file_modal button[data-dismiss="modal"]').click(function () {

        let file = $('.js_file');
        file.val('');
        file.removeClass('is-invalid');

    });


    $('.js_user_id').on('input', function () {
        $(this).removeClass('is-invalid')
        $(this).siblings('.invalid-feedback').addClass('valid-feedback')
    })

    $('.js_name').on('input', function () {
        $(this).removeClass('is-invalid')
        $(this).siblings('.invalid-feedback').addClass('valid-feedback')
    })

    $('.js_full_name').on('input', function () {
        $(this).removeClass('is-invalid')
        $(this).siblings('.invalid-feedback').addClass('valid-feedback')
    })

    $('.js_name_en').on('input', function () {
        $(this).removeClass('is-invalid')
        $(this).siblings('.invalid-feedback').addClass('valid-feedback')
    })

    $('.js_name_ru').on('input', function () {
        $(this).removeClass('is-invalid')
        $(this).siblings('.invalid-feedback').addClass('valid-feedback')
    })

    $('.js_name_uz').on('input', function () {
        $(this).removeClass('is-invalid')
        $(this).siblings('.invalid-feedback').addClass('valid-feedback')
    })

    $('.js_description_en').on('input', function () {
        $(this).removeClass('is-invalid')
        $(this).siblings('.invalid-feedback').addClass('valid-feedback')
    })

    $('.js_description_ru').on('input', function () {
        $(this).removeClass('is-invalid')
        $(this).siblings('.invalid-feedback').addClass('valid-feedback')
    })

    $('.js_description_uz').on('input', function () {
        $(this).removeClass('is-invalid')
        $(this).siblings('.invalid-feedback').addClass('valid-feedback')
    })

    $('.js_username').on('input', function () {
        $(this).removeClass('is-invalid')
        $(this).siblings('.invalid-feedback').addClass('valid-feedback')
    })

    $('.js_password').on('input', function () {
        $(this).removeClass('is-invalid')
        $(this).siblings('.invalid-feedback').addClass('valid-feedback')
    })


    $('.js_file').on('change', function () {
        $(this).removeClass('is-invalid')
        $(this).siblings('.invalid-feedback').addClass('valid-feedback')
    })

    $('.js_date').on('input', function () {
        $(this).removeClass('is-invalid')
        $(this).siblings('.invalid-feedback').addClass('valid-feedback')
    })

    $('.js_number').on('input', function () {
        $(this).removeClass('is-invalid')
        $(this).siblings('.invalid-feedback').addClass('valid-feedback')
    })

    $('.js_image').on('change', function () {
        $(this).removeClass('is-invalid')
        $(this).siblings('.invalid-feedback').addClass('valid-feedback')
    })
});
