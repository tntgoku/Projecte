<?php 


include "../App/connect.php";
$data = new Database();
$data->connect();

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
        $sql = "INSERT INTO user (Name, Address, Login_name, pass) 
                VALUES ('$Name', '$Address', '$Login_name', '$pass')";
        
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
    $Login_name = $_POST['account'];
    $pass = $_POST['pass2'];

    $sql = "SELECT * FROM user WHERE Login_name = '$Login_name'";
    $result = $data->query($sql);
    
    if($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if($user['pass']=== $pass) {
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


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styles.css">
</head>
<body>
        <div class="wrapper">
            <div class="form-wrapper sign-up">
                <form action="register.php" method = "post">
                    <h2>Đăng ký</h2>
                <div class="input-form">
                    <input type="text" required name="Login_name">
                    <label for="">Tên đăng nhập</label>
                </div>
                <div class="input-form">
                    <input type="text" required name="Name">
                    <label for="">Họ và tên</label>
                </div>
                <div class="input-form">
                    <input type="diachi" required name="Address">
                    <label for="">Email</label>
                </div>
                <div class="input-form">
                    <input type="password" required name="pass">
                    <label for="">Mật khẩu</label>
                </div>
                <div class="input-form">
                    <input type="password" required name="pass1">
                    <label for="">Xác nhận mật khẩu</label>
                </div>
                <button type="submit" class="btn" name="register">Đăng ký</button>
                
                <div class="sign-link">
                    <p>Bạn đã có tài khoản? <a href="#" class="singIn-link">Đăng nhập</a></p>
                </div>
                </form>
            </div>


            <div class="form-wrapper sign-in">
                <form action="register.php" method = "post">
                    <h2>Đăng nhập</h2>
                <div class="input-form">
                    <input type="text" required name="account">
                    <label for="">Tên đăng nhập</label>
                </div>
                <div class="input-form">
                    <input type="password" required name="pass2">
                    <label for="">Mật khẩu</label>
                </div>
                <div class="forgot-pass">
                    <a href="#">Quên mật khẩu</a>
                </div>
                <button type="submit" class="btn" name="login">Đăng nhập</button>
                <div class="sign-link">
                    <p>Bạn chưa có tài khoản? 
                        <a href="#" class="singUp-link">Đăng ký</a>
                    </p>
                    
                </div>
                <div class="sign-link">
                    <p>Đăng nhập với? </p>
                    <ul class="sign-link__list">
                        <li class="logo__internet">
                            <a href="">
                                <img src="https://bizweb.dktcdn.net/100/415/697/themes/902041/assets/facebook.svg?1710226595388" style="width: 40px;
                                height: 40px;" alt="">
                            </a>
                        </li>
                        <li class="logo__internet">
                            <a href="">
                                <img src="https://bizweb.dktcdn.net/100/415/697/themes/902041/assets/instagram.svg?1710226595388" style="width: 40px;
                                height: 40px;" alt="">
                            </a>
                        </li>
                        <li class="logo__internet">
                            <a href="">
                                <img src="https://bizweb.dktcdn.net/100/415/697/themes/902041/assets/tiktok.svg?1710226595388" style="width: 40px;
                                height: 40px;" alt="">
                            </a>
                        </li>
                        <li class="logo__internet">
                            <a href="">
                                <img src="https://bizweb.dktcdn.net/100/415/697/themes/902041/assets/shopeeico.png?1710226595388" style="width: 40px;
                                height: 40px;" alt="">
                            </a>
                        </li>
                        <li class="logo__internet">
                            <a href="">
                                <img src="https://bizweb.dktcdn.net/100/415/697/themes/902041/assets/lazadaico.png?1710226595388" style="width: 40px;
                                height: 40px;" alt="">
                            </a>
                        </li>
                    </ul>
                </div>
                </form>
            </div>

        </div>
        <script src="app.js"></script>
</body>
</html>