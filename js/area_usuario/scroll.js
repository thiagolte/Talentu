$(function () {
    var msie6 = $.browser == 'msie' && $.browser.version < 7;
    if (!msie6) {
        var top = $('.internal_menu').offset().top - parseFloat($('.internal_menu').css('margin-top').replace(0, 0));
        $(window).scroll(function () {
            var y = $(this).scrollTop();
            if (y >= top) {
                $('.internal_menu').addClass('fixed_menu');
                $('.container').addClass('clearance');
                $('.shadow').addClass('show');
                $('.close_item').addClass('show');
            } else {
                $('.internal_menu').removeClass('fixed_menu');
                $('.container').removeClass('clearance');
                $('.shadow').removeClass('show');
                $('.close_item').removeClass('show');
            }
        });
    }    
});

