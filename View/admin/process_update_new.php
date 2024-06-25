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
}
else{
    $sql = "INSERT INTO `news` (`id_News`, `Name`, `Type_id`, `Content`) VALUES (NULL, '$name', '$type', '$content');";
}
$data->query($sql);
header("Location:News.php");
?> 