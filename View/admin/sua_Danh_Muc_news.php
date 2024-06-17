<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sửa danh mục tin tức</title>
</head>

<body>
	<a href="News_list.php"> &lt;-- Quay lại</a>
	<?php
	 	if(isset($_REQUEST["id"]) && $_REQUEST["id"])
		{
			$id = $_REQUEST["id"];
			$conn = mysqli_connect("localhost","root","") or die("Erro!");
			mysqli_select_db($conn,"ghost") or die("Erro!!");
			$sql = "SELECT * FROM `news_list` WHERE `news_list`.`Type_id` = $id;";
			$row = mysqli_fetch_assoc(mysqli_query($conn,$sql));
		}
	?>
	<form action="News_list.php?id=<?php echo $id;?>" method = "post">
	<table width="486" border="1" align="center">
  <tbody>
    <tr>
      <td width="183" align="center">Sửa danh mục tin tức</td>
	  <td width="271"> 
		  <input width="222" type="text" name="name_news_sua" value="<?php echo $row["Name_type"];?>"> 
		  <input type="submit" value ="Sửa" align="right">
	  </td>
    </tr>
  </tbody>
</table>
	</form>

</body>
</html>