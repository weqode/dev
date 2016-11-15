//Change active menu link on scroll
var sections = jQuery('section'),
    nav = jQuery('.wq-main-nav'),
    nav_height = nav.outerHeight();

jQuery(window).on('scroll', function() {
    var cur_pos = jQuery(this).scrollTop();

    sections.each(function() {
        var top = jQuery(this).offset().top - nav_height,
            bottom = top + jQuery(this).outerHeight();

        if (cur_pos >= top && cur_pos <= bottom) {
            nav.find('a').removeClass('current_page_item current-menu-item');
            sections.removeClass('current_page_item current-menu-item');

            jQuery(this).addClass('current_page_item current-menu-item');
            nav.find('a[href="#' + jQuery(this).attr('id') + '"]').addClass('current_page_item current-menu-item');
        }
    });
});

//Change active menu link on click
nav.find('a').on('click', function() {
    var $el = jQuery(this),
        id = $el.attr('href');

    jQuery('html, body').animate({
        scrollTop: jQuery(id).offset().top - 100
    }, 1000);

    return false;
});
