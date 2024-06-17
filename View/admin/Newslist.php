<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tin tức</title>
</head>

<body>
	<a href="">Trang Chủ</a>
	<a href="sua_them_news.php">Thêm tin tức</a>
	<form action="" method ="post">
		<table width="1000" border="1" align="center">
  <tbody style ="text-align:center;">
    <tr>
      <td colspan="5">Tin tức</td>
	  </tr>
    <tr>
      <td>ID</td>
	  <td>Loại</td>
      <td>Tiêu đề</td>
      <td>Nội dung</td>
	  <td>Chức năng</td>
    </tr>
	  <?php
	  $conn = mysqli_connect("localhost","root","") or die("Erro!");
	  mysqli_select_db($conn,"project_web_ban_hang") or die("Erro!!");
	  //Them
	  if (isset($_REQUEST["id"]) && $_REQUEST["id"] == "")
	  {
		  $name = $_REQUEST["name"];
		  $type = $_REQUEST["type"];
		  $content = $_REQUEST["content"];
		  $sql = "INSERT INTO `news` (`id_News`, `Name`, `Type_id`, `Content`) VALUES (NULL, '$name', '$type', '$content');";
		  mysqli_query($conn,$sql);
	  }
	  //Sua
	  if (isset($_REQUEST["id"]) && $_REQUEST["id"] != "")
	  {
		  $id = $_REQUEST["id"];
		  $name = $_REQUEST["name"];
		  $type = $_REQUEST["type"];
		  $content = $_REQUEST["content"];
		  $sql = "UPDATE `news` SET `Name` = '$name', `Type_id` = '$type', `Content` = '$content' WHERE `news`.`id_News` = $id;";
		  mysqli_query($conn,$sql);
	  }
	  //Xoa
	  if (isset($_REQUEST["id_xoa"]) && $_REQUEST["id_xoa"])
	  {
		  $id = $_REQUEST["id_xoa"];
		  $sql = "DELETE FROM `news` WHERE `news`.`id_News` = $id;";
		  mysqli_query($conn,$sql);
	  }
	  	$sql = "SELECT * FROM `news`";
	    $db = mysqli_query($conn,$sql); 
	  	while($row = mysqli_fetch_assoc($db))
		{
			$id = $row["Type_id"];
			$sql1 = "SELECT * FROM `news_list` WHERE `news_list`.`Type_id` = $id;";
			$type = mysqli_fetch_assoc(mysqli_query($conn,$sql1));
	  ?>
	  <tr>
	  	<td height="90"><?php echo $row["id_News"];?></td>
		<td><?php echo $type["Name_type"];?></td>
      	<td><?php echo $row["Name"];?></td>
      	<td><?php echo $row["Content"];?></td>
	  	<td>
			<a href="sua_them_news.php?id_news=<?php echo $row["id_News"];?>" style="text-decoration: none">Sửa</a>
			<a href="News.php?id_xoa=<?php echo $row["id_News"];?>" style="text-decoration: none">Xóa</a>
	    </td>
	  </tr>
	  	
	  <?php
		}
	  ?>
  </tbody>
</table>
	</form>
</body>
</html>