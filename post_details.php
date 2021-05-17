<?php 
	include 'inc/header.php';
?>
<?php 
	if(!isset($_GET['postid']) || $_GET['postid'] == NULL){
        echo "<script> window.location = '404.php' </script>";
    }else {
        $id = $_GET['postid']; // Lấy postid trên host
    }
 ?>
   <div class="chitietpost mt-5">
        <div class="container">
            <div class="row">
                <?php
                    $get_post_details = $post->get_details($id);
                    if($get_post_details){
                        while($resultdetails=$get_post_details->fetch_assoc()){
                ?>
                <div class="title_style text-center mb-3"><h3><?= $resultdetails["postName"] ?></h3></div>
                <?= $resultdetails['description']?>
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