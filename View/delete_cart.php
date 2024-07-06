<?php
session_start();
include '../App/connect.php';
$data = new Database();
$data->connect();
if(isset($_REQUEST['id_sp']))
{
    echo'1';
    $id = $_REQUEST['id_sp'];
    $us = $_SESSION['id_user'];
    $data->query("DELETE FROM cart WHERE id_us = '$us' AND id_sp = '$id'");
    $_SESSION['del_cart'] = true;
    header("Location: cartproduct.php");
}
?>