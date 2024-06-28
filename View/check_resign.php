<?php
session_start();
 include '../App/connect.php';
 $data = new Database();
 $data->connect();

 function is_valid_string($input_string) {
    // Định nghĩa biểu thức chính quy để kiểm tra các ký tự hợp lệ
    $pattern = '/^[a-zA-Z\s-]+$/';
    // Sử dụng hàm preg_match để kiểm tra chuỗi đầu vào
    if (preg_match($pattern, $input_string)) {
        return true;
    } else {
        return false;
    }
 }

if(isset($_POST['tdn']))
{
    $tnd = $_POST['tnd'];
    $tdn = $_POST['tdn'];
    $sdt = $_POST['sdt'];
    $mk = $_POST['mk'];
    $cmk = $_POST['cmk'];
    $add = $_POST['add'];
    if(!is_valid_string($tdn)) {
        echo '1';
    }
    else if($mk == "") 
    {
        echo '3';
    }
    else
    {
        $sql = "SELECT * from user where Login_name = '$tdn'";
        $result = $data->query($sql);
        if($result->num_rows > 0)   
        {
            echo '2';
        }
        elseif (!is_numeric(($sdt)))
        {
            echo '4';
        }
        elseif (strlen($mk) > 10)
        {
            echo '5';
        }
        elseif($mk != $cmk)
        {
            echo '6';
        }
        elseif ($add == '0')
        {
            echo '7';
        }
        else
        {
            $mhmk = md5($mk);
            $sql = "INSERT INTO `user` (`id_user`, `Name`, `Address`, `Phone_Num`, `Login_name`, `pass`) VALUES (NULL,'$tnd','$add','$sdt','$tdn', '$mhmk');";
            $data->query($sql);
            $sql ="SELECT * from user where Login_name = '$tdn'";
            $result = $data->query($sql);
            $row = mysqli_fetch_assoc($result);
            $_SESSION['id_user'] = $row['id_user'];
            echo '0';
        }
    }
    
}
?>