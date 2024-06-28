<?php
session_start();
 if(isset($_SESSION["Login"]) && $_SESSION["Login"] == false){
    echo '<script>
		    alert("Đăng nhập thất bại\nTài khoản hoặc Mật khẩu sai");
          </script>';
          unset($_SESSION['Login']);
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>
<body>

        <div class="wrapper">
            <div class="form-wrapper sign-up">
                <form action="" method = "post" name = "frm_dk">
                    <h2>Đăng ký</h2>
                <div class="input-form">
                    <input type="text" id ="tdn" required>
                    <label for="">Tên đăng nhập</label>
                </div>
                <div class="input-form">
                    <input type="text" id ="sdt" required>
                    <label for="">Số điện thoại</label>
                </div>
                <div class="input-form">
                    <input type="password" id="mk" required>
                    <label for="">Mật khẩu</label>
                </div>
                <div class="input-form">
                    <input type="password" id="check_mk" required>
                    <label for="">Xác nhận mật khẩu</label>
                </div>
                <button type="button" onClick="check_Resign()" class="btn">Đăng ký</button>
                
                <div class="sign-link">
                    <p>Bạn đã có tài khoản? <a href="#" class="singIn-link">Đăng nhập</a></p>
                </div>
                </form>
            </div>


            <div class="form-wrapper sign-in">
                <form action="login_proces.php" method = "post" name = "frm_dn">
                    <h2>Đăng nhập</h2>
                <div class="input-form">
                    <input type="text" name ="us_name" required>
                    <label for="">Tên đăng nhập</label>
                </div>
                <div class="input-form">
                    <input type="password" name = "us_pass" required>
                    <label for="">Mật khẩu</label>
                </div>
                <div class="forgot-pass">
                    <a href="#">Quên mật khẩu</a>
                </div>
                <button type="submit" class="btn" name = "login">Đăng nhập</button>
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
