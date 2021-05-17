<?php include 'inc/header.php';?>
<?php include '../classes/category.php';  ?>
<?php include '../classes/brand.php';  ?> 
<?php include '../classes/product.php';  ?>
<?php
    // gọi class category
    $pd = new product(); 
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $insertProduct = $pd -> insert_product($_POST, $_FILES); // hàm check khi submit lên
    }
  ?>
        <div class="title-style"><h4><i class="fas fa-home mr-3"></i>Thêm sản phẩm</h4></div>
        <div class="boxInsert">
            <?php 
                if(isset($insertProduct)){
                    echo $insertProduct;
                }
             ?> 
             <form action="productadd.php" method="post" enctype="multipart/form-data">
                <table class="form">                    
                    <tr>
                        <td style="width: 150px;"><label>Tên sản phẩm:</label></td>
                        <td >
                            <input name="productName" type="text" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td><label>Danh mục sản phẩm</label></td>
                        <td >
                            <select id="select" name="category">
                                <option>Chọn danh mục</option>
                                <?php 
                                $cat = new category();
                                $catlist = $cat->show_category();
                                if($catlist){
                                    while ($result = $catlist->fetch_assoc()){
                                        ?>
                                        <option value=" <?php echo $result['catId'] ?> "> <?php echo $result['catName'] ?> </option>
                                        <?php 
                                    }
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Thương hiệu</label></td>
                        <td >
                            <select id="select" name="brand">
                                <option>Chọn thương hiệu</option>
                                <?php 
                                $brand = new brand();
                                $brandlist = $brand->show_brand();
                                if($brandlist){
                                    while ($result = $brandlist->fetch_assoc()){
                                        ?>
                                        <option value=" <?php echo $result['brandId'] ?> "> <?php echo $result['brandName'] ?> </option>
                                        <?php 
                                    }
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Giá sỉ</label></td>
                        <td >
                            <input name="giasi" type="text" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td><label>Giá lẻ</label></td>
                        <td >
                            <input name="giale" type="text" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td><label>Tải ảnh</label></td>
                        <td >
                            <input name="image" type="file" />
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