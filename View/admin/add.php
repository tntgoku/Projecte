<?php 
include '../../App/connect.php';
$data=new Database();
$data->connect();

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
            <!-- <li>
            <a href="/Projecte/View/index.php">
                    <img src="/Projecte/img/icon/dashboard.png" alt="">
                    <span class="link_name">Quay lai trang index</span>
                </a>
            </li> -->
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
                <img src="/img/item/a3.png" width="40px" alt="">
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
            <div class="card" style="margin-bottom:15px;">
                <div class="card-header">
                    <h2>thêm sản phẩm</h2>
                </div>
            </div>
            <div class="card-body " style="margin-bottom:15px;">
                <form action="process_add.php" method="post" enctype="multipart/form-data" width="600px">
                    <div class="form-group">
                        <label for="">Tên sản phẩm</label>
                        <input type="text" name="name">
                    </div>
                    <div class="form-group">
                        <label for="">Chủng loại</label>
                        <select name="type_id" id="">
                        <?php 
                        $truyvan=$data->query("select* from product_list");
                        while($row=mysqli_fetch_assoc($truyvan)){
                            ?>
                            <option value="<?php echo $row['Type_id']?>"><?php echo $row['Type_name']?></option>
                            <?php
                        }
                        ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Màu sắc</label>
                        <input type="text" name="color">
                    </div>
                    <div class="form-group">
                        <label for="">Size</label>
                        <input type="text" name="size">
                    </div>
                    <div class="form-group">
                        <label for="">Giá</label>
                        <input type="text" name="cost">
                    </div>
                    <div class="form-group">
                        <label for="">Số lượng</label>
                        <input type="text" name="amount">
                    </div>
                    <div class="form-group">
                        <label for="">Giảm giá</label>
                        <input type="text" name="discount">
                    </div>
                    <div class="form-group">
                        <label for="">Hình ảnh</label>
                        <input type="file" name="img">
                    </div>
                    <div class="btn-box">
                        <button name="submit" class="btn btn-success" type="submit"> them san pham</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="scriptad.js">
</script>
</body>
</html>