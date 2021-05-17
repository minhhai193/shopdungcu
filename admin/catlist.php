<?php include 'inc/header.php';?>
<?php include '../classes/category.php';  ?>
<?php
// gọi class category
$cat = new category();     
if(!isset($_GET['delid']) || $_GET['delid'] == NULL){
}else {
$id = $_GET['delid']; // Lấy catid trên host
$delCat = $cat -> del_category($id); // hàm check delete Name khi submit lên
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
					<tr class="boxTitle">
						<th id="thutu">Thứ tự</th>
						<th>Tên thương hiệu</th>
						<th id="xuly">Xử lý</th>
					</tr>
				</thead>
				<tbody  class="boxPro">
					<?php 
					$show_cat = $cat -> show_category();
					if($show_cat){
						$i = 0;
						while($result = $show_cat -> fetch_assoc()){
							$i++;
							?>
							<tr>
								<td id="thutu"><?php echo $i; ?></td>
								<td id="tensp"><a href="catedit.php?catid=<?php echo $result['catId']; ?>" title="<?= $result['catName']; ?>"><?php echo $result['catName']; ?></a></td>
								<td id="xuly"><a href="catedit.php?catid=<?php echo $result['catId']; ?>" title="Sửa"><img src="images/icon/pencil.png" alt="Sửa"></a> <a href="?delid=<?php echo $result['catId'] ?>" title="Xoá"><img src="images/icon/close.png" alt="Xoá"></a></td>
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