<?php include 'inc/header.php';?>
<?php include '../classes/post.php';  ?>
<?php
    // gọi class
    $post = new post(); 
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $insertPost = $post -> insert_post($_POST, $_FILES); // hàm check khi submit lên
    }
?>
        <div class="title-style"><h4><i class="fas fa-home mr-3"></i>Thêm bài viết</h4></div>
            <div class="boxInsert">
            <?php 
                if(isset($insertPost)){
                    echo $insertPost;
                }
             ?>   
            <form action="postadd.php" method="post">
                <table class="form">                    
                    <tr>
                        <td style="width:150px"><label>Tiêu đề bài viết:</label></td>
                        <td>
                            <input name="postName" type="text" placeholder="Nhập tiêu đề..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td >
                            <label>Mô tả</label>
                        </td>
                        <td >
                            <input name="description" type="text" placeholder="Nhập mô tả..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td >
                            <label>Tải ảnh</label>
                        </td>
                        <td >
                            <input name="image" type="file" />
                        </td>
                    </tr>
                    <tr>
                        <td id="td_end">
                            <label>Nội dung</label>
                        </td>
                         <td id="td_end">
                            <textarea name="editor1" id="editor1">Nội dung bài viết.</textarea>
                        </td>
                    </tr>
                    <tr> 
                        <td id="td_end"></td>
                        <td id="td_end">
                            <input type="submit" name="submit" Value="Save" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>
