<?php
/**
* Format Class
*/
class Format{
   public function formatDate($date){
      return date('d/m/yy', strtotime($date));
   }

   public function validation($data){
      $data = trim($data);
      $data = stripcslashes($data);
      $data = htmlspecialchars($data);
      return $data;
   }

   public function title(){
      $path = $_SERVER['SCRIPT_FILENAME'];
      $title = basename($path, '.php');
      //$title = str_replace('_', ' ', $title);
      if ($title == 'index') {
      $title = 'home';
      }elseif ($title == 'contact') {
      $title = 'contact';
      }
      return $title = ucfirst($title);
   }

   public function format_currency($n=0){
      $n=(string)$n;
      $n=strrev($n);
      $res='';
      for($i=0;$i<strlen($n);$i++){
            if($i%3==0 && $i!=0){
               $res.='.';
            
            }
            $res.=$n[$i];
      }
      $res=strrev($res);
      return $res;
   }

   public function catchuoi($chuoi,$gioihan){
      // nếu độ dài chuỗi nhỏ hơn hay bằng vị trí cắt
      // thì không thay đổi chuỗi ban đầu
      if(strlen($chuoi)<=$gioihan)
      {
         return $chuoi;
      }
      else{
      /*
      so sánh vị trí cắt
      với kí tự khoảng trắng đầu tiên trong chuỗi ban đầu tính từ vị trí cắt
      nếu vị trí khoảng trắng lớn hơn
      thì cắt chuỗi tại vị trí khoảng trắng đó
      */
      if(strpos($chuoi," ",$gioihan) > $gioihan){
         $new_gioihan=strpos($chuoi," ",$gioihan);
         $new_chuoi = substr($chuoi,0,$new_gioihan)."...";
         return $new_chuoi;
      }
      // trường hợp còn lại không ảnh hưởng tới kết quả
      $new_chuoi = substr($chuoi,0,$gioihan)."...";
      return $new_chuoi;
      }
   }
}
?>
 
