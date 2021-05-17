<?php 
    include 'inc/header.php';
?>
    <div class="show_sanpham">
        <div class="container">
            <div class="title_style text-center mt-5 mb-4">
                <h3 id="title">TIN TỨC VÀ SỰ KIỆN</h3>
            </div>
            <div class="showsanpham">
                <div class="row">
                    <?php
                        $showpost = $post ->show_post();
                        foreach($showpost as $value){
                    ?>                
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
                        <div class="khungsanpham mr-2 ml-2 mt-2">
                            <div class="img">
                                <a href="post_details.php?postid=<?= $value['postId']?>"><img src="admin/uploads/<?php echo $value['image']?>"></a>
                            </div>
                            <div class="details">
                                <a href="post_details.php?postid=<?= $result_post['postId']?>">
                                    <p class="mb-1"><?= $value['postName']?></p>
                                </a>
                                <p><?php 
                                    $description = $value['description'];
                                    echo $fm->catchuoi("$description",80)?></p>
                            </div>
                        </div>
                    </div>
                    <?php
                            }
                        
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php 
    include 'inc/footer.php';
?>