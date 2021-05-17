<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>

<?php 
	class admin
	{
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		// Thêm danh mục
		
		// public function update_password($pass,$newpass){
		// 	$pass = mysqli_real_escape_string($this->db->link, $pass);
		// 	$newpass = mysqli_real_escape_string($this->db->link, $newpass);
		// 	$query = "UPDATE tbl_admin SET adminPass = '$newpass' where adminUser='hai' and adminPass='$pass'";
		// 	$result = $this->db->update($query);
		// 	return $result;
		// }
	}
 ?>