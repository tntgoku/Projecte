<?php 
session_start(); // Start the session at the beginning of the script

include '../App/connect.php';
$data = new Database();
$data->connect();
// Code nay no ko chay
if (isset($_POST['login'])) {
    $user = $_POST['username'];
    $pwd = $_POST['password'];
    // Truy vấn SQL để kiểm tra thông tin đăng nhập
    $sql = "SELECT * FROM user WHERE Login_name = ? AND pass = ?";
    $stmt = $data->query1($sql);
    if ($stmt) {
        $stmt->bind_param("ss", $user, $pwd);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION['id_user']= $row['id_user'];
            $_SESSION['Name'] = $row['Name']; // Lưu tên người dùng vào session
            echo "success"; // Trả về kết quả thành công
            header("Location:index.php");
        } else {
            echo "error"; // Trả về kết quả lỗi
        }

        $stmt->close();
    }
}

$data->closedDB();
    //$pwd = md5($pwd); 

//    function escape_string($input) {
//        return str_replace(
//            array("\\",  "\x00", "\n",  "\r",  "'",  '"', "\x1a"),
//            array("\\\\", "\\0", "\\n", "\\r", "\'", '\"', "\\Z"),
//            $input
//        );
//    }

//    $user = escape_string($user);
//    $pwd = escape_string($pwd);

//     $sql = "SELECT * FROM user WHERE Login_name = '$user' AND pass = '$pwd'";
//     $result = $data->query($sql);

//     if ($result->num_rows > 0) {
//         $row = $result->fetch_assoc();
//         $_SESSION['id_user'] = $row['id_user'];
        
//         echo $_SESSION['id_user']; // Output the session id_user for debugging
//         echo '<script>alert("dang nhap thanh cong '.$_row['Name'].'") </script>';
// 		header("Location:index1.php");

//     } else {
//         echo "Invalid username or password.";
//     }
// }

?>
