<?php include 'inc/header.php';?>
<?php include '../classes/category.php';  ?>
<?php
    // gọi class category
    $cat = new category(); 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $catName = $_POST['catName'];
        $insertCat = $cat -> insert_category($catName); // hàm check catName khi submit lên
    }
  ?>
        <div class="title-style"><h4><i class="fas fa-home mr-3"></i>Thêm danh mục</h4></div>
        <div class="boxInsert">
            <?php 
                if(isset($insertCat)){
                    echo $insertCat;
                }
            ?>
            <form action="catadd.php" method="post">
                <table class="form">                    
                    <tr>
                        <td style="width:150px"><label>Tên danh mục:</label></td>
                        <td>
                            <input type="text" name="catName" class="medium" />
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