<?php include 'inc/header.php';?>
<?php include '../classes/brand.php';  ?>
<?php
    // gọi class category
    $brand = new brand();     
    if(!isset($_GET['delid']) || $_GET['delid'] == NULL){
        // echo "<script> window.location = 'catlist.php' </script>";
        
    }else {
        $id = $_GET['delid']; // Lấy catid trên host
        $delbrand = $brand -> del_brand($id); // hàm check delete Name khi submit lên
    }
 ?> 
		<div class="title-style"><h4><i class="fas fa-home mr-3"></i>Danh sách thương hiệu</h4></div>
		<div class="boxInsert">
			<?php 
			if(isset($delbrand)){
				echo $delbrand;
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
				<tbody class="boxPro">
					<?php 
					$show_brand = $brand -> show_brand();
					if($show_brand){
						$i = 0;
						while($result = $show_brand -> fetch_assoc()){
							$i++;
							?>
							<tr>
								<td id="thutu"><?= $i ?></td>
								<td id="tensp"><a href="brandedit.php?brandid=<?php echo $result['brandId']; ?>" title="<?= $result['brandName']; ?>"><?php echo $result['brandName']; ?></a></td>
								<td id="xuly"><a href="brandedit.php?brandid=<?php echo $result['brandId']; ?>" title="Sửa"><img src="images/icon/pencil.png" alt="Sửa"></a> <a href="?delid=<?php echo $result['brandId'] ?>" title="Xoá"><img src="images/icon/close.png" alt="Xoá"></a></td>
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
