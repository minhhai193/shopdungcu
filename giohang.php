<?php 
	include 'inc/header.php';
?>
<?php
	$subtotal=0;
	$qty=0;
    if(isset($_GET['delid']))
    {
        $key = $_GET['delid']; 
        if(isset($key))
        {
        	if(array_key_exists($key,$_SESSION['cart']))
         	{
         		unset($_SESSION['cart'][$key]);
         	}
        }
    }
        
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        foreach($_SESSION['cart'] as $key => $value){
			$thanhtoan=$ct->thanhtoan($_SESSION['cart'][$key]['productname']);
		}
	}
	
?>
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
						<td style="width:10%"class="d-none d-sm-table-cell">Tổng giá</td>
						<td style="width:10%">Xoá</td>
					</tr>
				</table>
				<table class="tbl_hienthi">
					<?php
						foreach($_SESSION['cart'] as $key => $result_cart){
					?>
					<tr class="text-center show_hang">
						<td style="width:30%"><?php echo $result_cart['productname']?></td>
						<td style="width:10%"><img src="admin/uploads/<?php echo $result_cart['image']?>"></td>
						<td style="width:10%" id="price"><?php echo $fm->format_currency($result_cart['price'])?></td>
						<td style="width:30%">
							<form action="" method="post">
								<input type="hidden" name="cartId" min="0" value="<?php echo $result_cart['cartId'] ?>"/>
								<input type="number" name="quantity" min="0" value="<?php echo $result_cart['quantity'] ?>" id="qty"/>
							</form>
						</td>
						<td style="width:10%" class="d-none d-sm-table-cell" id="thanhtien">
							<?php 
								$total=$result_cart['price']*$result_cart['quantity'];
								echo $fm->format_currency($total);
							?>
						</td>
						<td style="width:10%"><a href="?delid=<?= $key?>"><i class="far fa-trash-alt"></i></a></td>
					</tr>
					<?php
						$subtotal += $total;
							}
						?>
				</table>
				<?php
					if(isset($_SESSION['cart'])){
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
						<a href="thanhtoan.php" style="color:white;">Thanh Toán</a>
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