<?php include 'inc/header.php';?>
<?php include '../classes/post.php'; ?>
<?php 
	$post = new post();
	$fm = new Format();
	if(!isset($_GET['postId']) || $_GET['postId'] == NULL){
	}else {
	        $id = $_GET['postId']; // Lấy postId trên host
	        $delPost = $post -> del_post($id); // hàm check delete Name khi submit lên
	    }
?>
		<div class="title-style"><h4><i class="fas fa-home mr-3"></i>Danh sách bài viết</h4></div>
		<div class="boxInsert">
			<?php 
			if(isset($delPost)){
				echo $delPost;
			}
			?>      
			<table class="data display datatable" id="example">
				<thead>
					<tr class="boxTitle">
						<th id="thutu">Thứ tự</th>
						<th>Hình ảnh</th>
						<th>Tên bài viết</th>
						<th id="xuly">Xử lý</th>
					</tr>
				</thead>
				<tbody  class="boxPro">
					<?php 
					$postlist = $post->show_post();
					$i = 0;
					if($postlist){
						while ($result = $postlist->fetch_assoc()){
							$i++;	
							?>
							<tr>
								<td id="thutu"><?php echo $i; ?></td>
								<td><img src="uploads/<?php echo $result['image'] ?>" width="80"></td>
								<td id="tensp"><a href="postedit.php?postid=<?php echo $result['postId']; ?>" title="<?= $result['postName']; ?>"><?php echo $result['postName']; ?></a></td>
								<td id="xuly"><a href="postedit.php?postid=<?php echo $result['postId']; ?>" title="Sửa"><img src="images/icon/pencil.png" alt="Sửa"></a> <a href="?delid=<?php echo $result['postId'] ?>" title="Xoá"><img src="images/icon/close.png" alt="Xoá"></a></td>
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