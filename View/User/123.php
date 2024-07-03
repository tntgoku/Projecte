<?php 
include '../../App/connect.php';
$data=new Database();
$customer1=new Customer();
$cartcus=new Cart();
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
$currentDate=date("Y-m-d H:i:s");
$data->connect();
$product=new Product();
$id=1;
$chuoi1=[
    "id_product" => 3,
    "name" => "Example Product",
    "price" => 100,
    "description" => "This is an example product."
];


?>