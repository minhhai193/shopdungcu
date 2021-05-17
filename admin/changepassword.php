<?php include 'inc/header.php';?>
<?php include '../classes/admin.php';  ?>
<?php 
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../classes/cart.php');
include_once ($filepath.'/../helpers/format.php');
?>
<?php 
    $cart= new cart();
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $newpass=$_POST['newpass'];
        $changepassword = $cart -> update_password($newpass,1); // hàm check khi submit lên
    }
 ?>
        <div class="title-style"><h4><i class="fas fa-home mr-3"></i>Thay đổi mật khẩu</h4></div>
        <div class="boxInsert">
            <form action="changepassword.php" method="post">
                <table class="form">                    
                    <tr>
                        <td style="width: 150px;">
                            <label>Mật khẩu mới</label>
                        </td>
                        <td>
                            <input type="password" placeholder="Nhập mật khẩu mới..." name="newpass" class="medium" />
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