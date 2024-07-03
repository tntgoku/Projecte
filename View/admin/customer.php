<?php 
// phan nay la thong tin khach hang 

include "../../App/connect.php";
$data=new Database();
$data->connect();session_start();
$custommer=new Customer();
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
if (isset($_POST['deleted']) && isset($_POST['id_dele'])) {
    $custommer->deletedCustomer($_POST['id_dele'],$_POST['name1']);
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
                font-weight: 600;">Admin</span>
                <div class="icondown" style="cursor: pointer;">
                    <i class="fa-solid fa-chevron-down"></i>
                    <div class="box-user">
                    </div>
                </div>
            </div>
        </nav>
		<h2>Quản lý Khách hàng</h2>
        <div class="btn-add" >
            <form class="form-inline" style="width: 100%;" action="customer.php">
                <div class="form-group" style="width: 40%;">
                    <input type="text" name="search" id="" class="form-control"  style="margin-right:20px;">
                    <button class="btn btn-outline-success my-5 my-sm-0" type="submit" style="width: 35%;">Tìm kiếm</button>
                    <a href="Export_xlsx.php?us=1"><button class="btn btn-outline-success my-5 my-sm-0" type="button" style="width: 100%;">Xuất file</button></a>
              </form>
            </div>
        </div>
		<form action="customer.php" method="post">
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
                 if(isset($_GET['search'])&& ($_GET['search']!='')){
                    $search1 = $_GET['search'];
                    $search = mysqli_real_escape_string($data->connect(), $search1);
                    $sql = "SELECT * FROM user WHERE user.Name LIKE '" . $search . "%'";
                }else{                    
                    $sql="SELECT * from user";
                }
                 $result=$data->query($sql);
				while($row=mysqli_fetch_assoc($result)){
					?>
					<tr>
						<td name="id"><?= $row['id_user']?></td>
						<td><?=$row['Name']?></td>
						<td><?=$row['Phone_Num']?></td>
						<td><?=$row['Address']?></td>
						<td><?=$row['Login_name']?></td>
						<td><a href="update_customer.php?id_customer=<?=$row['id_user']?>"><button type="button" class="btn btn-success" name="update">Sua</button></a></td>
                        <td><form action="customer.php" method="post" style="display:inline;">
                        <input type="hidden" name="id_dele" value="<?=$row['id_user'] ?>">
                        <input type="hidden" name="name1" value="<?=$row['Name'] ?>">
                        <button type="submit" class="btn btn-danger" name="deleted">Xóa</button>
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