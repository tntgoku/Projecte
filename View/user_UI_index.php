<?php
session_start();
include '../App/connect.php';
$data = new Database();
$data->connect();
	if($_SESSION["id_user"] != "")
	{
		$id = $_SESSION["id_user"];
		$sql = "SELECT * from User where id_user = '$id'";
		$user = mysqli_fetch_assoc($data->query($sql));
		$user_name = $user["Name"];
		$user_sdt = $user["Phone_Num"];
		$sql = "SELECT count(id_sp) as sp from cart where id_us = '$id'";
		$count= mysqli_fetch_assoc($data->query($sql));
		$count_sp = $count["sp"];
		$sql = "SELECT cart.id_sp, product.Name, product.Color, product.Size, product.Cost,cart.amount, product.img from product inner join cart on product.id_product = cart.id_sp where cart.id_us = '$id'";
		$sp = $data->query($sql);
	}
	else 
	{
		$_SESSION['id_user']=null;
		$user_name = "Đăng Nhập";
		$count_sp = "0";
		$id="6";
	}
?>