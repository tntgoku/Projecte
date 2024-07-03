<?php 
include '../../App/connect.php';
$data=new Database();
$data->connect();
if(isset($_REQUEST["name"]) && $_REQUEST["name"])
	  {
		  $id = $_REQUEST["id_product"];
		  $name = $_REQUEST["name"];
		  $id_type = $_REQUEST["type_id"];
		  $color = $_REQUEST["color"];
		  $size  = $_REQUEST["size"];
		  $cost = $_REQUEST["cost"];
		  $amount = $_REQUEST["amount"];
		  $discount = $_REQUEST["discount"];
		  $img = isset($_FILES["img"]["name"]) ? $_FILES['img']['name'] : "";
		  if ($img!="")
		  {
			  $uploadDir_logo = "../../img/item/"; //đg dẫn ảnh
			  $file_tmp = isset($_FILES['img']['tmp_name']) ? $_FILES['img']['tmp_name'] : ""; //xử lí ảnh
			  $file_name = isset($_FILES['img']['name']) ? $_FILES['img']['name'] : "";
			  copy ( $file_tmp, $uploadDir_logo.$file_name);
			  $sql = "UPDATE `product` SET `Name` = '$name', `Type_id` = '$id_type', `Color` = '$color', `Size` = '$size', `Cost` = '$cost', `Amount` = '$amount', `Discount` = '$discount', `img` = '$file_name' WHERE `product`.`id_product` = $id;";
			  $data->query($sql);
		  }
		  else 
		  {
			  $sql = "UPDATE `product` SET `Name` = '$name', `Type_id` = '$id_type', `Color` = '$color', `Size` = '$size', 
			  `Cost` = '$cost', `Amount` = '$amount', `Discount` = '$discount' WHERE `product`.`id_product` = $id;";
		  }
		  $data->query($sql);
		  echo '<script>
		    alert("Thay đổi thành công sản phẩm '.$name.'");
		  window.location.href="product.php";</script>';
	  }
	
?>