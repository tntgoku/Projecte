<?php 
include '../../App/connect.php';
$data=new Database();
$data->connect();
if(isset($_POST['btn-addpro'])){
    header("Location:add.php");
}
if(isset($_POST['deleted'])){
    if (isset($_GET['id_product'])) {
        $iddl = $_GET['id_product'];
        $name-$_GET['Name'];
        $stmt = $sql("DELETE FROM product WHERE id_product = '$iddl'");
        $result = $stmt->execute();
    
        // Check if the query was successful
        if ($result) {
            echo "Deletion successful";
            echo '<script>
                    alert("Deletion successful for product ID: ' . $name. '");
                    window.location.href="product.php";
                  </script>';
        } else {
            // Output the error message for debugging
            echo "Deletion failed: " . $stmt->error;
        }
    
        // Close the statement
        $stmt->close();
    }
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
                <img src="/Projecte/img/item/a3.png" width="40px" alt="">
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
        <h2>DANH SÁCH SẢN PHẨM</h2><br>
        <div class="container" style="display: flex; justify-content: space-between; margin-bottom: 10px;">
            <div class="col-6" style="display: flex;  justify-content: flex-start;">
    
                <form class="d-flex" role="search" style="width: 100%;">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                    <a href="Export_xlsx.php?prod=1">
                        <button class="btn btn-outline-success my-5 my-sm-0" type="button" style="width: 100%;">Xuất file</button>
                    </a>
                  </form>
    
            </div>
            <div class="col-6" style="display: flex; justify-content: space-around;">
                <?php   $toltal=$data->query('select count(*) as tong from product ');
                $result=$toltal->fetch_assoc();
                        echo "<h5> Có " .$result["tong"] ." Sản phẩm</h5> ";
                ?>
            </div>

        </div>
        <form action="add.php" method="post" style=" margin-top:10px;">
            <button type="submit" class="btn btn-success" name="btn-add">Thêm sản phẩm</button>
            <table class="table">
                <thead style="background: #81B5B2;"> <tr>
                    <td>Mã sản phẩm</td>
                    <td>Hình ảnh</td>
                    <td>Tên</td>
                    <td>Loại áo</td>
                    <td>Màu sắc</td>
                    <td>Size</td>
                    <td>Giá</td>
                    <td>Số lượng</td>
                    <td>Giảm giá</td>
                    <td colspan="2">Chức năng</td>
                </tr></thead>
                <tbody>
                    <?php 
                    $i=1;
                    $sql="select product.id_product ,product.img,product.Name,product_list.Type_name,product.Color,product.Size,product.Cost,
                    product.Amount,product.Discount FROM product INner JOIN product_list ON product_list.Type_id=product.Type_id
                    ORDER BY product.id_product DESC";
                    $result=$data->query($sql);
                        while($row =mysqli_fetch_assoc($result)){?>
                            <tr>
                                <td><?php echo $row['id_product']?></td>
                                <td><img src="/Projecte/img/item/<?php echo $row['img']?>" alt="123" width="60" style="object-fit: cover;"></td>
                                <td><?php echo $row['Name']?></td>
                                <td><?php echo $row['Type_name']?></td>
                                <td><?PHP echo $row['Color'] ?></td>
                                <td><?PHP echo $row['Size'] ?></td>
                                <td><?PHP echo $row['Cost'] ?></td>
                                <td><?PHP echo $row['Amount'] ?></td>
                                <td><?PHP echo $row['Discount'] ?></td>
                                <td><a href="update.php?id_product=<?php echo $row["id_product"];?>"><button type="button" class="btn btn-success">Sua</button></a></td>
                                <td><a href="deleted.php?id_product=<?php echo $row["id_product"];?>"><button type="button" class="btn btn-danger" name="deleted">Xoa</button></a></td>
                            </tr>
                        <?php
                        }
                    ?>
                </tbody>
            </table>

        </form>
        
        <script>
        </script>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="scriptad.js">
</script>
</body>
</html>