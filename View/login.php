<?php
session_start();
 if(isset($_SESSION["Login"]) && $_SESSION["Login"] == false){
    echo '<script>
		    alert("Đăng nhập thất bại\nTài khoản hoặc Mật khẩu sai");
          </script>';
          unset($_SESSION['Login']);
 }
 $provinces = array(
    "An Giang",
    "Bà Rịa - Vũng Tàu",
    "Bạc Liêu",
    "Bắc Kạn",
    "Bắc Giang",
    "Bắc Ninh",
    "Bến Tre",
    "Bình Dương",
    "Bình Định",
    "Bình Phước",
    "Bình Thuận",
    "Cà Mau",
    "Cao Bằng",
    "Cần Thơ",
    "Đà Nẵng",
    "Đắk Lắk",
    "Đắk Nông",
    "Điện Biên",
    "Đồng Nai",
    "Đồng Tháp",
    "Gia Lai",
    "Hà Giang",
    "Hà Nam",
    "Hà Nội",
    "Hà Tĩnh",
    "Hải Dương",
    "Hải Phòng",
    "Hậu Giang",
    "Hòa Bình",
    "Hưng Yên",
    "Khánh Hòa",
    "Kiên Giang",
    "Kon Tum",
    "Lai Châu",
    "Lâm Đồng",
    "Lạng Sơn",
    "Lào Cai",
    "Long An",
    "Nam Định",
    "Nghệ An",
    "Ninh Bình",
    "Ninh Thuận",
    "Phú Thọ",
    "Phú Yên",
    "Quảng Bình",
    "Quảng Nam",
    "Quảng Ngãi",
    "Quảng Ninh",
    "Quảng Trị",
    "Sóc Trăng",
    "Sơn La",
    "Tây Ninh",
    "Thái Bình",
    "Thái Nguyên",
    "Thanh Hóa",
    "Thừa Thiên Huế",
    "Tiền Giang",
    "TP Hồ Chí Minh",
    "Trà Vinh",
    "Tuyên Quang",
    "Vĩnh Long",
    "Vĩnh Phúc",
    "Yên Bái"
);
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
                    <input type="text" id ="tnd" required>
                    <label for="">Tên người dùng</label>
                </div>
                <div class="input-form">
                    <input type="text" id ="sdt" required>
                    <label for="">Số điện thoại</label>
                </div> <!-- Đoạn này chỉnh lại ui hộ cái nhá -->
                <div class="input-form">
                    <select id="add"> 
                        <option value="0">--Chọn Tỉnh/Thành phố--</option>
                        <?php foreach ($provinces as $value) { ?>
                            <option value="<?php echo $value;?>"><?php echo $value;?></option>
                        <?php } ?>
                    </select>
                    <label for="">Địa chỉ (Tỉnh/Thành phố)</label>
                </div>
                <div class="input-form">
                    <input type="text" id ="tdn" required>
                    <label for="">Tên đăng nhập</label>
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