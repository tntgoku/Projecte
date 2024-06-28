<?php
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

    $tdn = $_POST['tdn'];
    $sdt = $_POST['sdt'];
    $mk = $_POST['mk'];
    $cmk = $_POST['cmk'];
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
        else
        {
            $mhmk = md5($mk);
            $sql = "INSERT INTO `user` (`id_user`, `Name`, `Address`, `Phone_Num`, `Login_name`, `pass`) VALUES (NULL,'','','','$tdn', '$mhmk');";
            $data->query($sql);
            echo '0';
        }
    }
    
}
?>