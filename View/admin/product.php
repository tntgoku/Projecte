<?php 
include '/xampp/htdocs/Projecte/App/connect.php';
$data=new Database();
$data->connect();
if(isset($_POST['btn-addpro'])){
    header("Location:add.php");
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
    <form class="sidebar" method="post">
        <div class="logo-details">
            <img src="/img/icon/LogoSecondP.jpg" alt="" width="100px">
            <span class="logo_name">C L O S E T</span>
        </div>
        
        <ul class="nav-link">
            <li>
                <a href="dashboard.html">
                    <img src="/img/icon/dashboard.png" alt="">
                    <span class="link_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="product.php">
                    <img src="/img/icon/product-page.png">
                    <span class="link_name">Sản phẩm</span>
                </a>
                
            </li>
            <li>
                <a href="dashboard.html">
                    <img src="/img/icon/dashboard.png" alt="">
                    <span class="link_name">Hóa đơn</span>
                </a>
            </li>
            <li>
                <a href="dashboard.html">
                    <img src="/img/icon/dashboard.png" alt="">
                    <span class="link_name">Khách hàng</span>
                </a>
            </li>
            <li>
                <a href="dashboard.html">
                    <img src="/img/icon/dashboard.png" alt="">
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
        <h2>DANH SÁCH SẢN PHẨM</h2><br>
        <div class="container" style="display: flex; justify-content: space-between; margin-bottom: 10px;">
            <div class="col-6" style="display: flex;  justify-content: flex-start;">
    
                <form class="d-flex" role="search" style="width: 100%;">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                  </form>
    
            </div>
            <div class="col-6" style="display: flex; justify-content: space-around;">
                <?php   $toltal=$data->query('select count(*) as tong from SANPHAM ');
                $result=$toltal->fetch_assoc();
                        echo "<h5> Có " .$result["tong"] ." Sản phẩm</h5> ";
                ?>
            </div>

        </div>
        <form action="" method="post" style=" margin-top:10px;">
            <button type="submit" class="btn btn-success" name="btn-addpr">Thêm sản phẩm</button>
            <table class="table">
                <thead> <tr>
                    <td>MASP</td>
                    <td>TENSP</td>
                    <td>DVT</td>
                    <td>GIA</td>
                    <td>NUOCSX</td>
                    <td>Sua</td>
                    <td>Xoa</td>
                </tr></thead>
                <tbody>
                    <?php 
                    $i=1;
                    $sql="SELECT sanpham.MASP, sanpham.TENSP, sanpham.DVT, sanpham.GIA,catelog.NUOCSX FROM sanpham 
                    inner JOIN catelog ON catelog.idcata =sanpham.idcate ORDER BY sanpham.idcate ASC";
                    $result=$data->query($sql);
                        while($row =mysqli_fetch_assoc($result)){?>
                            <tr>
                                <td><?php echo $i++?></td>
                                <td><?php echo $row['MASP']?></td>
                                <td><?php echo $row['TENSP']?></td>
                                <td><?php echo $row['DVT']?></td>
                                <td><?php echo $row['GIA']?></td>
                                <td><?PHP echo $row['NUOCSX'] ?></td>
                                <td><a href="update.php?masp<?php echo $row['MASP']?>"><button type="button" class="btn btn-success">Sua</button></a></td>
                                <td><button type="button" class="btn btn-danger">Xoa</button></td>
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