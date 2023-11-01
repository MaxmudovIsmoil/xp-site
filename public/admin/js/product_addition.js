function menu($this, this_div) {

    if($this.hasClass('btn-outline-primary')) {
        $this
            .removeClass('btn-outline-primary')
            .addClass('btn-primary')
    }
    $this.siblings('.btn')
        .removeClass('btn-primary')
        .addClass('btn-outline-primary')

    if (this_div.hasClass('d-none')) {
        this_div.removeClass('d-none');
    }
    this_div.siblings('div').addClass('d-none');
}
$(document).on('click', '.js_product_photo', function (e) {
    e.preventDefault();
    let this_div = $('.div_photo')
    menu($(this), this_div)
    localStorage.setItem('addition_product_photo_btn', 'true');
    localStorage.setItem('addition_product_overview_btn', 'false');
    localStorage.setItem('addition_product_specification_btn', 'false');
    localStorage.setItem('addition_product_service_support_btn', 'false');
});

if (localStorage.getItem('addition_product_photo_btn') !== 'false') {
    let this_div = $('.div_photo');
    let this_btn = $('.js_product_photo');
    menu(this_btn, this_div);
}

// ***************************************************************************************
$(document).on('click', '.js_product_overview', function (e) {
    e.preventDefault();
    let this_div = $('.div_overview')
    menu($(this), this_div)
    localStorage.setItem('addition_product_photo_btn', 'false');
    localStorage.setItem('addition_product_overview_btn', 'true');
    localStorage.setItem('addition_product_specification_btn', 'false');
    localStorage.setItem('addition_product_service_support_btn', 'false');
});

if (localStorage.getItem('addition_product_overview_btn') !== 'false') {
    let this_div = $('.div_overview');
    let this_btn = $('.js_product_overview');
    menu(this_btn, this_div);
}
// ***************************************************************************************
$(document).on('click', '.js_product_specification', function (e) {
    e.preventDefault();
    let this_div = $('.div_specification')
    menu($(this), this_div)
    localStorage.setItem('addition_product_photo_btn', 'false');
    localStorage.setItem('addition_product_overview_btn', 'false');
    localStorage.setItem('addition_product_specification_btn', 'true');
    localStorage.setItem('addition_product_service_support_btn', 'false');
});


if (localStorage.getItem('addition_product_specification_btn') !== 'false') {
    let this_div = $('.div_specification');
    let this_btn = $('.js_product_specification');
    menu(this_btn, this_div);
}

// ***************************************************************************************
$(document).on('click', '.js_product_service_support', function (e) {
    e.preventDefault();
    let this_div = $('.div_service_support');
    menu($(this), this_div);
    localStorage.setItem('addition_product_photo_btn', 'false');
    localStorage.setItem('addition_product_overview_btn', 'false');
    localStorage.setItem('addition_product_specification_btn', 'false');
    localStorage.setItem('addition_product_service_support_btn', 'true');
});


if (localStorage.getItem('addition_product_service_support_btn') !== 'false') {
    let this_div = $('.div_service_support');
    let this_btn = $('.js_product_service_support');
    menu(this_btn, this_div);
}


// ***************************************************************************************
