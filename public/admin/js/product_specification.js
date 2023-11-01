function create_tr() {
    let table = $('.jd_specification_table tbody')
    let tr = '<tr class="jd_one_tr">\n' +
        '                <td class="d-flex">\n' +
        '                    <span class="d-none">Model</span>\n' +
        '                    <input type="text" class="form-control" name="model" value="Model"/>\n' +
        '                    <div class="mt-1 ml-1"><i class="fas fa-bold"></i></div>\n' +
        '                </td>\n' +
        '                <td>\n' +
        '                    <span class="d-none">Text</span>\n' +
        '                    <input type="text" class="form-control" value="Text">\n' +
        '                </td>\n' +
        '                <td width="30">\n' +
        '                    <div class="d-flex justify-content-end">\n' +
        '                        <button class="btn btn-sm btn-outline-success js_add_this_td_btn mr-2"><i class="fas fa-plus"></i></button>\n' +
        '                        <button class="btn btn-sm btn-outline-danger js_remove_this_td_btn"><i class="fas fa-minus"></i></button>\n' +
        '                    </div>\n' +
        '                </td>\n' +
        '            </tr>'

    table.append(tr)
}

$(document).ready(function() {


    $('.js_add_tr_btn').on('click', function() {
        create_tr();
    });

    $('.js_remove_tr_btn').on('click', function() {
        $('.jd_specification_table tbody tr').last().remove()
    });


    function create_td(this_td) {
        let td = '<td>\n' +
                        '    <span class="d-none">Text</span>\n' +
                        '    <input type="text" class="form-control" value="Text">\n' +
                        '</td>';

        this_td.after(td);
    }

    $('.js_add_this_td_btn').on('click', function() {
        let this_td = $(this).closest('td').prev();
        let length = $(this).closest('.jd_one_tr').find('td').length

        if (length <= 3) {
            create_td(this_td);
        }
    });

    $('.js_remove_this_td_btn').on('click', function() {
        let length = $(this).closest('.jd_one_tr').find('td').length
        if (length > 2) {
            $(this).closest('td').prev().remove();
        }
    });

});
