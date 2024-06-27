<?php
    include "../../App/connect.php";
    $customer= new Customer();
    $data=new Database();
    $data->connect();
    if(isset($_REQUEST["update"])){
        $id=$_REQUEST["id_us"];
        $name = $_REQUEST["name"];
        $sdt=$_REQUEST["sdt"];
        $address = $_REQUEST["address"];
        $account = $_REQUEST["Login_name"];
        $pass = $_REQUEST["pass"];
        $pass1 = $_REQUEST["pass1"];

            $customer->updateCustomer($id,$name,$sdt,$address,$pass,$pass1,$account);
    }
?>