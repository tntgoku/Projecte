
<?php 
include '../../App/connect.php';
$data=new Database();
$data->connect();
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Dashboard</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses', 'Profit'],
          ['2014', 1000, 400, 200],
          ['2015', 1170, 460, 250],
          ['2016', 660, 1120, 300],
          ['2017', 1030, 540, 350]
        ]);

        var options = {
          chart: {
            title: 'Company Performance',
            subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
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
                font-weight: 600;"><?=$_SESSION['Name']?></span>
                <div class="icondown" style="cursor: pointer;">
                    <i class="fa-solid fa-chevron-down"></i>
                    <div class="box-user">
                    </div>
                </div>
            </div>
        </nav>
        <div class="home-content">
            <div class="overview" style="display: flex;">
                <div class="box">
                    <div class="box_topic"><span>Doanh thu</span></div>
                    <div class="number" style="font-size: 20px; font-weight: 500; margin-top: 5px;">
                    <?php 
                        $month=6;
                        $sql="select sum(Total_payment) as tong from bill "; //where month(ngtao) ='$month'
                        $toltal=$data->query($sql);
                        $result1=$toltal->fetch_assoc();
                                echo $result1['tong'];
                        ?>
                    </div>
                    <div class="indicator">
                        <i></i>
                        Doanh thu thang <?php echo $month ;?></div>
                </div>
                <div style="display: flex; align-items: center;"><i class="fa-solid fa-cart-shopping cart" style="font-size:35px; height: 50px;  width: 50px; text-align: center;"></i></div>
            </div>
            <div class="overview" style="display: flex;">
                <div class="box">
                    <div class="box_topic"><span>Hoa don</span></div>
                    <div class="number" style="font-size: 35px; font-weight: 500; margin-top: 5px;">
                        <?php
                        $sql="select count(id_Bill) as tong from bill ";//where month(ngtao)= '$month'
                        $truyvan=$data->query($sql);
                        $result= $truyvan->fetch_assoc();
                        echo $result['tong'];
                        ?>
                    </div>
                    <div class="indicator">
                        <i></i>
                        <span>Tong hoa don <?php $month?></span></div>
                </div>
                <div style="display: flex; align-items: center;"><i class="fa-solid fa-cart-shopping cart" style="font-size:35px; height: 50px;  width: 50px; text-align: center;"></i></div>
            </div>
            <div class="overview" style="display: flex;">
                <div class="box">
                    <div class="box_topic"><span>Hoa don</span></div>
                    <div class="number" style="font-size: 35px; font-weight: 500; margin-top: 5px;">
                        <?php 
                        $date="2024-6-17";
                        $sql="select count(*) as tong from bill ";//where ngtao ='$date'
                        $toltal=$data->query($sql);
                        $result=$toltal->fetch_assoc();
                                echo $result['tong'];
                        ?>
                    </div>
                    <div class="indicator">
                        <i></i>
                        <span>hoa don hom nay</span></div>
                </div>
                <div style="display: flex; align-items: center;"><i class="fa-solid fa-cart-shopping cart" style="font-size:35px; height: 50px;  width: 50px; text-align: center;"></i></div>
            </div>
        </div>
        <div id="columnchart_material" style="width: 450px; height: 250px;"></div>
    
        <script>
        </script>
    </div>
<script src="scriptad.js">
</script>
</body>
</html>