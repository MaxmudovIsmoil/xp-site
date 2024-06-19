function create_tr(row) {
    let table = $('.js_specification_table tbody')
    let tr ='<tr class="js_one_tr" data-row="'+ row +'">\n' +
        '                <td colspan="3" class="first-td">\n' +
        '                    <div class="d-flex">\n' +
        '                        <div class="w-100">\n' +
        '                            <input type="hidden" class="form-control" name="ProductST['+ row +'][order]" value="'+ row +'" />\n' +
        '                            <input type="text" class="form-control" name="ProductST['+ row +'][en][key]" placeholder="Model en" />\n' +
        '                            <input type="text" class="form-control my-1" name="ProductST['+ row +'][ru][key]" placeholder="Model ru"/>\n' +
        '                            <input type="text" class="form-control" name="ProductST['+ row +'][uz][key]" placeholder="Model uz"/>\n' +
        '                        </div>\n' +
        '                        <span class="btn btn-sm btn-outline-dark ml-1 js_bold_this_td_btn"><i class="fas fa-bold"></i></span>\n' +
        '                    </div>\n' +
        '                </td>\n' +
        '                <td>\n' +
        '                    <div class="d-flex">\n' +
        '                        <div class="w-100">\n' +
        '                            <input type="text" class="form-control" name="ProductST['+ row +'][en][value1]" placeholder="Text en">\n' +
        '                            <input type="text" class="form-control my-1" name="ProductST['+ row +'][ru][value1]" placeholder="Text ru">\n' +
        '                            <input type="text" class="form-control" name="ProductST['+ row +'][uz][value1]" placeholder="Text uz">\n' +
        '                        </div>\n' +
        '                        <span class="btn btn-sm btn-outline-danger mx-1 js_remove_this_td_btn"><i class="fas fa-minus"></i></span>\n' +
        '                    </div>\n' +
        '                </td>\n' +
        '                <td width="30">\n' +
        '                    <div class="d-flex">\n' +
        '                        <span class="btn btn-sm btn-outline-success mr-2 js_add_this_td_btn "><i class="fas fa-plus"></i></span>\n' +
        '                        <span class="btn btn-danger js_remove_tr_btn"><i class="fas fa-minus"></i></span>\n' +
        '                    </div>\n' +
        '                </td>\n' +
        '            </tr>'

    table.append(tr)
}

$(document).ready(function() {

    $('body').delegate('.js_add_tr_btn', 'click', function (e){
        let trCountRow = ($(this).parents('table').find('tbody').attr('data-count-row'))*1+1;
        console.log(trCountRow);
        create_tr(trCountRow);
        $(this).parents('table').find('tbody').attr('data-count-row', trCountRow);
    })

    const bodyHtml = $('body');
    bodyHtml.delegate('.js_remove_tr_btn', 'click', function (){
        $(this).parents('tr').remove();
    });

    bodyHtml.delegate('.js_remove_this_td_btn', 'click', function (){
        let thisTd= $(this).parents('td');
        let thisTr = thisTd.parents('tr');
        let thisColSpanCount = thisTr.find('.first-td').attr('colspan')*1;
        console.log(thisColSpanCount)
        thisTr.find('.first-td').attr('colspan',(thisColSpanCount+1))
        $(this).closest('td').remove();
    });

    bodyHtml.delegate('.js_add_this_td_btn', 'click', function (){
        let thisTr = $(this).parents('tr');
        let thisRowTr = ($(this).parents('tr').attr('data-row'))*1;
        let thisTdLength = thisTr.find('td').length;
        //console.log(thisTdLength);
        if (thisTdLength <= 3) {
            $(this).parents('tr').find('.first-td').attr('colspan',((thisTdLength==3)?2:3) )
            let valueInput = 'value'+((thisTdLength==3)?2:1);
            let td = ' <td>\n' +
                '                    <div class="d-flex">\n' +
                '                        <div class="w-100">\n' +
                '                            <input type="text" class="form-control" name="ProductST['+thisRowTr+'][en]['+valueInput+']" placeholder="Text en">\n' +
                '                            <input type="text" class="form-control my-1" name="ProductST['+thisRowTr+'][ru]['+valueInput+']" placeholder="Text ru">\n' +
                '                            <input type="text" class="form-control" name="ProductST['+thisRowTr+'][uz]['+valueInput+']" placeholder="Text uz">\n' +
                '                        </div>\n' +
                '                        <span class="btn btn-sm btn-outline-danger mx-1 js_remove_this_td_btn"><i class="fas fa-minus"></i></span>\n' +
                '                    </div>\n' +
                '                </td>';

            $(this).parents('td').before(td);
        }
    });
});
