<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');
?>
<?php 
class cart
{
	private $db;
	private $fm;
	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}
	public function add_to_cart($id, $quantity)
	{
		$quantity = $this->fm->validation($quantity);
		$quantity = mysqli_real_escape_string($this->db->link, $quantity);
		$id = mysqli_real_escape_string($this->db->link, $id);
		$sId = session_id();
		$query = "SELECT * FROM tbl_product WHERE productId = '$id' ";
		$result = $this->db->select($query)->fetch_assoc();
		if(isset($_SESSION['cart'])){
            if(isset($_SESSION['cart'][$id])){  
            	$_SESSION['cart'][$id]['quantity']+=$quantity; 
            }else{ 
            	$_SESSION['cart'][$id]['quantity']=$quantity;
            	$_SESSION['cart'][$id]['productname']=$result['productName'];
            	$_SESSION['cart'][$id]['price']=$result['giale'];
            	$_SESSION['cart'][$id]['image']=$result['image'];
            }
        }else{
            $_SESSION['cart'][$id]['quantity']=$quantity;
            $_SESSION['cart'][$id]['productname']=$result['productName'];
        	$_SESSION['cart'][$id]['price']=$result['giale'];
        	$_SESSION['cart'][$id]['image']=$result['image'];

        }
	}
	public function thanhtoan($productName)
	{
		$query_tt = "INSERT INTO tbl_cart(productName) VALUES('$productName') ";
		$insert_cart = $this->db->link->query($query_tt);
	}
	public function add_to_cart1($id, $quantity)
	{
		$quantity = $this->fm->validation($quantity);
		$quantity = mysqli_real_escape_string($this->db->link, $quantity);
		$id = mysqli_real_escape_string($this->db->link, $id);
		$sId = session_id();
		$query = "SELECT * FROM tbl_product WHERE productId = '$id' ";
		$result = $this->db->select($query)->fetch_assoc();
		$productName = $result['productName'];
		$price = $result['giale'];
		$image = $result['image'];
		$query_insert = "INSERT INTO tbl_cart(productId,sId,productName,giale,quantity,image) VALUES('$id','$sId','$productName','$price','$quantity','$image') ";
		$insert_cart = $this->db->insert($query_insert);
		$check_cart="SELECT * FROM tbl_cart WHERE productId = '$id' AND sId= '$sId'";
		if($check_cart){
			$msg="Sản phẩm đã được thêm vào giỏ hàng.";
			return $msg;
		}else{
			$msg="Sản phẩm không được thêm vào giỏ hàng.";
			return $msg;
		}
	}
	public function get_product_cart()
	{
		$sId = session_id();
		$query = "SELECT * FROM tbl_cart WHERE sId = '$sId' ";
		$result = $this->db->select($query);
		return $result;
	}
	public function update_Cart($cartId, $quantity)
	{
		$quantity = mysqli_real_escape_string($this->db->link, $quantity);
		$id = mysqli_real_escape_string($this->db->link, $id);
		$query = "UPDATE tbl_cart SET quantity = '$quantity' WHERE productId = '$id'";
		$result = $this->db->update($query);
	}
	public function update_quantity_Cart($cartId, $quantity)
	{
		$quantity = mysqli_real_escape_string($this->db->link, $quantity);
		$cartId = mysqli_real_escape_string($this->db->link, $cartId);
		$query = "UPDATE tbl_cart SET quantity = '$quantity' WHERE cartId = '$cartId'";
		$result = $this->db->update($query);
		if($result) {
			$msg = "<span class='success'> Số lượng cập nhật thành công.</span> ";
			return $msg; 
		}else {
			$msg = "<span class='errrr'> Lỗi cập nhật.</span> ";
			return $msg;
		}
	}
	public function del_product_cart($cartid){
		$cartid = mysqli_real_escape_string($this->db->link, $cartid);
		$query = "DELETE FROM tbl_cart WHERE cartId = '$cartid'";
		$result = $this->db->delete($query);
		if($result){
			header('Location:giohang.php');
		}else{
			$msg = "<span class='error'>Sản phẩm đã được xóa</span>";
			return $msg;
		}
	}
	public function check_cart()
	{
		$sId = session_id();
		$query = "SELECT * FROM tbl_cart WHERE sId = '$sId' ";
		$result = $this->db->select($query);
		return $result;
	}
	public function insertOrder($hotenKh,$sdtKh,$emailKh,$diachiKh)
	{
		$sId = session_id();
		$query = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
		$get_product = $this->db->select($query);
		if($get_product){
			if(empty($hotenKh) || empty($sdtKh) || empty($emailKh) || empty($diachiKh) ){
				$alert = "Vui lòng điền đầy đủ thông tin!!";
				return $alert;
			}else{
				while($result = $get_product->fetch_assoc()){
					$productid = $result['productId'];
					$productName = $result['productName'];
					$quantity = $result['quantity'];
					$price = $result['giale'] * $quantity;
					$image = $result['image'];
					$ten = $hotenKh;
					$sdt = $sdtKh;
					$email = $emailKh;
					$diachi = $diachiKh;
					$query_order = "INSERT INTO tbl_order(productId,productName,tenKh,sdtKh,emailKh,diachiKh,quantity,price,image,ngaydat) VALUES('$productid','$productName','$ten','$sdt','$email','$diachi','$quantity','$price','$image',now())";
					$insert_order = $this->db->insert($query_order);
				}
				$alert = "Đặt hàng thành công !";
				return $alert;$ngaydat;
			}
		}
	}
	public function get_inbox_cart()
	{
		$query = "SELECT * FROM tbl_order";
		$get_inbox_cart = $this->db->select($query);
		return $get_inbox_cart;
	}
	public function update_tinhtrang($id,$type){
		$type = mysqli_real_escape_string($this->db->link, $type);
		$query = "UPDATE tbl_order SET tinhtrang = '$type' where orderId='$id'";
		$result = $this->db->update($query);
		return $result;
	}
	public function update_password($newpass,$id){
		$newpass = mysqli_real_escape_string($this->db->link, $newpass);
		$query = "UPDATE tbl_admin SET adminPass = '$newpass' where adminId='$id'";
		$result = $this->db->update($query);
		return $result;
	}
}
?>