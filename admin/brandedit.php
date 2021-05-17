<?php include 'inc/header.php';?>
<?php include '../classes/brand.php';  ?>
<?php
    $cat = new brand(); 
    if(!isset($_GET['brandid']) || $_GET['brandid'] == NULL){
        echo "<script> window.location = 'brandlist.php' </script>";
    }else {
        $id = $_GET['brandid']; // Lấy brandid trên host
    }
    // gọi class brand
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $brandName = $_POST['brandName'];
        $updateBrand = $cat -> update_brand($brandName,$id); // hàm check brandName khi submit lên
    }
  ?>
        <div class="title-style"><h4><i class="fas fa-home mr-3"></i>Sửa Thương Hiệu</h4></div>
        <div class="boxInsert">
            <?php 
                if(isset($updateBrand)){
                    echo $updateBrand;
                }
            ?>
            <?php 
                $get_brand_name = $cat->getbrandbyId($id);
                if($get_brand_name){
                    while ($result = $get_brand_name->fetch_assoc()) {
            ?>
            <form action="brandedit.php" method="post">
                <table class="form">                    
                    <tr>
                        <td style="width:150px"><label>Tên thương hiệu:</label></td>
                        <td>
                            <input type="text" value="<?php echo $result['brandName']; ?>" name="brandName" placeholder="Sửa thương hiệu sản phẩm..." class="medium" />
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
                    <?php 
                }
            }
             ?>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>