<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>
<?php 
	class category
	{
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		// Thêm danh mục
		public function insert_category($catName){
			$catName = $this->fm->validation($catName); //gọi ham validation từ file Format để ktra
			$catName = mysqli_real_escape_string($this->db->link, $catName);
			 //mysqli gọi 2 biến. (catName and link) biến link -> gọi conect db từ file db
			if(empty($catName)){
				$alert = "<span class='error'>Vui lòng nhập dữ liệu vào này.</span>";
				return $alert;
			}else{
				$query = "INSERT INTO tbl_category(catName) VALUES('$catName') ";
				$result = $this->db->insert($query);
				if($result){
					$alert = "<span class='success'>Thêm danh mục thành công.</span>";
					return $alert;
				}else {
					$alert = "<span class='error'>Doanh mục này đã có!</span>";
					return $alert;
				}
			}
		}
		// Hiển thị danh mục
		public function show_category()
		{
			$query = "SELECT * FROM tbl_category order by catId desc ";
			$result = $this->db->select($query);
			return $result;
		}
		// Cập nhật danh mục
		public function update_category($catName,$id)
		{
			$catName = $this->fm->validation($catName); //gọi ham validation từ file Format để ktra
			$catName = mysqli_real_escape_string($this->db->link, $catName);
			$id = mysqli_real_escape_string($this->db->link, $id);
			if(empty($catName)){
				$alert = "<span class='error'>Mục này không được để trống.</span>";
				return $alert;
			}else{
				$query = "UPDATE tbl_category SET catName= '$catName' WHERE catId = '$id' ";
				$result = $this->db->update($query);
				if($result){
					$alert = "<span class='success'>Danh mục cập nhật thành công.</span>";
					return $alert;
				}else {
					$alert = "<span class='error'>Lỗi cập nhật!</span>";
					return $alert;
				}
			}
		}
		// Xoá danh mục
		public function del_category($id)
		{
			$query = "DELETE FROM tbl_category where catId = '$id' ";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'>Xoá danh mục thành công.</span>";
				return $alert;
			}else {
				$alert = "<span class='error'>Lỗi!</span>";
				return $alert;
			}
		}
		public function getcatbyId($id)
		{
			$query = "SELECT * FROM tbl_category where catId = '$id' ";
			$result = $this->db->select($query);
			return $result;
		}
		public function get_product_by_cat($catName)
		{
			$query = "SELECT * FROM tbl_category where catName = '$catName' order by catName desc";
			$result = $this->db->select($query);
			return $result;
		}
	}
 ?>