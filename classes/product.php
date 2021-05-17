<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');
?>
<?php 
class product
{
	private $db;
	private $fm;
	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}
	public function insert_product($data,$files){
		$productName = mysqli_real_escape_string($this->db->link, $data['productName']);
		$category = mysqli_real_escape_string($this->db->link, $data['category']);
		$brand = mysqli_real_escape_string($this->db->link, $data['brand']);
		$giasi = mysqli_real_escape_string($this->db->link, $data['giasi']);
		$giale = mysqli_real_escape_string($this->db->link, $data['giale']);
			 //mysqli gọi 2 biến. (catName and link) biến link -> gọi conect db từ file db
			// kiểm tra hình ảnh và lấy hình ảnh cho vào folder upload
		$permited = array('jpg','jpeg','png','gif');
		$file_name = $_FILES['image']['name'];
		$file_size = $_FILES['image']['size'];
		$file_temp = $_FILES['image']['tmp_name'];
			$div =explode('.', $file_name); //Hàm tách chuỗi qua dấu .
			$file_ext = strtolower(end($div)); //Hàm thay đổi kí tự thành chữ thường.
			$unique_image = substr(md5(time()), 0,10).'.'.$file_ext; 
			$uploaded_image = "uploads/".$unique_image;
			if($productName == "" || $category == "" || $brand == "" || $giasi == "" || $giale == "" || $file_name == ""){
				$alert = "<span class='error'>Vui lòng điền đầy đủ thông tin.</span>";
				return $alert;
			}else{
				move_uploaded_file($file_temp, $uploaded_image);
				$query = "INSERT INTO tbl_product(productName,catId,brandId,image,giasi,giale) VALUES('$productName','$category','$brand','$unique_image','$giasi','$giale') ";
				$result = $this->db->insert($query);
				if($result){
					$alert = "<span class='success'>Thêm sản phẩm thành công</span>";
					return $alert;
				}else {
					$alert = "<span class='error'>Thêm sản phẩm lỗi!</span>";
					return $alert;
				}
			}
		}
		public function insert_slider($date,$files)
		{
			$type = mysqli_real_escape_string($this->db->link, $date['type']);
			// kiểm tra hình ảnh và lấy hình ảnh cho vào folder upload
			$permited  = array('jpg', 'jpeg', 'png', 'gif');
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];
			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			// $file_current = strtolower(current($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "uploads/".$unique_image;
			if($type==""){
				$alert = "<span class='error'>Vui lòng điền đầy đủ thông tin!</span>";
				return $alert; 
			}else{
				if(!empty($file_name)){
					//Nếu người dùng chọn ảnh
					if ($file_size > 2048000) {
						$alert = "<span class='success'>Image upload không quá 2MB.</span>";
						return $alert;
					} 
					elseif (in_array($file_ext, $permited) === false) 
					{	
						$alert = "<span class='error'>Bạn chỉ có thể upload dạng: ".implode(', ', $permited)."</span>";
						return $alert;
					}
					move_uploaded_file($file_temp,$uploaded_image);
					$query = "INSERT INTO tbl_slider(type,image) VALUES('$type','$unique_image') ";
					$result = $this->db->insert($query);
					if($result){
						$alert = "<span class='success'>Thêm slide thành công.</span>";
						return $alert;
					}else {
						$alert = "<span class='error'>Lỗi thêm slide!!</span>";
						return $alert;
					}
				}				
			}
		}
		public function show_slider(){
			$query = "SELECT * FROM tbl_slider where type='1' order by sliderId desc";
			$result = $this->db->link->query($query);
			return $result;
		}
		public function show_slider_list(){
			$query = "SELECT * FROM tbl_slider order by sliderId desc";
			$result = $this->db->select($query);
			return $result;
		}
		public function show_product_index()
		{
			$query = 
			"SELECT * FROM tbl_product order by productId desc ";
			// $query = "SELECT * FROM tbl_product order by productId desc ";
			$result = $this->db->select($query);
			return $result;
		}
		public function show_product()
		{
			$query = 
			"SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName
			FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId
			INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId
			order by tbl_product.productId desc";
			// $query = "SELECT * FROM tbl_product order by productId desc ";
			$result = $this->db->select($query);
			return $result;
		}
		public function update_type_slider($id,$type){
			$type = mysqli_real_escape_string($this->db->link, $type);
			$query = "UPDATE tbl_slider SET type = '$type' where sliderId='$id'";
			$result = $this->db->update($query);
			return $result;
		}
		public function update_type_product($id,$type){
			$type = mysqli_real_escape_string($this->db->link, $type);
			$query = "UPDATE tbl_product SET type = '$type' where productId='$id'";
			$result = $this->db->update($query);
			return $result;
		}
		public function update_show_product($id,$show){
			$show = mysqli_real_escape_string($this->db->link, $show);
			$query = "UPDATE tbl_product SET hienthi = '$show' where productId='$id'";
			$result = $this->db->update($query);
			return $result;
		}
		public function del_slider($id)
		{
			$query = "DELETE FROM tbl_slider where sliderId = '$id' ";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'>Xoá slide thành công.</span>";
				return $alert;
			}else {
				$alert = "<span class='error'> Lỗi xoá slide!</span>";
				return $alert;
			}
		}
		public function del_product($id)
		{
			$query = "DELETE FROM tbl_product where productId = '$id' ";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'>Sản phẩm đã được xóa</span>";
				return $alert;
			}else {
				$alert = "<span class='success'>Lỗi xoá sản phẩm</span>";
				return $alert;
			}
		}
		public function getproductbyId($id)
		{
			$query = "SELECT * FROM tbl_product where productId = '$id' ";
			$result = $this->db->select($query);
			return $result;
		}		
		//Kết thúc Backend
		public function getproductbycatid($catId)
		{
			$query = "SELECT * FROM tbl_product where catId = '$catId' LIMIT 30";
			$result = $this->db->select($query);
			return $result;
		}	
		public function getproduct_feathered() //show sản phẩm nổi bật
		{
			$query = "SELECT * FROM tbl_product where type = '1' and hienthi = '1' order by productId desc LIMIT 10 ";
			$result = $this->db->select($query);
			return $result;
		}
		public function get_details($id)
		{
			$query = 
			"SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName
			FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId
			INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId
			WHERE tbl_product.productId = '$id'";
			$result = $this->db->select($query);
			return $result;
		}
	}
	?>