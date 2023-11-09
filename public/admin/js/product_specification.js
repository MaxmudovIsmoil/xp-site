function create_tr() {
    let table = $('.js_specification_table tbody')
    let tr ='<tr class="js_one_tr" data-td="3">\n' +
        '                <td colspan="2">\n' +
        '                    <div class="d-flex">\n' +
        '                        <input type="text" class="form-control" name="model" value="Model"/>\n' +
        '                        <div class="mt-1 ml-1"><button class="btn btn-sm btn-outline-dark js_remove_this_td_btn"><i class="fas fa-bold"></i></button></div>\n' +
        '                    </div>\n' +
        '                </td>\n' +
        '                <td>\n' +
        '                    <div class="d-flex">\n' +
        '                        <input type="text" class="form-control" value="Text">\n' +
        '                        <button class="btn btn-sm btn-outline-danger mr-2 js_remove_this_td_btn"><i class="fas fa-minus"></i></button>\n' +
        '                    </div>\n' +
        '                </td>\n' +
        '                <td width="30">\n' +
        '                    <div class="d-flex">\n' +
        '                        <button class="btn btn-sm btn-outline-success mr-2 js_add_this_td_btn "><i class="fas fa-plus"></i></button>\n' +
        '                        <button class="btn btn-danger js_remove_tr_btn"><i class="fas fa-minus"></i></button>\n' +
        '                    </div>\n' +
        '                </td>\n' +
        '            </tr>'

    table.append(tr)
}

$(document).ready(function() {


    $('.js_add_tr_btn').on('click', function() {
        create_tr();
    });

    // $('.js_remove_tr_btn').on('click', function() {
    //     $(this).parents('tr').remove()
    // });


    function create_td(this_td) {
        let td = ' <td>\n' +
            '                    <div class="d-flex">\n' +
            '                        <input type="text" class="form-control" value="Text">\n' +
            '                        <button class="btn btn-sm btn-outline-danger mr-2 js_remove_this_td_btn"><i class="fas fa-minus"></i></button>\n' +
            '                    </div>\n' +
            '                </td>';

        this_td.after(td);
    }

    // $('.js_add_this_td_btn').on('click', function() {
    //     let this_td = $(this).closest('td').prev();
    //     let length = $(this).closest('.js_one_tr').find('td').length
    //
    //     if (length <= 3) {
    //         create_td(this_td);
    //     }
    // });

    // $('.js_remove_this_td_btn').on('click', function() {
    //     let length = $(this).closest('.js_one_tr').find('td').length
    //     if (length > 2) {
    //         $(this).closest('td').prev().remove();
    //     }
    // });
    const bodyHtml = $('body');
    bodyHtml.delegate('.js_remove_tr_btn', 'click', function (){
        $(this).parents('tr').remove();
    });

    bodyHtml.delegate('.js_remove_this_td_btn', 'click', function (){
        let thisTd= $(this);
        let thisTr = thisTd.parents('tr');
        let thisColSpanCount = (thisTr.attr('data-td'))*1;
        console.log(thisColSpanCount)
        if (thisColSpanCount >=2) {
            thisTr.attr('data-td', (thisColSpanCount-1));
            thisTr.first('td').attr('colspan',(5-thisColSpanCount) )
            $(this).closest('td').remove();
        }
    });
    bodyHtml.delegate('.js_add_this_td_btn', 'click', function (){
        let thisTd = $(this).parents('td').prev();
        let length = $(this).closest('.js_one_tr').find('td').length
        let thisColSpanTr = ($(this).parents('tr').data('td'))*1;
        if (length <= 3) {
            $(this).parents('tr').attr('data-td',thisColSpanTr+1);
            $(this).parents('tr').first('td').attr('colspan',(thisColSpanTr-1) )
            create_td(thisTd);
        }
    });
});
