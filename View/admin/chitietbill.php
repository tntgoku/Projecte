<?php 
include '../../App/connect.php';
$data=new Database();
$data->connect();
$product = null;

if (isset($_GET['id']) ) {
    $id = $_GET['id'];
    echo $id;
    $sql = "SELECT bill.Total, 
    bill.count , 
    bill.address,
    bill.note,
    bill.date,
    bill.status, 
    user.Name as us_name,
    user.Phone_Num as us_sdt,
    product.id_product as prod_id,
    product.Name as prod_name,
    product.Color as prod_color,
    product.Size as prod_size,
    product.Cost as prod_cost,
    product.Discount as prod_discount,
    product.img as prod_img
    from bill 
    inner join user ON bill.id_us = user.id_user 
    inner join product on bill.id_sp = product.id_product 
    where bill.id_Bill = '$id'";
    $result = mysqli_fetch_assoc($db->query($sql));
}
else{
    echo "Loi!!";
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
                <img src="../../img/item/a3.png" width="40px" alt="">
                <span class="name-user" style="
                font-size: 16px;
                font-weight: 600;"></span>
                <div class="icondown" style="cursor: pointer;">
                    <i class="fa-solid fa-chevron-down"></i>
                    <div class="box-user">
                    </div>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            <!-- <div class="card">
                <div class="card-header">
                    <h2>Thay đổi thông tin sản phẩm có id=<?php  
                // if (isset($_GET['id_product'])) {
                //     $edit_id = $_GET['id_product'];
                //     // Fetch product details based on edit_id
                //     $sql = "SELECT id_product, Name, Type_id, Color, Size, Cost, Amount, Discount, img FROM product WHERE id_product = $edit_id";
                //         $result =mysqli_fetch_object($db->query($sql));
                //         $id=$result->id_product;
                //         echo $id;
                // } 
                    ?></h2>
                </div>
            </div> -->
            <div class="card-body " style="">
            <form action="bill.php" method="post" style="background :#e4e9f7;">
                    <div class="form-group">
                        <label for="">Người mua</label>
                        <input type="text" name="name"  value="<?php echo $result["us_name"];?>">
                    </div>
                    <div class="form-group">
                        <label for="">Địa chỉ</label>
                        <input type="text" name="color" value="<?php echo $result["address"];?>">
                    </div>
                    <div class="form-group">
                        <label for="">Số điện thoại</label>
                        <input type="text" name="size"  value="<?php echo $result["us_sdt"];?>">
                    </div>
                    <div class="form-group" style="margin-top: 10px;">
                        <label for="">Mã sản phẩm</label>
                        <input type="text" name="id_product" value="<?php echo $result["prod_id"];?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Chi tiết sản phẩm</label>
                        <input type="text" width="80px" name="img" value = "<?php echo $result["prod_name"] .'\\'. $result["prod_size"] .'\\'. $result["prod_color"];?>">
                        <img src="../../img/item/<?php echo $result["prod_img"];?>" alt="" width="150px">
                    </div>
                    <div class="form-group">
                        <label for="">Số lượng</label>
                        <input type="text" name="name"  value="<?php echo $result["count"];?>">
                    </div>
                    <div class="form-group">
                        <label for="">Giảm giá</label>
                        <input type="text" name="discount"  value="<?php echo $result["prod_discount"];?>">
                    </div>
                    <div class="form-group">
                        <label for="">Note</label>
                        <input type="text" name="discount"  value="<?php echo $result["note"];?>">
                    </div>
                    <div class="form-group">
                        <label for="">Ngày tạo</label>
                        <input type="text" name="discount"  value="<?php echo $result["date"];?>">
                    </div>
                    <div class="form-group">
                        <label for="">Thanh toán</label>
                        <input type="text" name="cost"  value="<?php echo $result["Total"];?>đ">
                    </div>
                    <div class="form-group">
                        <label for="">Trạng thái</label>
                        <input type="text" name="name"  value="<?php 
                            if ($result["status"] == 1)
                            {
                                echo "Đã thanh toán";
                            }
                            else echo "Chưa thanh toán";
                        ?>">
                    </div>
                <!-- Add other fields as needed -->
                <button type="submit" class="btn btn-primary">Quay lại</button>
                <a href="Export_xlsx.php?bill=<?php echo $id;?>" style = "display: inline-block;">
                    <button class="btn btn-primary" type="button" style="width: 100%; display: inline-block;">Xuất file</button>
                </a>
            </form>
            </div>
        </div>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="scriptad.js">
</script>
</body>
</html>