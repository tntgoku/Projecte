<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Danh mục sản phẩm</title>
</head>

<body>
	<form action="" name="frm_danh_muc_sp">
		<table width="486" border="1" align="center" >
  <tbody style="text-align: center">
    <tr>
      <td colspan="3" align="center">Danh mục sản phẩm</td>
    </tr>
    <tr>
      <td width="58">ID</td>
      <td width="274">Tên</td>
	  <td width="132">Chức năng</td>
    </tr>
	  <?php
	  // Setting
	  $conn = mysqli_connect("localhost","root","") or die("Erro!");
	  mysqli_select_db($conn,"project_web_ban_hang") or die("Erro!!");
	  // Them sp
	  if(isset($_POST["name_sp"]) && $_POST["name_sp"])
		{
			$name = $_POST["name_sp"];
			$sql = "INSERT INTO `product_list` (`Type_id`, `Type_name`) VALUES (NULL, '$name');";
			mysqli_query($conn,$sql);
		}
	  // Sua sp
	  if (isset($_POST["name_sp_sua"]) && $_POST["name_sp_sua"] )
	  {
		  $id = $_REQUEST["id"];
		  $name = $_REQUEST["name_sp_sua"];
		  $sql = "UPDATE `product_list` SET `Type_name` = '$name' WHERE `product_list`.`Type_id` = $id;";
		  mysqli_query($conn,$sql);
	  }
	  // Xoa sp
	  if(isset($_REQUEST["id_xoa"]) && $_REQUEST["id_xoa"])
	  {
		  $id = $_REQUEST["id_xoa"];
		  $sql = "DELETE FROM `product_list` WHERE `Type_id` = $id;";
		  mysqli_query($conn,$sql);
	  }
	  // Hien thi danh sach
	  $sql = "SELECT * FROM `product_list`";
	  $db = mysqli_query($conn,$sql);
	  while($row = mysqli_fetch_assoc($db))
	  {
	  ?>
		<tr>
      		<td><?php echo $row["Type_id"]?></td>
      		<td><?php echo $row["Type_name"]?></td>
			<td> <a href="sua_Danh_Muc_sp.php?id=<?php echo $row["Type_id"];?>" style="text-decoration: none">Sửa</a>   
				<a href="Danh_Muc_sp.php?id_xoa=<?php echo $row["Type_id"];?>" style="text-decoration: none">Xóa</a> 
			</td>
    	</tr>
	  <?php
	  }
	  ?>
  </tbody>
</table>
	</form>
	<form action="Danh_Muc_sp.php" method = "post">
	<table width="486" border="1" align="center">
  <tbody>
    <tr>
      <td width="183" align="center">Thêm danh mục sản phẩm</td>
	  <td width="271"> 
		  <input width="222" type="text" name="name_sp">  
		  <input type="submit" value ="Thêm" align="right">
	  </td>
    </tr>
  </tbody>
</table>
	</form>
</body>
</html>