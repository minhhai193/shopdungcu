    <div class="footer mt-5">    
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6 mt-5">
                    <h3 class="mb-4">CỬA HÀNG TDTT TRUNG SPORT</h3>
                    <div class="mb-2">
                        <img src="images/map.png"><span>728/13/25 Trần Hưng Đạo, P2, Quận 5, TP.HCM</span>
                    </div>
                    <div class="mb-2">
                        <img src="images/phone.png"><span>0916 100 810 - 028.66861139</span>
                    </div>
                    <div class="mb-2">
                        <img src="images/mail.png"><span>dungcuvo@gmail.com</span>
                    </div>
                    <div class="mb-2">
                        <img src="images/web.png"><span>https://dungcuvo.com/</span>
                    </div>
                    <div class="mxh mt-5">
                        <span>MẠNG XÃ HỘI:
                            <a href="#"><img src="images/fb.png"></a>
                            <a href="#"><img src="images/twitter.png"></a>
                            <a href="#"><img src="images/youtube.png"></a>
                            <a href="#"><img src="images/insta.png"></a>
                        </span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mt-5">
                    <h5>HỖ TRỢ KHÁCH HÀNG</h5>
                    <div id="hotrokh mt-5">
                        <div id="box"><a href="#">
                                <p>Chất lượng sản phẩm</p>
                            </a></div>
                        <div id="box"><a href="#">
                                <p>Giá sỉ miễn phí giao hàng</p>
                            </a></div>
                        <div id="box"><a href="#">
                                <p>Đổi trả trong 7 ngày</p>
                            </a></div>
                        <div id="box"><a href="#">
                                <p>Thanh toán trực tuyến</p>
                            </a></div>
                        <div id="box"><a href="#">
                                <p>Giao hàng toàn quốc</p>
                            </a></div>
                        <div class="img mt-3">
                            <img src="images/chungnhan.png" style="border:none;width:10em;">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mt-5">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.129557166617!2d106.66064765804977!3d10.80138794801173!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317529309a1b98bf%3A0x5d9fe06f46cc5c31!2zQ8OUTkcgVFkgQ-G7lCBQSOG6pk4gVFJVWeG7gE4gVEjDlE5HIENJUCBNRURJQQ!5e0!3m2!1svi!2s!4v1592364781352!5m2!1svi!2s"
                        width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen=""
                        aria-hidden="false" tabindex="0">
                    </iframe>
                </div>
            </div>
        </div>
        <div class="copyright pt-2 pb-2 mt-3">
            <div class="container">
                <p>COPYRIGHT © 2020 TRUNG SPORT</p>
            </div>
        </div>
        </div>
    <div class="iconmessenger fix">
        <a href="https://www.messenger.com/t/104008431057151" target="_blank"><img src="images/messengericon.png"
                style="width: 100%;"></a>
    </div>
    <a href="#" class="btn_scrolltop"><i class="fa fa-chevron-up" aria-hidden="true"></i></a>
    <div class="quick-alo-phone quick-alo-green quick-alo-show" id="quick-alo-phoneIcon" style="right: 10px; top: 20%;">
        <a href="tel:0367896503" title="Liên hệ nhanh">
            <div class="quick-alo-ph-circle"></div>
            <div class="quick-alo-ph-circle-fill"></div>
            <div class="quick-alo-ph-img-circle"></div>
        </a>
    </div>
</body>
<script type="text/javascript" src="css/owlcarousel/dist/owl.carousel.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script src="js/fancyapp/jquery.fancybox.js"></script>
<script src="css/simplyscroll/jquery.simplyscroll.min.js"></script>
<link href="js/fancyapp/jquery.fancybox.css" type="text/css" rel="stylesheet" />
<link href="css/animate.min.css" type="text/css" rel="stylesheet" />
<script src="js/zoomsl.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.fancybox').fancybox();
        $(window).scroll(function() {
            $top = $(window).scrollTop();
            if($top > 100) {
                $('#top').fadeIn();
                $('.header').addClass('fixed');
            } else {
                $('#top').fadeOut();
                $('.header').removeClass('fixed');
            }
        });
        $('#top').click(function() {
            $('html, body').animate({scrollTop:0},500);
            return false;
        });
    });
</script>
<script>
    $(document).ready(function () {
    $('#slider3 .owl-carousel').owlCarousel({
        loop: true,
        autoplay:false
        autoplayTimeout:5000
        autoplayHoverPause:false
        margin: 10,
        nav: false,
        dots: false,
        responsive: {
            0: {
                items: 2
            },
            600: {
                items: 3
            },
            1000: {
                items: 4
            }
        }
    })
}); 

    $(".simplyscroll_post").simplyScroll({orientation:'vertical',customClass:'vert1'});
</script>
</html>
 
   