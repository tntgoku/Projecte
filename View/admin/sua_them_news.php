<?php
	$conn = mysqli_connect("localhost","root","") or die("Erro!");
	mysqli_select_db($conn,"ghost") or die("Erro!!");
	if (isset($_REQUEST["id_news"]) && $_REQUEST["id_news"])
	{
		$title = "Sửa tin tức";
	}
	else	
	{
		$title = "Thêm tin tức";
		$id="";
		$name = "";
		$type = "";
		$content ="";
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $title;?></title>
</head>

<body>
	<form action="News.php" name="frm_news" method  ="post" enctype="multipart/form-data">
		<table width="676" border="1" align="center">
  <tbody style ="text-align: center">
    <tr>
      <td colspan="2"><?php echo $title;?></td>
    </tr>
	  <?php
	  	if (isset($_REQUEST["id_news"]) && $_REQUEST["id_news"])
		{
			$id= $_REQUEST["id_news"];
			$sql = "SELECT * FROM `news` WHERE `news`.`id_News` = $id;";
			$row = mysqli_fetch_assoc(mysqli_query($conn,$sql));
			$name = $row["Name"];
			$type = $row["Type_id"];
			$content = $row["Content"];
		}
	  ?>
    <tr>
      <td width="237">Tiêu đề</td>
      <td width="423"><input width="423" type="text" name ="name" value="<?php echo $name;?>">
					<input type="text" name="id" value="<?php echo $id;?>" style ="display: none;">
	  </td>
    </tr>
    <tr>
      <td width="237">Loại</td>
      <td width="423">
		<select  name="type" id="">
			<?php 
				$sql = "SELECT * FROM `news_list`";
				$db = mysqli_query($conn,$sql);
				while ($row1 = mysqli_fetch_assoc($db))
				{
					$select = $type == $row1["Type_id"] ? "selected" : "";
			?>
			<option value="<?php echo $row1["Type_id"];?>" <?php echo $select;?>><?php echo $row1["Name_type"];?></option>
			<?php
			}
			?>
		</select>	
	  </td>
    </tr>
    <tr>
      <td width="237">Nội dung</td>
      <td width="423"> <textarea name="content" id="" cols="30" rows="10"><?php echo $content;?></textarea> </td>
    </tr>
    <tr>
      <td colspan ="2">
		  <input type="submit" value="<?php echo $title;?>">
	  </td>
    </tr>
  </tbody>
</table>

	</form>
</body>
</html>
<script src="jquery-3.5.0.min.js"></script>
	<script src="ckeditor/ckeditor.js"></script>
	<script src="ckeditor/ckfinder/ckfinder.js"></script>
<script>
	
		CKEDITOR.replace('content');
	</script>
