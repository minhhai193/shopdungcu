<?php 
	include 'inc/header.php';
?>

<?php 
	if(!isset($_GET['proid']) || $_GET['proid'] == NULL){
        echo "<script> window.location = '404.php' </script>";
        
    }else {
        $id = $_GET['proid']; // Lấy productid trên host
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $quantity = $_POST['quantity'];
        $addtoCart = $ct -> add_to_cart($id, $quantity);
    }  
 ?>
<link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
<link rel="stylesheet" href="css/zoomimage.css">
<!-- Zoom Image -->

    <div class="chitietsanpham mt-5">
        <div class="container">
            <div class="row">
                <?php
                    $get_product_details = $product->get_details($id);
                    if($get_product_details){
                        while($resultdetails=$get_product_details->fetch_assoc()){

                ?>
                <div class="col-lg-4 col-md-5 col-sm-10">
                    <div class="block">
                        <img src="admin/uploads/<?php echo $resultdetails['image']?>" alt="Image To Zoom" class="block__pic" data-title="Zoom Image" data-help="">
                    </div>
                </div>
                <div class="col-lg-8 col-md-7 col-sm-12 pl-3">
                    <div class="tensanpham mb-2">
                        <h3><?php echo $resultdetails['productName']?></h3>
                    </div>
                    <p>Mã sản phẩm: <?php echo $resultdetails['productId']?></p>
                    <p>Hãng: <?php echo $resultdetails['brandName']?></p>
                    <p>Giá sỉ:<span> <?php echo $fm->format_currency($resultdetails['giasi'])?> VND</span></p>
                    <p>Giá lẻ:<span> <?php echo $fm->format_currency($resultdetails['giale'])?> VND</span></p>
                    <div class="add_cart">
                        <form action="" method="POST">
                            <span>Số lượng: </span>
                            <input type="number" class="mr-5" name="quantity" value="1" min="1"/>
                            <input type="submit" class="datmua" name="submit" value ="ĐẶT MUA" href="giohang.php"/>
                        </form>
                        <?php
                            if(isset($addtoCart)){
                                echo '<p style="color:green;">Sản phẩm đã được thêm vào giỏ hàng.</p>';
                            }
                        ?>
                    </div>
                </div>
                <?php
                        }
                    }
                ?>
            </div>
        </div>
    </div>
<?php 
	include 'inc/footer.php';
?>