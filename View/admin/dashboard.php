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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
          google.charts.load('current', {'packages':['corechart', 'bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {

        var button = document.getElementById('change-chart');
        var chartDiv = document.getElementById('chart_div');
        <?php 
        $sql="select date,sum(Total) as tong from bill group by date ORDER BY `bill`.`date` ASC";
        $result=$data->query($sql);

        ?>
        var data = google.visualization.arrayToDataTable([
          ['Doanh thu từng ngày trong tháng 6', 'Doanh thu'],
          <?php 
          while($row=mysqli_fetch_assoc($result)){
          ?>
          ['<?= $row['date']?>',<?= $row['tong']?>],
        <?php
    }?>
        ]);

        var materialOptions = {
          width: 950,
          chart: {
            title: 'Hieuuuu1',
            subtitle: 'Hieuuuu1'
          },
          series: {
            0: { axis: 'distance' }, // Bind series 0 to an axis named 'distance'.
            1: { axis: 'brightness' } // Bind series 1 to an axis named 'brightness'.
          },
          axes: {
            y: {
              distance: {label: 'Việt Nam Đồng'}, // Left y-axis.
              brightness: {side: 'right', label: 'apparent magnitude'} // Right y-axis.
            }
          }
        };

        var classicOptions = {
          width: 450,
          series: {
            0: {targetAxisIndex: 0},
            1: {targetAxisIndex: 1}
          },
          title: 'Nearby galaxies - distance on the left, brightness on the right',
          vAxes: {
            // Adds titles to each axis.
            0: {title: 'parsecs'},
            1: {title: 'apparent magnitude'}
          }
        };

        function drawMaterialChart() {
          var materialChart = new google.charts.Bar(chartDiv);
          materialChart.draw(data, google.charts.Bar.convertOptions(materialOptions));
          button.innerText = 'Change to Classic';
          button.onclick = drawClassicChart;
        }

        function drawClassicChart() {
          var classicChart = new google.visualization.ColumnChart(chartDiv);
          classicChart.draw(data, classicOptions);
          button.innerText = 'Change to Material';
          button.onclick = drawMaterialChart;
        }

        drawMaterialChart();
    };
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
                        $sql="select sum(Total) as tong from bill "; //where month(ngtao) ='$month'
                        $date = getdate();
                        $month=$date["mon"];
                        $sql="select sum(Total) as tong from bill where month(date) ='$month' and status = 1";
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
                        $sql="select count(id_Bill) as tong from bill where month(date) ='$month'";
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
                        $date_hn = $date["mday"] . '-' . $date['mon'] . '-' . $date['year'];
                        $sql="select count(*) as tong from bill where date ='$date_hn'";
                        $toltal=$data->query($sql);
                        $result=$toltal->fetch_assoc();
                                echo $result['tong'];
                        ?>
                    </div>
                    <div class="indicator">
                        <i></i>
                        <span>Hoa don hom nay</span></div>
                </div>
                <div style="display: flex; align-items: center;"><i class="fa-solid fa-cart-shopping cart" style="font-size:35px; height: 50px;  width: 50px; text-align: center;"></i></div>
            </div>
        </div>
        <div class="bieudo" style="margin-left:30px;">
        <div id="chart_div" style="width: 450px; height: 400px;"></div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            const ctx = document.getElementById('myChart123');

new Chart(ctx, {
type: 'bar',
data: {
labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
datasets: [{
  label: '# of Votes',
  data: [12, 19, 3, 5, 2, 3],
  borderWidth: 1
}]
},
options: {
scales: {
  y: {
    beginAtZero: true
  }
}
}
});

        </script>
    </div>
<script src="scriptad.js">
</script>
</body>
</html>