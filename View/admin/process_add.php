<?php
include '../../App/connect.php';
$data=new Database();
$data->connect();
if(isset($_POST['submit'])){
		  $name = $_REQUEST["name"];
		  $id_type = $_REQUEST["type_id"];
		  $color = $_REQUEST["color"];
		  $size  = $_REQUEST["size"];
		  $cost = $_REQUEST["cost"];
		  $amount = $_REQUEST["amount"];
		  $discount = $_REQUEST["discount"];
		  $uploadDir_logo = "../../img/item/"; //đg dẫn ảnh
		  $file_tmp = isset($_FILES['img']['tmp_name']) ? $_FILES['img']['tmp_name'] : ""; //xử lí ảnh
	      $file_name = isset($_FILES['img']['name']) ? $_FILES['img']['name'] : "";
		  copy ( $file_tmp, $uploadDir_logo.$file_name);
		  $sql = "INSERT INTO `product` (`id_product`, `Name`, `Type_id`, `Color`, `Size`, `Cost`, `Amount`, `Discount`, `img`) VALUES 
		  (NULL, '$name', '$id_type', '$color', '$size', '$cost', '$amount', '$discount', '$file_name');";
		  $data->query($sql);
		  echo '<script>
		    alert("Thêm thành công sản phẩm '.$name.'");
		  window.location.href="product.php";</script>';
	}else{
		echo "ddd";
	  }
?>