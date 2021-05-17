<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>
<?php 
	class brand
	{
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		// Thêm danh mục
		public function insert_brand($brandName){
			$brandName = $this->fm->validation($brandName); //gọi ham validation từ file Format để ktra
			$brandName = mysqli_real_escape_string($this->db->link, $brandName);
			 //mysqli gọi 2 biến. (brand$brandName and link) biến link -> gọi conect db từ file db
			if(empty($brandName)){
				$alert = "<span class='error'>Vui lòng nhập dữ liệu vào này.</span>";
				return $alert;
			}else{
				$query = "INSERT INTO tbl_brand(brandName) VALUES('$brandName') ";
				$result = $this->db->insert($query);
				if($result){
					$alert = "<span class='success'>Thêm thương hiệu thành công.</span>";
					return $alert;
				}else {
					$alert = "<span class='error'>Thương hiệu này đã có!</span>";
					return $alert;
				}
			}
		}
		// Hiển thị danh mục
		public function show_brand()
		{
			$query = "SELECT * FROM tbl_brand order by brandId desc ";
			$result = $this->db->select($query);
			return $result;
		}
		// Cập nhật danh mục
		public function update_brand($brandName,$id)
		{
			$brandName = $this->fm->validation($brandName); //gọi ham validation từ file Format để ktra
			$brandName = mysqli_real_escape_string($this->db->link, $brandName);
			$id = mysqli_real_escape_string($this->db->link, $id);
			if(empty($brandName)){
				$alert = "<span class='error'>Mục này không được để trống.</span>";
				return $alert;
			}else{
				$query = "UPDATE tbl_brand SET brandName= '$brandName' WHERE brandId = '$id' ";
				$result = $this->db->update($query);
				if($result){
					$alert = "<span class='success'>Thương hiệu cập nhật thành công.</span>";
					return $alert;
				}else {
					$alert = "<span class='error'>Lỗi cập nhật!</span>";
					return $alert;
				}
			}
		}
		// Xoá danh mục
		public function del_brand($id)
		{
			$query = "DELETE FROM tbl_brand where brandId = '$id' ";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'>Xoá thương hiệu thành công.</span>";
				return $alert;
			}else {
				$alert = "<span class='error'>Lỗi!</span>";
				return $alert;
			}
		}
		public function getbrandbyId($id)
		{
			$query = "SELECT * FROM tbl_brand where brandId = '$id' ";
			$result = $this->db->select($query);
			return $result;
		}
	}
 ?>