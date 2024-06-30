<?php 
session_start(); // Start the session at the beginning of the script

include '../App/connect.php';
$data = new Database();
$data->connect();

if (isset($_POST['login'])) {
    $username = $_POST['us_name'];
    $password = $_POST['us_pass'];
    if ($username == 'Admin') 
    {
        if(md5($password) == '7488e331b8b64e5794da3fa4eb10ad5d')
        {
            header('Location:admin/dashboard.php');
            $_SESSION["Login"]= true;
        }
        else{
            $_SESSION["Login"]= false;
            header('Location:Login_Resign.php');
        }
    }
    else{
        $pass = md5($password);
        $sql = "SELECT * from user WHERE Login_name = '$username' AND passhash = '$pass'";
        $result = $data->query($sql);
        $row = $result->fetch_assoc();
        $_SESSION['id_user'] = $row['id_user'];
        if (mysqli_num_rows($result) > 0)
        {
            header("Location:index.php");
            $_SESSION["Login"]= true;
        }
        else{
            $_SESSION["Login"]= false;
            header("Location:Login_Resign.php");
        }
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
