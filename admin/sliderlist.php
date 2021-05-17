<?php include 'inc/header.php';?>
<?php include '../classes/product.php';?>
<?php 
	$product = new product();
	if(isset($_GET['type_slider']) && isset($_GET['type'])){
		$id = $_GET['type_slider'];
		$type = $_GET['type'];
		$update_type_slider = $product->update_type_slider($id,$type);

	}
	if(isset($_GET['slider_del'])){
		$id = $_GET['slider_del'];
		$del_slider = $product->del_slider($id);

	}
 ?>
		<div class="title-style"><h4><i class="fas fa-home mr-3"></i>Hình ảnh slider</h4></div>
		<div class="boxInsert">
			<?php 
			if (isset($del_slider)) {
				echo $del_slider;
			}
			?>     
			<table class="data display datatable" id="example">
				<thead>
					<tr class="boxTitle">
						<th id="thutu">Thứ tự</th>
						<th>Hình slider</th>
						<th id="hienthi">Hiển thị</th>
						<th id="xuly">Xử lý</th>
					</tr>
				</thead>
				<tbody  class="boxPro">
					<?php
					$product = new product();
					$get_slider = $product->show_slider_list();
					if($get_slider){
						$i = 0;
						while($result_slider = $get_slider->fetch_assoc()){
							$i++;
						?>
							<tr>
								<td id="thutu"><?php echo $i; ?></td>
								<td><a href="slideredit.php?sliderid=<?php echo $result_slider['sliderId']; ?>" title="Sửa"><img src="uploads/<?php echo $result_slider['image'] ?>" height="110px" width="400px"/></a></td>
								<td>
									<?php
									if($result_slider['type']==1){
										?>
										<a href="?type_slider=<?php echo $result_slider['sliderId'] ?>&type=0" id="btn_on">ON</a> 
										<?php
									}else{
										?>	
										<a href="?type_slider=<?php echo $result_slider['sliderId'] ?>&type=1" id="btn_off">OFF</a> 
										<?php
									}
									?>
								</td>
								<td id="xuly"><a href="slideredit.php?sliderid=<?php echo $result_slider['sliderId']; ?>" title="Sửa"><img src="images/icon/pencil.png" alt="Sửa"></a> <a href="?slider_del=<?php echo $result_slider['sliderId'] ?>" title="Xoá"><img src="images/icon/close.png" alt="Xoá"></a></td>
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
