<?php 
include '../../App/connect.php';
$data=new Database();
$data->connect();
$product = null;
session_start();
if (isset($_GET['id_us']) || isset($_SESSION['id_us'])) {
    if(isset($_GET['id_us'])) {
    $_SESSION['id_us']= $_GET['id_us'];
    }
    $id = $_SESSION['id_us'];
    $sql = "SELECT * from user where id_user = '$id'";
    $result = mysqli_fetch_object($db->query($sql));
    
    $idus = $id;
    $name = $result->Name;
    $address = $result->Address;
    $Phone_Num = $result->Phone_Num;
    $Login_name = $result->Login_name;
    $pass = $result->pass;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <form class="sidebar" method="post">
        <div class="logo-details">
            <img src="../..//img/icon/LogoSecondP.jpg" alt="" width="100px">
            <span class="logo_name">C L O S E T</span>
        </div>
        
        <ul class="nav-link">
            <li>
                <a href="dashboard.html">
                    <img src="../../img/icon/dashboard.png" alt="">
                    <span class="link_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="product.php">
                    <img src="../..//img/icon/product-page.png">
                    <span class="link_name">Sản phẩm</span>
                </a>
                
            </li>
            <li>
                <a href="dashboard.html">
                    <img src="../..//img/icon/dashboard.png" alt="">
                    <span class="link_name">Hóa đơn</span>
                </a>
            </li>
            <li>
                <a href="customer.php">
                    <img src="../..//img/icon/dashboard.png" alt="">
                    <span class="link_name">Khách hàng</span>
                </a>
            </li>
            <li>
                <a href="dashboard.html">
                    <img src="../..//img/icon/dashboard.png" alt="">
                    <span class="link_name">Cái này là cái gì?</span>
                </a>
            </li>
        </ul>
        <div class="bottom-content" style="list-style: none;">
            <li>
                <a href="" style="text-decoration: none;">
                    <i class="fa-solid fa-right-from-bracket" style="font-size: 30px; margin-left: 5px;"></i>
                    <span class="nav-text" style="margin-left: 45px;">Logout</span>
                </a>
            </li>
        </div>
    </form>
    <div class="section home-section">
        <nav>
            <div class="sidebar-button" >
                <i class="fa-solid fa-bars sidebarBtn" style="font-size: 35px; margin-right: 10px;cursor: pointer; "></i>
                <span style="font-size: 35px;">Dashboard</span>
            </div>
            <div class="profile-user">
                <img src="../..//img/item/a3.png" width="40px" alt="">
                <span class="name-user" style="
                font-size: 16px;
                font-weight: 600;">aadwawd</span>
                <div class="icondown" style="cursor: pointer;">
                    <i class="fa-solid fa-chevron-down"></i>
                    <div class="box-user">
                    </div>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h2>Thay đổi thông tin người dùng <?php echo $name;?></h2>
                </div>
            </div>
            <div class="card-body " style="">
            <form action="process_update_us.php" method="post">
                    <div class="form-group" style="margin-top: 10px;">
                        <label for="">Mã người dùng</label>
                        <input type="text" name="id_us" value="<?php echo $idus;?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Tên người dùng</label>
                        <input type="text" name="name"  value="<?php echo $name;?>">
                    </div>
                    <div class="form-group">
                        <label for="">Địa chỉ</label>
                        <input type="text" name="address" value="<?php echo $address;?>">
                    </div>
                    <div class="form-group">
                        <label for="">Số điện thoại</label>
                        <input type="text" name="sdt"  value="<?php echo $Phone_Num;?>">
                    </div>
                    <div class="form-group">
                        <label for="">Tên đăng nhập</label>
                        <input type="text" name="Login_name"  value="<?php echo $Login_name;?>">
                    </div>
                    <div class="form-group">
                        <label for="">Mật khẩu</label>
                        <input type="password" name="pass"  value="<?php echo $pass;?>">
                    </div>
                <!-- Add other fields as needed -->
                <button type="submit" class="btn btn-primary" name = "update">Lưu thay đổi</button>
            </form>
            </div>
        </div>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="scriptad.js">
</script>
</body>
</html>