<?php require_once("user_UI_index.php");
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Check if it's a checkout request
  if (isset($_POST['checkout'])) {
      // Handle checkout logic here, such as redirecting to payment gateway or processing the order
      // For demonstration, let's assume you want to display the cart items after checkout
      echo "<h1>Order Summary</h1>";
      foreach ($_SESSION['cart'] as $key => $product) {
          $quantity = isset($_POST['quantity'][$key]) ? $_POST['quantity'][$key] : $product['Quantity'];
          echo "<p>Product: " . $product['Name'] . ", Quantity: " . $quantity . "</p>";
      }
      // You can perform additional processing here, such as updating database, sending confirmation emails, etc.
      exit; // Stop further execution after displaying order summary
  }

  // Check if it's a delete request
  if (isset($_POST['product_key'])) {
      $keyToDelete = $_POST['product_key'];
      unset($_SESSION['cart'][$keyToDelete]); // Remove product from cart based on product key
      // Optionally, you can redirect back to the cart page or refresh the current page
  }
}
// Assume $data is your database connection
$id = isset($_SESSION['user_id']); // Assuming user ID is stored in session
print_r($id); 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Update the session cart quantities based on POST data
    if (isset($_POST['quantity']) && is_array($_POST['quantity'])) {
        foreach ($_POST['quantity'] as $key => $quantity) {
            if (isset($_SESSION['cart'][$key])) {
                $_SESSION['cart'][$key]['Quantity'] = $quantity;
            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/reponse.css">
    <title>CloSet</title>
    <style>
      .product-thumbnail{
        width: 250px;
      }
    </style>
    </head>
    <body>
      <div class="header-top">
        <div class="topbar-right">
          <!-- ----SEARCH-BOX--- -->
          <div class="search-box">
            <form action="get" enctype="application/x-www-form-urlencoded">
              <input type="text" name="search" id="search-input" placeholder="Tìm kiếm sản phẩm....">
              <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
                </div>
                <!-- ---LOGIN--- -->
                <div class="login">
                  <a href="login.php" ><label for=""><?php echo  $user_name;?></label> </label><i class="fa-regular fa-user"></i></a>
                  </div>
                  <!-- ---cart-shopping--- -->
                  <div class="cart-shopping">
                    <a href="">
                      <i class="fa-solid fa-cart-shopping"></i>
                      <span class="count_item_pr hidden-count" style="padding-left: 3px;"><?php echo $count_sp;?></span></a>
                      <div class="top-cart-content">
                          <div class="CartHeaderContainer" style="width: 340px;">
                            <div class="cart--empty--message" style="text-align: center;">
                                  <img src="../img/shopping-bag.png" alt="" width="80px">
                                  <p><?php // Them UI vao ho nha
									  if ($id !="-1")
									  {
									   while ($row_sp = mysqli_fetch_assoc($sp) )
									   {
										   echo $row_sp["Name"]."\\";
										   echo $row_sp["Color"]."\\";
										   echo $row_sp["Size"]."\\";
										   echo $row_sp["Cost"] * $row_sp["amount"]."K<br>";
									   }
									  }
									  if($count_sp == '0') 
										  echo "Không có sản phẩm nào trong giỏ hàng";
									  ?></p>
                                  </div>  
                                  </div>
                                  </div>
                                  </div>
                                  </div>
      </div>
                                  
                                  <!-- header-nav -->
      <nav class="header-nav container">
      <h1>C L O S E T</h1>
        <ul class="nav-list">
          <li><a href="index1.php">TRANG CHỦ</a></li>
          <li><a href="change.html">CHÍNH SÁCH ĐỔI TRẢ</a></li>
          <li><a href="index1.php">
            <img src="../img/icon/LogoSecondP.jpg" alt="" width="100px"></a></li>
            <li><a href="size.html">BẢNG SIZE</a></li>
            <li><a href="store.html">HỆ THỐNG CỬA HÀNG</a></li>
        </ul>
        <div class="close-menu ">
          <div class="title d-lg-none d-block">MENU</div>
          <div class="menu-slider">
              <ul>
                <li><a href="allproducts.php">Tất cả sản phẩm</a></li>
                <li><a href="">Áo Thun</a></li>
                <li><a href="">Baby Tee</a></li>
                <li><a href="">Áo Polo</a></li>
                <li><a href="">Áo Sơ Mi</a></li>
                <li><a href="">Áo Khoác</a></li>
                <li><a href="">Hoodie</a></li>
                </ul>
          </div>
        </div>  
        
      </nav>
    <div class="container">
      <div class="row md-5">
      <form class="col-md-12" method="post">
    <div class="site-blocks-table">
        <table class="table">
            <thead>
                <tr>
                    <th class="product-thumbnail">Sản Phẩm</th>
                    <th class="product-name">Tên Sản Phẩm</th>
                    <th class="product-price">Giá</th>
                    <th class="product-quantity">Số Lượng</th>
                    <th class="product-total">Tổng</th>
                    <th class="product-remove">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php
               if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['payment'])) {
                   // Lấy dữ liệu giỏ hàng từ session
                   $cart = $_SESSION['cart'] ?? [];
                   if (!empty($cart)) {
                    $total=0;

                    foreach ($cart as $item) {
                    echo '<tr>';
                    echo '<td class="product-thumbnail"><img src="../img/item/' . $item["img"] . '" alt="Image" class="img-fluid" style="max-width: 200px;"></td>';
                    echo '<td class="product-name"><h2 class="h5 text-black">' . $item["Name"] . '</h2></td>';
                    echo '<td>' . $item["Cost"] . '</td>';
                    echo '<td>
                            <div class="input-group mb-3 d-flex align-items-center quantity-container" style="max-width: 120px;">
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-black decrease" type="button">−</button>
                                </div>
                                <input type="text" class="form-control text-center quantity-amount" value="' . $item["Quantity"] . '" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-black increase" type="button">+</button>
                                </div>
                            </div>
                          </td>';
                          $total+= $item['Quantity']*$item['Cost'];
                          echo '<td>' . $total . '</td>';
                    echo '<td><a href="#" class="btn btn-black btn-sm"><i class="fa fa-trash"></i></a></td>';
                    echo '</tr>';
                }
              }}

                ?>
            </tbody>
        </table>
    </div>
    <div class="btn-paypal" style="margin: auto; float: right;">
        <a href="thanhtoan.php" class="btn btn-success">
            <button type="button" class="btn btn-success">Thanh toán</button>
        </a>
    </div>
</form>
      </div>
    </div>
    
    <!-- FooTer  -->
    <footer>
        <div class="container-xl">
          <div class="row"> 
            <div class="col-sm">
              <h3>C L O S E T</h3>
              <ul>
                <li><p>Địa chỉ: Số 54, Triều Khúc, Thanh Xuân, Hà Nội</p></li>
                <li><p>Email: nguyenthutrang2762004@gmail.com</p></li>
                <li><p>Hotline: 0382572004 </p></li>
                <li>123</li>
                </ul>
                </div>
                <div class="col-md">
                  <h3>Đăng ký</h3>
                  <ul>
                    <li>
                      <div class="register-email">
                        <form action="get" enctype="application/x-www-form-urlencoded">
                          <input type="email" name="search" id="search-input" placeholder="Nhập địa chỉ Email....">
                          <button type="submit"><i class="fa-solid fa-paper-plane"></i></button>
                          </form>
                          </div></li>
                          <li><p>Theo dõi C L O S E T từ các nền tảng khác nhau nhé!</p></li>
                          <li>
                            <ul class="icon-logo">
                              <li>
                                <a href="https://www.facebook.com/profile.php?id=100013900096508" title="Facebook">
                                  <img src="../img/icon/facebook.png" alt=""></a></li>
                                  <li>
                                    <a href="" title="Instagram">
                                      <img src="../img/icon/instagram.png" alt=""></a></li>
                            <li><a href="https://gmail.com/" title="Messenger"><img src="../img/icon/messenger.png" alt=""></a></li>
                            <li><a href="https://www.tiktok.com/foryou?lang=vi-VN" title="Tiktok"><img src="../img/icon/tik-tok.png" alt=""></a></li>
                          </ul>
                          </li>
                    </ul>
                    </div>
                <div class="col-sm">
                    <h3>ABOUT US</h3>
                    <ul>
                      <li><a href="https://www.facebook.com/profile.php?id=100013900096508" title="Facebook">Trang chủ</a></li>
                      <li><a href="" title="Instagram">Tất cả sản phẩm</a></li>
                      <li><a href="" title="Messenger">Bảng size</a></li>
                      <li><a href="" title="Tiktok">Hệ thống cửa hàng</a></li>
                      </ul>
                      </div>
                      <div class="col-sm">
                        <h3>CHÍNH SÁCH</h3>
                        <ul>
                          <li><a href="https://www.facebook.com/profile.php?id=100013900096508" title="Facebook">Chính sách mua hàng</a></li>
                          <li><a href="" title="Instagram">Chính sách bảo mật</a></li>
                          <li><a href="" title="Messenger">Phương thức thanh toán</a></li>
                          <li><a href="" title="Tiktok">Chính sách đổi trả</a></li>
                          </ul>
                          </div>
                          </div>
                          <div class="coppyright" >
                            © Copyright 2024 
                            <a href="https://github.com/tntgoku/jessica.github.io" title="Bản quyền thuộc về tntgoku">Jessica</a>. All right reserved
                            </div>
                            <br>
                            <p>Sản phẩm này không phải là thuốc không có tác dụng thay thế thuốc chữa bệnh</p>
                            </div>
    </footer>
<script src="../js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>

  </body>
</html>