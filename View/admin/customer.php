<?php 
// phan nay la thong tin khach hang 

include "../../App/connect.php";
$data=new Database();
$data->connect();
if(isset($_POST["name_news"]) && $_POST["name_news"])
{
	$name = $_POST["name_news"];
	$sql = "INSERT INTO `news_list` (`Type_id`, `Name_type`) VALUES (NULL, '$name');";
	mysqli_query($conn,$sql);
}
// Sua sp
if (isset($_POST["name_news_sua"]) && $_POST["name_news_sua"] )
{
  $id = $_REQUEST["id"];
  $name = $_REQUEST["name_news_sua"];
  $sql = "UPDATE `news_list` SET `Name_type` = '$name' WHERE `news_list`.`Type_id` = $id;";
  mysqli_query($conn,$sql);
}
// Xoa sp
if(isset($_REQUEST["id_xoa"]) && $_REQUEST["id_xoa"])
{
  $id = $_REQUEST["id_xoa"];
  $sql = "DELETE FROM `news_list` WHERE `Type_id` = $id;";
  mysqli_query($conn,$sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Quản lý bài viết</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                    <img src="/Projecte/img/icon/customer.php" alt="">
                    <span class="link_name">Khách hàng</span>
                </a>
            </li>
            <li>
                <a href="News.php">
                    <img src="/Projecte/img/icon/News.php" alt="">
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
		<h2>Quản lý Khách hàng</h2>
        <div class="btn-add" >
            <form class="form-inline" style="width: 100%;">
                <div class="form-group" style="width: 40%;">
                    <input type="text" name="" id="" class="form-control"  style="margin-right:20px;">
                    <button class="btn btn-outline-success my-5 my-sm-0" type="submit" style="width: 35%;">Tìm kiếm</button>
              </form>
            </div>
        </div>
		<form action="" method="post">
		<table class="table">
			<thead style="text-align: center;">
				<tr>
					<!-- <td colspan="6" style="text-align: center; font-size: 32px; font-weight: 600; "> Danh sách các bài viết</td> -->
				</tr>
				<tr style="text-align: center;"> <td>ID</td>
                    <td>Tên KH</td>
                    <td>SĐT</td>
                    <td>Địa chỉ</td>
                    <td>Tên đăng nhập</td>
				<td colspan="2" >Chức năng</td></tr>
			</thead>
			<tbody>
				 <?php 
				$i=1;
				$sql= "SELECT * from User";
				
				$result=$data->query($sql);
				while($row=mysqli_fetch_assoc($result)){
					?>
					<tr>
						<td><?= $row['id_user']?></td>
						<td><?= $row['Name']?></td>
						<td><?= $row['Phone_Num']?></td>
						<td><?= $row['Address']?></td>
						<td><?= $row['Login_name']?></td>
						<td><a href="update.php?id_product=<?= $row['id_user']?>"><button type="button" class="btn btn-success">Sua</button></a></td>
                        <td><a href="deleted.php?id_product=<?= $row['id_user']?>"><button type="button" class="btn btn-danger" name="deleted">Xoa</button></a></td>
						<td><?php echo $row['id_user']?></td>
						<td><?php echo $row['Name']?></td>
						<td><?php echo $row['Phone_Num']?></td>
						<td><?php echo $row['Address']?></td>
						<td><?php echo $row['Login_name']?></td>
						<td><a href="update_customer.php?id_us=<?php echo $row['id_user']?>"><button type="button" class="btn btn-success">Sua</button></a></td>
                        <td><a href="delete_us.php?id_us=<?php echo $row['id_user']?>"><button type="button" class="btn btn-danger" name="deleted">Xoa</button></a></td>
					</tr>
				<?php
				}
				?>
			</tbody>
		</table>
		
		</form>
        <script src="scriptad.js"></script>
</body>
</html>