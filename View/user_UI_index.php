<?php
session_start();
include '../App/connect.php';
$data = new Database();
$data->connect();
	if(isset($_SESSION["id_user"]))
	{
		$id = $_SESSION["id_user"];
		$sql = "SELECT * from User where id_user = '$id'";
		$user = mysqli_fetch_assoc($data->query($sql));
		$user_name = $user["Name"];
		$_SESSION['Name'] = $user_name;
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
		$user_name = "";
		$count_sp = "0";
		$id="";
	}

	$provinces = array(
		"An Giang",
		"Bà Rịa - Vũng Tàu",
		"Bạc Liêu",
		"Bắc Kạn",
		"Bắc Giang",
		"Bắc Ninh",
		"Bến Tre",
		"Bình Dương",
		"Bình Định",
		"Bình Phước",
		"Bình Thuận",
		"Cà Mau",
		"Cao Bằng",
		"Cần Thơ",
		"Đà Nẵng",
		"Đắk Lắk",
		"Đắk Nông",
		"Điện Biên",
		"Đồng Nai",
		"Đồng Tháp",
		"Gia Lai",
		"Hà Giang",
		"Hà Nam",
		"Hà Nội",
		"Hà Tĩnh",
		"Hải Dương",
		"Hải Phòng",
		"Hậu Giang",
		"Hòa Bình",
		"Hưng Yên",
		"Khánh Hòa",
		"Kiên Giang",
		"Kon Tum",
		"Lai Châu",
		"Lâm Đồng",
		"Lạng Sơn",
		"Lào Cai",
		"Long An",
		"Nam Định",
		"Nghệ An",
		"Ninh Bình",
		"Ninh Thuận",
		"Phú Thọ",
		"Phú Yên",
		"Quảng Bình",
		"Quảng Nam",
		"Quảng Ngãi",
		"Quảng Ninh",
		"Quảng Trị",
		"Sóc Trăng",
		"Sơn La",
		"Tây Ninh",
		"Thái Bình",
		"Thái Nguyên",
		"Thanh Hóa",
		"Thừa Thiên Huế",
		"Tiền Giang",
		"TP Hồ Chí Minh",
		"Trà Vinh",
		"Tuyên Quang",
		"Vĩnh Long",
		"Vĩnh Phúc",
		"Yên Bái"
	);
	$provinces1 = array(
		"An Giang",
		"Bà Rịa - Vũng Tàu",
		"Bạc Liêu",
		"Bắc Kạn",
		"Bắc Giang",
		"Bắc Ninh",
		"Bến Tre",
		"Bình Dương",
		"Bình Định",
		"Bình Phước",
		"Bình Thuận",
		"Cà Mau",
		"Cao Bằng",
		"Cần Thơ",
		"Đà Nẵng",
		"Đắk Lắk",
		"Đắk Nông",
		"Điện Biên",
		"Đồng Nai",
		"Đồng Tháp",
		"Gia Lai",
		"Hà Giang",
		"Hà Nam",
		"Hà Nội",
		"Hà Tĩnh",
		"Hải Dương",
		"Hải Phòng",
		"Hậu Giang",
		"Hòa Bình",
		"Hưng Yên",
		"Khánh Hòa",
		"Kiên Giang",
		"Kon Tum",
		"Lai Châu",
		"Lâm Đồng",
		"Lạng Sơn",
		"Lào Cai",
		"Long An",
		"Nam Định",
		"Nghệ An",
		"Ninh Bình",
		"Ninh Thuận",
		"Phú Thọ",
		"Phú Yên",
		"Quảng Bình",
		"Quảng Nam",
		"Quảng Ngãi",
		"Quảng Ninh",
		"Quảng Trị",
		"Sóc Trăng",
		"Sơn La",
		"Tây Ninh",
		"Thái Bình",
		"Thái Nguyên",
		"Thanh Hóa",
		"Thừa Thiên Huế",
		"Tiền Giang",
		"TP Hồ Chí Minh",
		"Trà Vinh",
		"Tuyên Quang",
		"Vĩnh Long",
		"Vĩnh Phúc",
		"Yên Bái"
	);
?>