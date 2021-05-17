$(document).ready(function () {
    $('#slider .owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        dots:false,
        responsive: {
            0: {
                items: 2,
                autoplayHoverPause: true,
                autoplay: true,
                autoplayTimeout: 3000,
            },
            600: {
                items: 3,
                autoplayHoverPause: true,
                autoplay: true,
                autoplayTimeout: 3000,
            },
            1000: {
                items: 5
            }
        }
    })
});
$(document).ready(function () {
    $('#slider1 .owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        dots: false,
        autoplayHoverPause: true,
        autoplay: true,
        autoplayTimeout: 2000,
        items:1
    })
});

$(document).ready(function () {
    $('#my-menu').mmenu();
});

// Messenger
jQuery(document).ready(function ($) {
    var $filter = $('.iconmessenger');
    var $filterSpacer = $('<div />', {
        "class": "vnkings-spacer",
        "height": $filter.outerHeight()
    });
    if ($filter.size()) {
        $(window).scroll(function () {
            if (!$filter.hasClass('fix') && $(window).scrollTop() > $filter.offset().top) {
                $filter.before($filterSpacer);
                $filter.addClass("fix");
            }
            else if ($filter.hasClass('fix') && $(window).scrollTop() < $filterSpacer.offset().top) {
                $filter.removeClass("fix");
                $filterSpacer.remove();
            }
        });
    }

});
