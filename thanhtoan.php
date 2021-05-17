<?php 
	include 'inc/header.php';
?>
<?php
	$subtotal=0;
	$qty=0;
    if(isset($_GET['delid'])){
        $cartid = $_GET['delid']; 
        $delcart = $ct->del_product_cart($cartid);
    }
        
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updatequantity'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $cartId = $_POST['cartId'];
        $quantity = $_POST['quantity'];
        $update_quantity_Cart = $ct -> update_quantity_Cart($cartId, $quantity);
    	if ($quantity <= 0) {
    		$delcart = $ct->del_product_cart($cartId);
    	}
	}

	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['dathang'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
		$hotenKh=$_POST['hotenKh'];
		$sdtKh=$_POST['sdtKh'];
		$emailKh=$_POST['emailKh'];
		$diachiKh=$_POST['diachiKh'];
		
       	$insertOrder = $ct -> insertOrder($hotenKh,$sdtKh,$emailKh,$diachiKh);
	}
	
	
 ?>
 <style>
 	#btndathang{
 		background: #ec6f0b;
	    border: none;
	    width: 90px;
	    height: 40px;
	    color: white;
	    border-radius: 5px;
	    cursor: pointer;
 	}
 	#btndathang:hover{
 		background: #e44b4b;
 	}
 </style>
	<div class="giohang">
		<div class="container">
			<div class="text-center mt-5">
				<h2 style="color:#EC6F0B; font-weight:bold;">GIỎ HÀNG</h2>
			</div>
			<?php
				if(isset($update_quantity_Cart)){
					echo $update_quantity_Cart;
				}
			?>

			<div class="showcart mt-3">
				<table class="tbl_title">
					<tr class="text-center">
						<td style="width:30%">Tên sản phẩm</td>
						<td style="width:10%">Hình ảnh</td>
						<td style="width:10%">Giá</td>
						<td style="width:30%">Số lượng</td>
						<td style="width:10%" class="d-none d-sm-table-cell">Tổng giá</td>
						<td style="width:10%">Xoá</td>
					</tr>
				</table>
				<table class="tbl_hienthi">
					<?php
						$product_cart = $ct ->get_product_cart();
						if($product_cart){
							while($result_cart= $product_cart->fetch_assoc()){

					?>
					<tr class="text-center show_hang" >
						<td style="width:30%"><?php echo $result_cart['productName']?></td>
						<td style="width:10%"><img src="admin/uploads/<?php echo $result_cart['image']?>"></td>
						<td style="width:10%"><?php echo $fm->format_currency($result_cart['giale'])?></td>
						<td style="width:30%">
							<form action="" method="post">
								<input type="hidden" name="cartId" min="0" value="<?php echo $result_cart['cartId'] ?>"/>
								<input type="number" name="quantity" min="0" value="<?php echo $result_cart['quantity'] ?>"/>
								<input type="submit" name="updatequantity" value="Update" style="background: #0c0c0c;border: none;color: white;border-radius: 5px;cursor: pointer;"/>
							</form>
						</td>
						<td style="width:10%;" class="d-none d-sm-table-cell">
							<?php 
								$total=$result_cart['giale']*$result_cart['quantity'];
								echo $fm->format_currency($total);
							?>
						</td>
						<td style="width:10%"><a href="?delid=<?php echo $result_cart['cartId'] ?>"><i class="far fa-trash-alt"></i></a></td>
					</tr>
					<?php
						$subtotal += $total;
						$qty = $qty + $result_cart['quantity'];
								}
							}
						?>
				</table>
				<?php
					$check_cart = $ct->check_cart();
					if($check_cart){
				?>
				<div class="tonggia pl-5 pt-1 pb-1" style="background:#ec6f0b">
					<span style="color:white;font-size:22px;";>
					Tổng giá: 
					<?php 
						echo $fm->format_currency($subtotal)." VND";
					?>
					
					<span>
				</div>
				<div class="mt-2" style="float:right;display:flex;">
					<div class="muatiep text-center mr-3" style="width: 100px;background: #ee7e24;border: 1px solid black;">
						<a href="trangchu.php" style="color:white;">Mua Tiếp</a>
					</div>
					<div class="thanhtoan text-center" style="width: 100px;background: #ee7e24;border: 1px solid black;">
						<a href="" style="color:white;">Thanh Toán</a>
					</div>
				</div>
				<div class="formDangki mt-5">
	                <form method="POST" action="" class="text-center">
	                    <div class="input-group mb-3">
	                        <div class="input-group-prepend">
	                            <span class="input-group-text"><i class="fas fa-user"></i></span>
	                        </div>
	                        <input type="text" name="hotenKh" class="form-control" placeholder="Họ và Tên *"
	                            aria-label="Username">
	                    </div>
	                    <div class="input-group mb-3">
	                        <div class="input-group-prepend">
	                            <span class="input-group-text"><i class="fas fa-phone-volume"></i></span>
	                        </div>
	                        <input type="text" name="sdtKh" class="form-control" placeholder="Số điện thoại *"
	                            aria-label="Sdt">
	                    </div>
	                   
	                    <div class="input-group mb-3">
	                        <div class="input-group-prepend">
	                            <span class="input-group-text"> <i class="fas fa-envelope"></i></span>
	                        </div>
	                        <input type="text" name="emailKh" class="form-control" placeholder="Email *"
	                            aria-label="Email">
	                    </div>
	                    <div class="input-group mb-3">
	                        <div class="input-group-prepend">
	                            <span class="input-group-text"><i class="fa fa-address-book" aria-hidden="true"></i></span>
	                        </div>
	                        <input type="text" name="diachiKh" class="form-control" placeholder="Địa chỉ *"
	                            aria-label="Diachi">
	                    </div>
	                    <input type="submit" name="dathang" value="Đặt Hàng" id="btndathang"></input>
	                </form>
	                <div class="text-center">
		                <?php
		                	if(isset($insertOrder)){
		                		echo $insertOrder;
		                	}
						?>
					</div>
            	</div>
				<?php
					}else{
						echo 'Giỏ hàng của bạn không có gì. Vui lòng chọn sản phẩm thêm vào giỏ hàng!';
					}
				?>
			</div>
		</div>
	</div>
<?php 
	include 'inc/footer.php';
?>