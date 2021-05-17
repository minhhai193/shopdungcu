<?php 
    include 'inc/header.php';
?>  
<?php
    if(!empty($_POST)){
        $key = $_POST['search'];
        if($key!=''){ 
            $productbycat= $cat->get_product_by_cat($catName);
                if($productbycat){
                    $result_cat=$productbycat->fetch_assoc();
                }
                $getproduct = $product ->getproductbycatid($result_cat['catId']);   
    }else {
        $title = "";
    }
?>
    <div class="show_sanpham">
        <div class="container">
            <div class="title_style text-center mt-5 mb-4">
                <h3 id="title"><?=$catName?></h3>
            </div>
            <div class="showsanpham">
                <div class="row">
                    <?php
                        if(isset($show_product_index)){
                            while($result_pd= $show_product_index->fetch_assoc()){
                    ?>      
                    <div class="col-x">
                        <div class="khungsanpham mr-2 ml-2 mt-2">
                            <div class="img">
                                <a href="details.php?proid=<?php echo $result_pd['productId']?>"><img src="admin/uploads/<?php echo $result_pd['image']?>"></a>
                            </div>
                            <div class="details text-center">
                                <a href="details.php?proid=<?php echo $result['productId']?>">
                                    <p><?php echo $result_pd['productName']?></p>
                                </a>
                                <p id="gia">Giá Sỉ: <span><?php echo $fm->format_currency($result_pd['giasi'])?> VND</span></p>
                                <p id="gia">Giá Lẻ: <span><?php echo $fm->format_currency($result_pd['giale'])?> VND</span></p>
                            </div>
                        </div>
                    </div>
                    <?php
                            }
                        }
                    ?>
                    <?php
                        if($getproduct != ""){
                            while($result_pd= $getproduct->fetch_assoc()){
                    ?>                
                    <div class="col-x">
                        <div class="khungsanpham mr-2 ml-2 mt-2">
                            <div class="img">
                                <a href="details.php?proid=<?php echo $result_pd['productId']?>"><img src="admin/uploads/<?php echo $result_pd['image']?>"></a>
                            </div>
                            <div class="details text-center">
                                <a href="details.php?proid=<?php echo $result['productId']?>">
                                    <p><?php echo $result_pd['productName']?></p>
                                </a>
                                <p id="gia">Giá Sỉ: <span><?php echo $fm->format_currency($result_pd['giasi'])?> VND</span></p>
                                <p id="gia">Giá Lẻ: <span><?php echo $fm->format_currency($result_pd['giale'])?> VND</span></p>
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
<?php 
    include 'inc/footer.php';
?>