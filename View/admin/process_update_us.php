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
<<<<<<< HEAD
        $sql_check = "SELECT * from user where Login_name = '$account' and id_user <> '$id'";
        $result_check = $data->query($sql_check);
        if ($result_check->num_rows > 0){
            echo '<script>
                alert("Tên đăng nhập đã tồn tại");
                window.location.href="update_customer.php";
              </script>'; 
        }
        else{
        $sql = "UPDATE `user` SET `Name` = '$name', `Address` = '$address', `Phone_Num` = '$sdt', `Login_name` = '$account' WHERE `user`.`id_user` = '$id';";
        if ($data->query($sql) == TRUE) {
            echo '<script>
                alert("Cập nhật thông tin người dùng '.$name.' thành công");
                window.location.href="customer.php";
              </script>';
        }
        else{
            echo '<script>
                alert("Cập nhật thông tin người dùng '.$name.' thất bại");
                window.location.href="update_customer.php";
              </script>';
        }
    }
=======
        $pass1 = $_REQUEST["pass1"];

            $customer->updateCustomer($id,$name,$sdt,$address,$pass,$pass1,$account);
>>>>>>> 08b0bdfe1d2fa841d1813dff68d7642636fe24cf
    }
?>