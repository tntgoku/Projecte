<<?php 
include "../../App/connect.php";
$data=new Database();
$data->connect();
    $name = $_REQUEST["Name"];
    $type = $_REQUEST["Type_id"];
    $content =$_REQUEST["content"];
if(isset($_REQUEST["id_news"]) && $_REQUEST["id_news"] !="")
{
    $id = $_REQUEST["id_news"];
    $sql = "UPDATE `news` SET `Name` = '$name', `Type_id` = '$type', `Content` = '$content' WHERE `news`.`id_News` = '$id';";
    $tittle = "Sửa";
}
else{
    $sql = "INSERT INTO `news` (`id_News`, `Name`, `Type_id`, `Content`) VALUES (NULL, '$name', '$type', '$content');";
    $tittle = "Thêm";
}
if ($data->query($sql) == TRUE)
{
    echo '<script>
		    alert("'.$tittle.' thành công bài viết '.$name.'");
		  window.location.href="News.php";</script>';
}
else 
{
    echo '<script>
    alert("'.$tittle.' thất bại bài viết '.$name.'");
  window.location.href="News.php";</script>';
}
?> 