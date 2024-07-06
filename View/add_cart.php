<?php
session_start();
include '../App/connect.php';
$data = new Database();
if(isset($_REQUEST['idproduct']))
{
    $id_prod = $_REQUEST['idproduct'];
    $id_us = $_SESSION['id_user'];
    $sql = "SELECT * FROM cart WHERE id_us = '$id_us' AND id_sp = '$id_prod'";
    $result = $data->query($sql);
    if($result->num_rows > 0 )
    {
        $row = $result->fetch_assoc();
        $count = $row['amount'] + 1 ;
        $sql = "UPDATE `cart` SET amount = '$count' WHERE id_us = '$id_us' AND id_sp =  '$id_prod'";
    }
    else{
        $sql = "INSERT INTO `cart` (`id_us`, `id_sp`, `amount`) VALUES ('$id_us', '$id_prod', '1');";
    }
    $data->query($sql);
    $priv_url = $_SESSION['previous_url'];
    header("Location: $priv_url");
}
?>