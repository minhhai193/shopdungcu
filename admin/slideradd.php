<?php include 'inc/header.php';?>
<?php include '../classes/product.php';  ?>
<?php
    // gọi class category
    $product = new product(); 
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $insertSlider = $product -> insert_slider($_POST, $_FILES); 
    }
  ?>
        <div class="title-style"><h4><i class="fas fa-home mr-3"></i>Thêm ảnh slider</h4></div>
        <div class="boxInsert">
            <?php 
                if(isset($insertSlider)){
                    echo $insertSlider;
                }
            ?>
            <form action="slideradd.php" method="post" enctype="multipart/form-data">
                <table class="form">                    
                    <tr>
                        <td style="width:150px"><label>Tải ảnh lên:</label></td>
                       <td>
                            <input type="file" name="image"/>
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