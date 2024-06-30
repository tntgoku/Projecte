
<?php 
include '../../App/connect.php';
$data=new Database();
$data->connect();
<<<<<<< HEAD
$sql="SELECT bill.id_Bill,bill.id_us,user.Name,bill.count,bill.Total,bill.date,bill.status FROM bill inner JOIN user ON bill.id_us=user.id_user;";
=======
$sql="select bill.id_Bill,bill.id_us,user.Name,bill.count,bill.Total,
      bill.status FROM bill JOIN user ON user.id_user=bill.id_us;";
>>>>>>> 165175c3b8bb4bd7ad890fbf9cf924be55f1f946
$result=$data->query($sql);
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Dashboard</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
                    <img src="/Projecte/img/icon/people.png" alt="">
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
            <a href="/Projecte/View/index.php">
                    <img src="/Projecte/img/icon/dashboard.png" alt="">
                    <span class="link_name">Quay lai trang index</span>
                </a>
            </li>
        </ul>
        <div class="bottom-content" style="list-style: none;">
            <li>
                <a href="/Projecte/View/logout.php" style="text-decoration: none;">
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
                <img src="/Projecte/img/item/a3.png" width="40px" alt="">
                <span class="name-user" style="
                font-size: 16px;
                font-weight: 600;"><?=$_SESSION['Name']?></span>
                <div class="icondown" style="cursor: pointer;">
                    <i class="fa-solid fa-chevron-down"></i>
                    <div class="box-user">
                    </div>
                </div>
            </div>
        </nav>
        <div class="container">
            <form action="" method = "post">
                <h2>Danh sách hóa đơn mua hàng</h2>
                <a href="Export_xlsx.php?bill=-1" style = 'display: inline-block;'>
                    <button class="btn btn-outline-success my-5 my-sm-0" type="button" style="width: 100%;">Xuất file</button>
                </a>
                <table class="table">
                    <thead>
                        <tr>
                        <td>Mã hóa đơn</td>
                        <td>Mã KH</td>
                        <td>Tên khách hàng</td>
                        <td>số lượng</td>
                        <td>Ngày tạo</td>
                        <td>Thành tiền</td>
                        <td>Trạng thái</td>
                        <td colspan="2">Chức năng</td>
                    </tr>
                    </thead>
                    <tbody>
                        <?php 
                        while($row =mysqli_fetch_assoc($result)){
                            ?>
                        <tr style="margin-left: 10px;">
                            <td><?=  $row['id_Bill']; ?></td>
                            <td><?=  $row['id_us']; ?></td>
                            <td><?=  $row['Name']; ?></td>
                            <td><?=  $row['count']; ?></td>
<<<<<<< HEAD
                            <td><?=  $row['date']; ?></td>
=======
>>>>>>> 165175c3b8bb4bd7ad890fbf9cf924be55f1f946
                            <td><?=  $row['Total']; ?>đ</td>
                            <td>
                                <?php  
                                    if($row['status']==1){
                                        echo "Đã thanh toán";
                                    }else{
                                        echo "Khách hàng chưa thanh toán";
                                    }
                            ?></td>
                            <td><a href="chitietbill.php?id=<?php echo $row["id_Bill"];?>">
                                <button type="button" class="btn btn-info">Xem chi tiết</button>
                            </a>
                        </td>
                            <td><button type="button" class="btn btn-danger">Xóa hóa đơn</button></td>
                        </tr> <?php }?>
                    </tbody>
                </table>
            </form>
        </div>
        <script>
        </script>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="scriptad.js">
</script>
</body>
</html>