
<?php 
include '/xampp/htdocs/Projecte/App/connect.php';
$data=new Database();
$data->connect();

    // Display form to edit product details
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
                    <span class="link_name">Quản lý bài viết(news)</span>
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
           <div class="container">
           <div class="card-header">
                    <h2>Thay đổi thông tin sản phẩm</h2>
                </div>
           <form action="process_update.php" method="post">
                    <div class="form-group" style="margin-top: 10px;">
                        <label for="">Mã sản phẩm</label>
                        <input type="text" name="id_product">
                    </div>
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
                        <input type="text" name="img">
                    </div>
                <!-- Add other fields as needed -->
                <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
            </form>
           </div>
        </div>
    
        <script>
        </script>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script scr="scriptad.js"></script>
</body>
</html>