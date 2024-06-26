<?php
// session_start(); // Bắt đầu session
// include '../../App/connect.php';
// $data=new Database();
// $data->connect();
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $inputUsername = $_POST['user'];
//     $inputPassword = $_POST['pwd'];

//     // Truy vấn SQL để kiểm tra thông tin đăng nhập
//     $sql = "SELECT * FROM user WHERE Login_name = ? AND pass = ?";
//     $stmt = $data->query1($sql);
//     $hashedPassword = ($inputPassword);
//     $stmt->bind_param("ss", $inputUsername, $hashedPassword);
//     $stmt->execute();
//     $result = $stmt->get_result();

//     if ($result->num_rows > 0) {
//         $row = $result->fetch_assoc();
//         $_SESSION['Name'] = $row['Name']; // Lưu tên người dùng vào session
//         echo "Login successful!";
//         // Chuyển hướng về trang index.php hoặc trang chính
//         header("Location:index.php");
//     } else {
//         echo "Invalid username or password.";
//     }

//     $stmt->close();
// }

// $data->closedDB();
?>

<?php
session_start();

include '../../App/connect.php'; // Đường dẫn đến file connect.php
$data = new Database();
$data->connect();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputUsername = $_POST['user'];
    $inputPassword = $_POST['pwd'];

    // Truy vấn SQL để kiểm tra thông tin đăng nhập
    $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
    $stmt = $data->query1($sql);
    if ($stmt) {
        $hashedPassword = ($inputPassword); // Mã hóa mật khẩu bằng md5
        $stmt->bind_param("ss", $inputUsername, $hashedPassword);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION['Name'] = $row['username']; // Lưu tên người dùng vào session
            echo "success"; // Trả về kết quả thành công
        } else {
            echo "error"; // Trả về kết quả lỗi
        }

        $stmt->close();
    }
}

$data->closedDB();
?>

