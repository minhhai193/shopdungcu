
<?php 
	include 'inc/header.php';
?>	
<?php 
    include 'inc/slider.php';
?>  
    <div class="sanpham">
        <div class="container">
            <div class="title_style text-center mt-5 mb-4">
                <h3 id="title">SẢN PHẨM MỚI</h3>
                <h3 id="slogan">"Trung Sport sự lựa chọn tốt nhất cho bạn"</h3>
            </div>
            <div class="showsanpham">
                <div class="row">
                    <?php
                        $product_feathered = $product ->getproduct_feathered();
                        if($product_feathered){
                            while($result_new= $product_feathered->fetch_assoc()){

                    ?>
                    <div class="col-x">
                        <div class="khungsanpham mr-2 ml-2 mt-2">
                            <div class="img">
                                <a href="details.php?proid=<?php echo $result_new['productId']?>"><img src="admin/uploads/<?php echo $result_new['image']?>"></a>
                            </div>
                            <div class="details text-center">
                                <a href="details.php?proid=<?php echo $result_new['productId']?>">
                                    <p><?php echo $result_new['productName']?></p>
                                </a>
                                <p id="gia">Giá Sỉ: <span><?php echo $fm->format_currency($result_new['giasi'])?> VND</span></p>
                                <p id="gia">Giá Lẻ: <span><?php echo $fm->format_currency($result_new['giale'])?> VND</span></p>
                            </div>
                        </div>
                    </div>
                    <?php
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="banner1 mt-5">
        <img src="images/banner.png" style="width:100%;">
    </div>
    <div class="salekhung">
        <div class="title_style text-center mt-5 mb-4">
            <h3 id="title">SẢN PHẨM THỊNH HÀNH NHẤT</h3>
            <h3 id="slogan">"Trung Sport sự lựa chọn tốt nhất cho bạn"</h3>
        </div>
        <div class="showsanpham">
            <div class="container">
                <div class="row">
                        <?php
                            $product_feathered = $product ->getproduct_feathered();
                            if($product_feathered){
                                while($result= $product_feathered->fetch_assoc()){

                        ?>
                        <div class="col-x">
                            <div class="khungsanpham mr-2 ml-2 mt-2">
                                <div class="img">
                                    <a href="#"><img src="admin/uploads/<?php echo $result['image']?>"></a>
                                </div>
                                <div class="details text-center">
                                    <a href="#">
                                        <p><?php echo $result['productName']?></p>
                                    </a>
                                    <p id="gia">Giá Sỉ: <span><?php echo $fm->format_currency($result['giasi'])?> VND</span></p>
                                    <p id="gia">Giá Lẻ: <span><?php echo $fm->format_currency($result['giale'])?> VND</span></p>
                                </div>
                            </div>
                        </div>
                        <?php
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="banner2 mt-5">
        <img src="images/banner2.png" style="width: 100%;">
    </div>
    <div class="danhmucsanpham">
        <div class="container">
            <div class="title_danhmuc pt-5">
                <h3>DANH MỤC SẢN PHẨM</h3>
            </div>
            <div class="menu_danhmuc pt-5 pb-4">
                <div class="row">
                    <?php
                        $product_feathered = $cat ->show_category();
                        if($product_feathered){
                            while($result= $product_feathered->fetch_assoc()){

                    ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-1">
                        <h3 class="list">
                            <a href="show_product.php?catName=<?=$result['catName']?>"><?php echo $result['catName']?></a>
                        </h3>
                    </div>
                    <?php
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="danhmucthuonghieu">
        <div class="container">
            <div class="title_danhmuc pt-5">
                <h3>DANH MỤC THƯƠNG HIỆU</h3>
            </div>
            <div class="row">
                    <?php
                        $showbrand = $brand ->show_brand();
                        if($showbrand){
                            while($result= $showbrand->fetch_assoc()){

                    ?>
                <div class="col-lg-3 col-md-4 col-6">
                    <h3 class="menu_thuonghieu">
                        <a href="#" style="text-transform: uppercase;"><?php echo $result['brandName']?></a>
                    </h3>
                </div>
                    <?php
                            }
                        }
                    ?>
            </div>
        </div>
    </div>
    <div class="gioithieu">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <div id="boxNews" >
                       <div class="title_gioithieu pt-5 mb-3">
                            <h3>TIN TỨC VÀ SỰ KIỆN</h3>
                        </div>
                        <ul class="simplyscroll_post ul">
                            <li class="items">
                                <div class="img">
                                    <img src="images/tintuc.png">
                                </div>
                                <div class="details">
                                    <h3>Võ thuật và Võ đạo</h5>
                                    <p><?= $fm->catchuoi("Võ thuật ngày nay là không chỉ là một bộ môn thể thao được nhiều người yêu thích tập
                                        luyện mà còn...",50)?></p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="title_gioithieu pt-5 mb-3">
                        <h3>VIDEO CLIPS</h3>
                    </div>
                    <video width="100%" controls>
                        <source src="phim.mp4" type="video/mp4">
                    </video>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="title_gioithieu pt-5 mb-3">
                        <h3>FANPAGE FACEBOOK</h3>
                    </div>
                    <iframe
                        src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FGi%C3%A0y-D%C3%A9p-H%C3%A0ng-Hi%E1%BB%87u-Chu%E1%BA%A9n-Authentic-104008431057151%2F&tabs=timeline&width=400px&height=245px&small_header=true&adapt_container_width=false&hide_cover=false&show_facepile=true&appId"
                        width="400px" height="245px" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
                        allowTransparency="true" allow="encrypted-media"></iframe>
                </div>
            </div>
        </div>
    </div>
    
<?php 
	include 'inc/footer.php';
?>
   