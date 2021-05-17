    $(document).ready(function () {
    $('#slider .owl-carousel').owlCarousel({
        loop: false,
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
        $(".owl-slider").owlCarousel({
            autoplayHoverPause: 1,
            loop: 1,
            margin: 0,
            dots: 0,
            lazyLoad: 1,
            autoplay: 1,
            autoplayTimeout: 3000,
            items: 1,
            nav: false
        });
    });

// Mmenu
$(document).ready(function() {
    var API = $("#menu").mmenu({
        dragOpen: true,
        position:'front',
        direction:'left',
    }).data( "mmenu" );
    $("#menu-button").click(function() {
        API.open();
    });
});

// Zoom Image
$(document).ready(function () {
    $(".block__pic").imagezoomsl({
        zoomrange: [3, 3]
    });
});
// Giu menu
$(document).ready(function() {
    $(window).scroll(function() {
        $top = $(window).scrollTop();
        if($top > 200) {
            $('.menu').addClass('fixed');
        } else {
            $('.menu').removeClass('fixed');
        }
        });
});

$('#qty').on('change', function(){
    debugger
    var a = $('#qty').val();
    var gia = document.getElementById('price');
    $('#thanhtien').text(parseInt(a)*parseInt(gia.innerHTML));
})
