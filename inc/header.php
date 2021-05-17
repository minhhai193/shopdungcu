<?php
    include 'lib/session.php';
    Session::init();
?>
<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>TRUNG SPORT DỤNG CỤ VÕ</title>
        <link rel="SHORTCUT ICON" href="images/logo1.png">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="css/jquery.mmenu.all.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.mmenu/4.1.6/js/jquery.mmenu.min.all.js"></script>
        <!--SIDEBAR-->
        <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
        <!--FONT CHU-->
        <link rel="stylesheet" type="text/css" href="css/details.css">
        <link rel="stylesheet" type="text/css" href="css/giohang.css">
        <link rel="stylesheet" type="text/css" href="css/gioithieu.css">
        <link rel="stylesheet" type="text/css" href="css/feedback.css">
        <link rel="stylesheet" type="text/css" href="css/lienhe.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/owlcarousel/dist/assets/owl.carousel.css">
        <link rel="stylesheet" href="css/owl.theme.default.min.css">
        <link rel="stylesheet" href="css/simplyscroll/jquery.simplyscroll.min.css">
        <!--SLIDER-->
        <script src="https://kit.fontawesome.com/0b176a5748.js"></script>
        <!--FONT ICON-->
    </head>
    <?php
        require 'lib/database.php';
        include 'helpers/format.php';
        spl_autoload_register(function($class){
            include_once "classes/".$class.".php";
        });
        $db = new Database();
        $fm = new Format();
        $brand = new brand();
        $ct= new cart();
        $cat = new category();
        $product = new product();
        $admin = new admin();
        $post = new post();
        $search = new search();
    ?>
<body>
    <div class="header mb-3">
        <div class="container">
            <div class="row">
                <div class="menu_morong col-2 d-block d-lg-none d-md-none">
                    <div class="btn_menu align-items-center">
                        <a id="menu-button"><img src="images/menu.png" style="width: 100%;max-width: 1.5em;"></a>
                    </div>
                    <nav id="menu">
                        <ul>
                            <li>
                                <a href="./">TRANG CHỦ</a>
                            </li>
                            <li>
                                <a href="gioithieu.php">GIỚI THIỆU</a>
                            </li>
                            <li>
                                <a href="show_product.php">SẢN PHẨM</a>
                                <ul>
                                    <?php
                                    $product_feathered = $cat ->show_category();
                                    if($product_feathered){
                                        while($result= $product_feathered->fetch_assoc()){
                                            ?>
                                            <li>
                                                <a href="show_product.php?catName=<?=$result['catName']?>"><?php echo $result['catName']?></a>
                                            </li>
                                            <?php
                                        }
                                    }
                                    ?>
                                </ul>
                            </li>
                            <li>
                                <a href="show_product.php">KHUYẾN MÃI</a>
                            </li>
                            <li>
                                <a href="feedback.php">FEEDBACK</a>
                            </li>
                            <li>
                                <a href="show_post.php">TIN TỨC & SỰ KIỆN</a>
                            </li>
                            <li>
                                <a href="lienhe.php">LIÊN HỆ</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-4 col-md-12 col-8 text-md-center">
                    <a href="trangchu.php"><img src="images/logo.png" style="max-width: 100%;"></a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 pt-3">
                    <form class="input-group" method="POST" action="search.php">
                        <input class="form-control py-2 border-right-0 border" type="search" name="search"
                        placeholder="Nhập từ khoá ......">
                        <span class="input-group-append">
                            <button class="btn btn-outline-secondary border-left-0 border" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </form>
                </div>
                <div class="col-lg-4 col-md-6  col-10 pt-2 items">
                    <div class="img">
                        <img src="images/hotline.png">
                    </div>
                    <div class="details">
                        <p>Hotline:</p>
                        <p id="sdt">028.66861139 - 0916 100 801</p>
                    </div>
                </div>
                <div class="col-2 text-center pt-4 d-lg-none d-md-none d-sm-block">
                    <li style="border:none;list-style: none;">
                        <a href="#">
                            <i class="fas fa-cart-plus" style="color:orange"></i>
                        </a>
                    </li>
                </div>
            </div>
        </div>
    </div>
    <div class="slider1 mb-3">
        <div class="container">
            <div id="slider">
                <div class="owl-carousel owl-theme">
                    <div class="item">
                        <div class="img">
                            <img src="images/chatluong.png">
                        </div>
                        <div class="details ml-2">
                            <h3><a href="#">CHẤT LƯỢNG SẢN PHẨM</a></h3>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img">
                            <img src="images/gia.png">
                        </div>
                        <div class="details ml-2">
                            <h3><a href="#">GIÁ SỈ MIỄN PHÍ GIAO HÀNG</a></h3>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img">
                            <img src="images/doitra.png">
                        </div>
                        <div class="details ml-2">
                            <h3><a href="#">ĐỔI TRẢ TRONG 7 NGÀY</a></h3>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img">
                            <img src="images/thanhtoan.png">
                        </div>
                        <div class="details ml-2">
                            <h3><a href="#">THANH TOÁN TRỰC TIẾP</a></h3>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img">
                            <img src="images/giaohang.png">
                        </div>
                        <div class="details ml-2">
                            <h3><a href="#">GIAO HÀNG TOÀN QUỐC</a></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="menufixed">
        <div class="menu d-none d-lg-block d-md-block clearfix">
            <div class="wrapper_container">
                <ul id="main_menu">      
                    <li><a href="./">TRANG CHỦ</a></li>
                    <li><a href="gioithieu.php">GIỚI THIỆU</a></li>
                    <li><a href="show_product.php">SẢN PHẨM</a>
                        <ul class="sub_menu">
                            <?php
                            $showcategory = $cat ->show_category();
                            if($showcategory){
                                while($result= $showcategory->fetch_assoc()){
                                    ?>
                                    <li><a href="show_product.php?catName=<?=$result['catName']?>"><?php echo $result['catName']?></a></li>
                                    <?php
                                }
                            }
                            ?>
                        </ul>
                    </li>
                    <li><a href="show_product.php">KHUYẾN MÃI</a></li>
                    <li><a href="feedback.php">FEEDBACK</a></li>
                    <li><a href="show_post.php">TIN TỨC & SỰ KIỆN</a></li>
                    <li> <a href="lienhe.php">LIÊN HỆ</a></li>
                    <li>
                        <a href="giohang.php">
                            <i class="fas fa-cart-plus"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
