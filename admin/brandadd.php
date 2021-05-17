<?php include 'View/Layout/header.php';?>
<?php include '../../classes/brand.php';  ?>
<?php
    // gọi class brand
    $brand = new brand(); 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $brandName = $_POST['brandName'];
        $insertBrand = $brand -> insert_brand($brandName); // hàm check brandName khi submit lên
    }
  ?>
        <div class="title-style"><h4><i class="fas fa-home mr-3"></i>Thêm thương hiệu</h4></div>
        <div class="boxInsert">
            <?php 
                if(isset($insertBrand)){
                    echo $insertBrand;
                }
            ?>
            <form action="brandadd.php" method="post">
                <table class="form">                    
                    <tr>
                        <td style="width:150px"><label>Tên thương hiệu:</label></td>
                        <td>
                            <input type="text" name="brandName" class="medium" />
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
<?php include 'View/Layout/footer.php';?>