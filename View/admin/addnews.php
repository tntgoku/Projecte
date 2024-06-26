 <?php 

include "../../App/connect.php";
$data=new Database();
$data->connect();
if (isset($_REQUEST["id_News"]))
{
    $tittle = "Sửa bài viết";
    $id = $_REQUEST["id_News"]; 
    $sql = "SELECT * from news where id_News = '$id'";
    $row = mysqli_fetch_assoc($data->query($sql));
    $name = $row["Name"];
    $type = $row["Type_id"];
    $content = $row["Content"];
}
else 
{
    $tittle = "Thêm bài viết";
    $id ="";
    $name = "";
    $type = "";
    $content = "";
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
            <form action="process_update_new.php?id_news=<?php echo $id;?>" method="post">
            <div class="btn-add" style=" display: flex; justify-content:flex-start; gap: 30px; margin-left: 5px;">
            <div class="add-newsl" style="margin: 0 15px;">
                <button type="submit" class="btn btn-primary"><?php echo $tittle;?></button>
            </div>
            <div class="add-news"></div>
        </div>
                <div class="form-group">
                  <label for="formGroupExampleInput">Tên bài viết</label>
                  <!-- Name này của  news(name) -->
                  <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input" name="Name" value = "<?php echo $name;?>">
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput2">Loại bài viết: </label>
                  <select name="Type_id" id="">
                    <?php 
                    $truyvan=$data->query("select * from news_list");
                    while($row=mysqli_fetch_assoc($truyvan)){
                        $select = $row["Type_id"] == $type ? "selected" :"";
                        ?>
                        
                        <option value="<?php echo $row['Type_id']?>" <?php echo $select;?>><?php echo $row['Name_type']?></option>
                        <?php
                    }
                    ?> 
                    </select>
                </div>
                <div class="form-group" style="display: flex; flex-direction: column;">
                    <label for="formGroupExampleInput" style="margin-bottom: 10px;">Nội dung</label>
                    <!-- Name này của  news(name) -->
                    <textarea name="content" id="content" rows="8" class="form-control" ><?php echo $content;?></textarea>
                  </div>
              </form>
        <script src="scriptad.js"></script>
    <script>
        CKEDITOR.replace('content');
    </script>
</body>
</html>