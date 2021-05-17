<?php include '../../Model/product.php';  ?>
<?php require_once '../../Library/function.php'; ?>
<?php 
	$product = new Product();
	$func = new Functions();
	if(isset($_GET['productId']) && isset($_GET['type'])){
		$id = $_GET['productId'];
		$type = $_GET['type'];
		$update_type_product = $pd->update_type_product($id,$type);

	}
	if(isset($_GET['productId']) && isset($_GET['hienthi'])){
		$id = $_GET['productId'];
		$show = $_GET['hienthi'];
		$update_show_product = $pd->update_show_product($id,$show);

	}
	if(!isset($_GET['delid']) || $_GET['delid'] == NULL){
        
    }else {
        $id = $_GET['delid']; // Lấy catid trên host
        $delProduct = $pd -> del_product($id); // hàm check delete Name khi submit lên
    }
?>
		<div class="title-style"><h4><i class="fas fa-home mr-3"></i>Danh mục sản phẩm</h4></div>
		<div class="boxInsert">
			<?php 
			if(isset($delCat)){
				echo $delCat;
			}
			?>      
			<table class="data display datatable" id="example">
				<thead>
					<tr class="boxTitle_pd">
						<th id="thutu">Thứ tự</th>
						<th>Danh mục</th>
						<th>Thương hiệu</th>
						<th>Image</th>
						<th>Tên sản phẩm</th>
						<th>Giá Sỉ</th>
						<th>Giá Lẻ</th>
						<th id="noibat">Nổi bật</th>
						<th id="noibat">Hiển thị</th>
						<th id="xuly">Xử lý</th>
					</tr>
				</thead>
				<tbody  class="boxPro">
					<?php 
					$pdlist = $pd->show_product();
					$i = 0;
					if($pdlist){
						while ($result = $pdlist->fetch_assoc()){
							$i++;	
							?>
							<tr>
								<td id="thutu"><?= $i; ?></td>
								<td id="tensp"><?= $result['catName'] ?></td>
								<td id="tensp"><?= $result['brandName'] ?></td>
								<td><img src="uploads/<?= $result['image'] ?>" width="80"></td>
								<td id="tensp"><a href="productedit.php?productid=<?php echo $result['productId']; ?>" title="<?= $result['productName']; ?>"><?php echo $result['productName']; ?></a></td>
								<td><?= $fm->format_currency($result['giasi']) ?></td>
								<td><?= $fm->format_currency($result['giale']) ?></td>
								<td>
									<?php
									if($result['type']==1){
										?>
										<a href="?productId=<?php echo $result['productId'] ?>&type=0" id="btn_on">ON</a> 
										<?php
									}else{
										?>	
										<a href="?productId=<?php echo $result['productId'] ?>&type=1" id="btn_off">OFF</a> 
										<?php
									}
									?>
								</td>
								<td>
									<?php
									if($result['hienthi']==1){
										?>
										<a href="?productId=<?php echo $result['productId'] ?>&hienthi=0" id="btn_on">ON</a> 
										<?php
									}else{
										?>	
										<a href="?productId=<?php echo $result['productId'] ?>&hienthi=1" id="btn_off">OFF</a> 
										<?php
									}
									?>
								</td>
								<td id="xuly"><a href="productedit.php?productid=<?php echo $result['productId']; ?>" title="Sửa"><img src="images/icon/pencil.png" alt="Sửa"></a> <a href="?delid=<?php echo $result['productId'] ?>" title="Xoá"><img src="images/icon/close.png" alt="Xoá"></a></td>
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