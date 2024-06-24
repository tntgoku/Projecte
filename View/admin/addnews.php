<!-- <?php 

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
?> -->

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
    <script src="../../Vendors/ckeditor/ckeditor.js"  type="text/javascript"></script>
    <script>
        CKEDITOR.replace('content');
    </script>
</head>
<body>
<form class="sidebar" method="post">
        <div class="logo-details">
            <img src="../../img/icon/LogoSecondP.jpg" alt="" width="100px">
            <span class="logo_name">C L O S E T</span>
        </div>
        
        <ul class="nav-link">
            <li>
                <a href="dashboard.php">
                    <img src="../../img/icon/dashboard.png" alt="">
                    <span class="link_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="product.php">
                    <img src="../../img/icon/product-page.png">
                    <span class="link_name">Sản phẩm</span>
                </a>
                
            </li>
            <li>
                <a href="dashboard.php">
                    <img src="../../img/icon/dashboard.png" alt="">
                    <span class="link_name">Hóa đơn</span>
                </a>
            </li>
            <li>
                <a href="dashboard.php">
                    <img src="../../img/icon/dashboard.png" alt="">
                    <span class="link_name">Khách hàng</span>
                </a>
            </li>
            <li>
                <a href="dashboard.php">
                    <img src="../../img/icon/dashboard.png" alt="">
                    <span class="link_name">Quản lý bài viết(news)</span>
                </a>
            </li>
            <li>
                <a href="dashboard.php">
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
		<h2>Quản lý bài viết</h2>
        <div class="btn-add" style=" display: flex; justify-content:flex-start; gap: 30px; margin-left: 5px;">
            <div class="add-newsl" style="margin: 0 15px;">
                <button type="button" class="btn btn-primary">Thêm bài viết mới</button>
            </div>
            <div class="add-news"></div>
        </div>
		<form action="" method="post">
            <form>
                <div class="form-group">
                  <label for="formGroupExampleInput">Tên bài viết</label>
                  <!-- Name này của  news(name) -->
                  <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input" name="Name">
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput2">Loại bài viết: </label>
                  <select name="Type_id" id="">
                    <!-- doan nay thi viet lai truy van
                    <?php 
                    $truyvan=$data->query("select* from news_list");
                    while($row=mysqli_fetch_assoc($truyvan)){
                        ?>
                        <option value="<?php echo $row['Type_id']?>"><?php echo $row['Name_type']?></option>
                        <?php
                    }
                    ?> -->
                    </select>
                </div>
                <div class="form-group" style="display: flex; flex-direction: column;">
                    <label for="formGroupExampleInput" style="margin-bottom: 10px;">Nội dung</label>
                    <!-- Name này của  news(name) -->
                    <textarea name="content" id="content" rows="8" class="form-control"></textarea>
                  </div>
              </form>
		</form>
        <script src="scriptad.js"></script>
    <script>
        CKEDITOR.replace('content');
    </script>
</body>
</html>