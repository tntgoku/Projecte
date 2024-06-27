    <?php 
include '../../App/connect.php';
$data=new Database();
$data->connect();
$custommer= new Customer();
$product = null;
$customer12=array();
$id_customer = isset($_REQUEST['id_customer']) ? $_REQUEST['id_customer'] : null;
if ($_REQUEST['id_customer'] !== null) {
    // Tạo mảng customer1 và thêm thông tin khách hàng vào mảng
       $customer1=$custommer->getinforcus($id_customer);
       if($customer1){
        foreach($customer1 as $info)
        {$customer12[]=$info;

        }
       } 
} else {
    echo "Không có id_customer trong REQUEST.";
}


// doan nay la luu thong tin
if(isset($_POST['update'])){

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
<form class="sidebar" method="post" style="transition: all 1s cubic-bezier(0.4, 0, 1, 1);">
        <div class="logo-details">
            <img src="/Projecte/img/icon/LogoSecondP.jpg" alt="" width="100px">
            <span class="logo_name">C L O S E T</span>
        </div>
        
        <ul class="nav-link">
            <li>
                <a href="dashboard.php">
                    <img src="/Projecte/img/icon/dashboard.png" alt="">
                    <span class="link_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="product.php">
                    <img src="/Projecte/img/icon/product-page.png">
                    <span class="link_name">Sản phẩm</span>
                </a>
                
            </li>
            <li>
                <a href="bill.php">
                    <img src="/Projecte/img/icon/dashboard.png" alt="">
                    <span class="link_name">Hóa đơn</span>
                </a>
            </li>
            <li>
                <a href="customer.php">
                    <img src="../../img/icon/people.png" alt="">
                    <span class="link_name">Khách hàng</span>
                </a>
            </li>
            <li>
                <a href="News.php">
                    <img src="/Projecte/img/icon/dashboard.png" alt="">
                    <span class="link_name">Quản lý bài viết(news)</span>
                </a>
            </li>
            <li>
                <a href="vendors.php">
                    <img src="/Projecte/img/icon/dashboard.png" alt="">
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
                    <h2>Thay đổi thông tin người dùng <?=  $customer12[1];?></h2>
                </div>
            </div>
            <div class="card-body ">
            <form action="process_update_us.php" method="post">
                    <div class="form-group" style="margin-top: 10px;">
                        <label for="">Mã người dùng</label>
                        <input type="text" name="id_us" value="<?=$customer12[0];?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Tên người dùng</label>
                        <input type="text" name="name"  value="<?=$customer12[1];?>">
                    </div>
                    <div class="form-group">
                        <label for="">Địa chỉ</label>
                        <input type="text" name="address" value="<?=$customer12[2];?>">
                    </div>
                    <div class="form-group">
                        <label for="">Số điện thoại</label>
                        <input type="text" name="sdt"  value="<?=$customer12[3];?>">
                    </div>
                    <div class="form-group">
                        <label for="">Tên đăng nhập</label>
                        <input type="text" name="Login_name"  value="<?=$customer12[4];?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Mật khẩu</label>
                        <input type="password" name="pass"  value="<?=$customer12[5];?>">
                    </div>
                    <div class="form-group">
                        <label for="">Nhập lại mật khẩu</label>
                        <input type="password" name="pass1"  >
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