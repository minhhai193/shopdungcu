<?php include 'inc/header.php';?>
<?php 
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../classes/cart.php');
include_once ($filepath.'/../helpers/format.php');
?>
<?php 
	$cart= new cart();
	if(isset($_GET['tt_donhang']) && isset($_GET['type'])){
		$id = $_GET['tt_donhang'];
		$type = $_GET['type'];
		$update_tinhtrang = $cart->update_tinhtrang($id,$type);
	}
 ?>
		<div class="title-style"><h4><i class="fas fa-home mr-3"></i>Thông tin đơn hàng</h4></div>
		<div class="boxInsert">
			<?php 
			if(isset($delbrand)){
				echo $delbrand;
			}
			?>      
			<table class="data display datatable" id="example">
				<thead>
					<tr class="boxTitle_pd">
						<th id="thutu">Thứ tự</th>
						<th>Ngày đặt</th>
						<th>Giá</th>
						<th>Khách hàng</th>
						<th>Sdt</th>
						<th>Địa chỉ</th>
						<th>Tình trạng</th>
						<th id="xuly">Xử lý</th>
					</tr>
				</thead>
				<tbody class="boxPro">
					<?php 
					$ct = new cart();
					$fm = new Format();
					$get_inbox_cart = $ct -> get_inbox_cart();
					if ($get_inbox_cart) {
						$i=0;
						while ($result = $get_inbox_cart->fetch_assoc()) {
							$i++;
							?>
							<tr>
								<td id="thutu"><?= $i ?></td>
								<td><?= $fm->FormatDate($result['ngaydat']);?></td>
								<td><?= $fm->format_currency($result['price'])?></td>
								<td><?= $result['tenKh']?></td>
								<td><?= $result['sdtKh']?></td>
								<td><?= $result['diachiKh']?></td>
								<td>
									<?php
									if($result['tinhtrang']==1){
										?>
										<a href="?tt_donhang=<?php echo $result['orderId'] ?>&type=0" id="btn_xong">Đã xem</a> 
										<?php
									}else{
										?>	
										<a href="?tt_donhang=<?php echo $result['orderId'] ?>&type=1" id="btn_chua">Chưa xử lý</a> 
										<?php
									}
									?>
								</td>
								<td id="xuly" style="width: 50px;"><a href="brandedit.php?brandid=<?php echo $result['brandId']; ?>" title="Sửa"><img src="images/icon/pencil.png" alt="Sửa"></a> <a href="?delid=<?php echo $result['brandId'] ?>" title="Xoá"><img src="images/icon/close.png" alt="Xoá"></a></td>
							</tr>
							<?php 
						}
					}
					?>
				</tbody>
			</table>
		</div>
    </div>
</div>	
<script type="text/javascript">
	$(document).ready(function () {
		setupLeftMenu();
		$('.datatable').dataTable();
		setSidebarHeight();
	});
</script>
<?php include 'inc/footer.php';?>