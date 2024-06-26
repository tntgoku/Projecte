<?php
include "../../App/connect.php";
$data=new Database();
$data->connect();
if(isset($_REQUEST["id_del"])){
    $id = $_REQUEST["id_del"];
    $data->query("DELETE FROM `news` WHERE `id_news` = $id;");
}
header("Location:News.php");
?>