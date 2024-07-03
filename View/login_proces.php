<?php 

include '../App/connect.php';
$data = new Database();
$data->connect();

// if (isset($_POST['login'])) {
//     $username = $_POST['us_name'];
//     $password = $_POST['us_pass'];
//     if ($username == 'Admin') 
//     {
//         if(md5($password) == '7488e331b8b64e5794da3fa4eb10ad5d')
//         {
//             header('Location:admin/dashboard.php');
//             $_SESSION["Login"]= true;
//         }
//         else{
//             $_SESSION["Login"]= false;
//             header('Location:Login_Resign.php');
//         }
//     }
//     else{
//         $pass = md5($password);
//         $sql = "SELECT * from user WHERE Login_name = '$username' AND passhash = '$pass'";
//         $result = $data->query($sql);
//         $row = $result->fetch_assoc();
//         $_SESSION['id_user'] = $row['id_user'];
//         if (mysqli_num_rows($result) > 0)
//         {
//             header("Location:index.php");
//             $_SESSION["Login"]= true;
//         }
//         else{
//             $_SESSION["Login"]= false;
//             header("Location:register.php");
//             header("Location:Login_Resign.php");
//         }
//     }
// }


use MicrosoftAzure\Storage\Common\Internal\Validate;


if(isset($_POST['register'])) {
    $Login_name = $_POST['Login_name'];
    $Name = $_POST['Name'];
    $Address = $_POST['Address'];
    $pass = $_POST['pass'];
    $pass1 = $_POST['pass1'];

    // Check if username already exists
    $check_query = "SELECT * FROM user WHERE Login_name = '$Login_name'";
    $check_result = $data->query($check_query);
    
    if($check_result->num_rows > 0) {
        echo '<script>
                alert("Tài khoản đã tồn tại");
                window.location.href = "register.php";
              </script>';
    } else if($pass !== $pass1) {
        echo '<script>
                alert("Mật khẩu xác nhận không khớp");
                window.location.href = "register.php";
              </script>';
    } else {
        $passwordHash = password_hash($pass, PASSWORD_DEFAULT);
        $sql = "INSERT INTO user (Name, Address, Login_name, passhash,pass) 
                VALUES ('$Name', '$Address', '$Login_name', '$passwordHash','$pass')";
        
        $result = $data->query($sql);
        
        if($result === TRUE) {
            echo '<script>
                    alert("Đăng ký thành công");
                    window.location.href = "index.php";
                  </script>';
        } else {
            echo '<script>
                    alert("Đăng ký thất bại");
                    window.location.href = "register.php";
                  </script>';
        }
    }
}
session_start();
if(isset($_POST['login'])) {
    $Login_name = $_POST['us_name'];
    $pass = $_POST['us_pass'];
    $sql = "SELECT * FROM user WHERE Login_name = '$Login_name'";
    $result = $data->query($sql);
    
    if($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if(($user['pass']== $pass) ) {
            // Password matches, set session variables and redirect to dashboard
            $_SESSION['id_user'] = $user['id_user']; // Example session variable, you can store any relevant user data
            $_SESSION['Login_name'] = $user['Login_name'];
            $_SESSION['Name'] = $user['Name'];
            
            // Redirect to dashboard or any authenticated page
            if($user['role']!=1){
                header("Location: index.php");
            exit();
            }else{
                header("Location: admin/dashboard.php");
            exit();
            }
        } else {
            echo '<script>
                    alert("Sai mật khẩu");
                    window.location.href = "login.php";
                  </script>';
        }
    } else {
        echo '<script>
                alert("Tài khoản không tồn tại");
                window.location.href = "login.php";
              </script>';
    }
}

?>
