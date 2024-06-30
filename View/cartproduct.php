<?php require_once("user_UI_index.php");
date_default_timezone_set('Asia/Ho_Chi_Minh');
$currentDate = date("d/m/Y H:i:s");
echo $currentDate;
if (isset($_POST['payment'])) {
  // Lấy thông tin giỏ hàng từ session
  $cart = $_SESSION['cart'] ?? [];
  $cartshop=new Cart();
  $total=0;$total1=0;
  $sum=0;
  // Hiển thị thông tin đơn hàng
  $id_bill=4;
  foreach ($cart as $key => $product) {
    if($product['Quantity'] != 0){
      $amount = $product['Quantity'];
      $total1+=$amount*$product['Cost'];
      $sum+=$amount;}
      else{
        $product['$Quantity']=1;
      }
  }
  $quantity = $_SESSION['cart'][$key]['Quantity'];
  echo "<br>";
  echo $sum;
  echo "<br>";
  if($id!=''){
    // $cartshop->insertbilltong($id,2,$sum,$total,0,$currentDate);
  }else{
    $id="6";
    // $cartshop->insertbilltong($id,2,$sum,$total,0,$currentDate);
  }

}
if (isset($_POST['product_key'])) {
  $key = $_POST['product_key'];
  unset($_SESSION['cart'][$key]);
  header('Location: cartproduct.php');
  exit();
}

  // Save the updated cart back to session
  if(isset($_SESSION['cart'])==false){
    echo "Bi xoa r";
  }else{
    print_r($cart);

  }
if(isset($_REQUEST['idproduct'])){
  $dd12 =$_REQUEST['idproduct'];

}
if(isset($dd12)){
  $sql1234="Select* FROM product WHERE id_product= $dd12";
  $result=$data->query($sql1234);
  $row=mysqli_fetch_assoc($result);
  print_r($row);
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
      input.btn.btn-success {
        font-weight: 700;
        font-size: 19px;
      } 
      .price{
        font-weight: 700;
        font-size: 19px;
        color:#f81f1f;
      }                                                                              
      .btn-paypal #btn-total123{
        border: none;
        width: 130px;
        text-align: center;
      }
      #btn-total123:focus-visible{
        border: none;
      }
      .product-thumbnail{
        width: 150px;
      }
      .img-item{
        width:150px;
        height: 150px;
        object-fit: contain;
      }
      tbody,thead{
        text-align: center;
      }
      .product-name{
        width: 250px;
      }
      .product-quantity{
        width: 150px;
      }
      .item-quantity{
        width: 150px;
      }
    </style>
    <script>
       function showConfirmation() {
            alert("Bạn đã nhấp vào nút Thanh toán. Dữ liệu sẽ được chuyển đến trang thanhtoan.php.");
        }
    </script>
    </head>
    <body>
      <div class="header-top">
        <div class="topbar-right">
          <!-- ----SEARCH-BOX--- -->
          <div class="search-box">
            <form action="get" enctype="application/x-www-form-urlencoded"  class="search-group">
              <input type="text" name="search" id="search-input" placeholder="Tìm kiếm sản phẩm....">
              <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
                </div>
                <!-- ---LOGIN--- -->
                <div class="login">
                  <a href="login.php" ><label for=""><?=$user_name;?></label> </label><i class="fa-regular fa-user"></i></a>
                  </div>
                  <!-- ---cart-shopping--- -->
                  <div class="cart-shopping">
                    <a href="">
                      <i class="fa-solid fa-cart-shopping"></i>
                      <span class="count_item_pr hidden-count" style="padding-left: 3px;"><?= $sum?></span></a>
                      <div class="top-cart-content">
                          <div class="CartHeaderContainer" style="width: 340px;">
                            <div class="cart--empty--message" style="text-align: center;">
                            <?php   
                                  $count = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
                                  if($count == 0) 
                                  echo '<img src="../img/shopping-bag.png" alt="" width="80px">
                                  <p>Không có sản phẩm nào trong giỏ hàng</p>';        
                                  else{
                                    foreach ($_SESSION['cart'] as $key => $product) {
                                      if (!isset($product['Quantity'])) {
                                        $_SESSION['cart'][$key]['Quantity'] = 0;
                                        $quantity = $_SESSION['cart'][$key]['Quantity'];
                                        $key=1;
                                    }
                                      echo '<div class="productcart">
                                                <div class="header-cart">
                                                  <img src="../img/item/' . $product['img'] . '"name="img" alt="'.'>
                                                "<p id="cont" name="namepro" style="font-size:10px;">' . $product['Name'] . '</p>'.
                                                  '</div>'
                                      ;
                                      echo '
                                      <div class="gop" style="display:flex; flex-direction: column;">
                                      <div class="body-cart">';

                                      echo '<p id="cont" name="color">Màu sắc:<br> ' . $product['Color'] . "/".$product['Size'].'</p>';
                                      echo '<input type="hidden" value="'.$product['id_product'].'name="id">';
                                      echo '<input type="number" class="quantity" id="quantity-' . $key . '" name="quantity[' . $key . ']" min="1" max="55" value="'.$quantity.'" data-cost="' . $product['Cost'] . '
                                      " data-key="' . $key . '">';
                                      echo '
                                              <form method="post" action="cartproduct.php">
                                      <input type="hidden" name="product_key" value="' . $key . '">
  <button type="submit" class="btn btn-primary" style="width:70px;">Xóa</button>
</form>
                                              </div>
                                              ';
                                      echo '
</div>
';
                                      // Thêm các thông tin khác của sản phẩm nếu cần
                                      echo '<style>
                                      .productcart {
                                        display:flex;
                                            align-items: center;
                                      } 
                                      .productcart img{
                                        object-fit:contain;
                                        width:90px;
                                      }
                                      .header-cart #cont{
                                          font-weight:bold;
                                        }
                                        .body-cart{
                                          display: flex;
                                          margin-left:15px;
                                      }
                                      .productcart #cont{
                                      font-size:10px;
                                      }
                                      .productcart #conti{
                                      font-size:10px;
                                      color: #f81f1f;
                                      }
                                      input#quantity-'. $key.'{
                                        height: 25px;
                                        width: 55px;
                                      }
                                      </style>'
                                      .'<script>
                                      document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll(".quantity").forEach(function(input) {
        var cost = parseFloat(input.getAttribute("data-cost"));
        var key = input.getAttribute("data-key");

        input.addEventListener("input", function() {
            var quantity = parseInt(this.value);
            var totalCost = quantity * cost;
            document.getElementById("price-" + key).innerText = totalCost.toLocaleString();
            updateCart(key, quantity); // Function to update cart in session
        });
    });
     document.querySelector(".btn-success").addEventListener("click", function(event) {
             event.preventDefault(); // Prevent default form submission
             document.querySelector("form").submit(); // Submit the form
         });
});

function updateCart(key, quantity) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "cartproduct.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("key=" + key + "&quantity=" + quantity);
}
   document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("cartLink").addEventListener("click", function(event) {
        event.preventDefault(); // Prevent default action
        document.getElementById("cartForm").submit(); 
    })
});
                                      </script>'
                                      ;
                                      echo '</div>';
                                  }
                                  echo '<form method="post" action="thanhtoan.php" style="float:right";>
                                      <input type="hidden" name="product_key" value="' . $key . '">
  <input type="submit" class="btn btn-success" name="payment"style="width:120px;float:right;" value="Thanh Toán">
</form>';
                                  
                                  }   
									  ?>
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
          <li><a href="index.php">TRANG CHỦ</a></li>
          <li><a href="change.html">CHÍNH SÁCH ĐỔI TRẢ</a></li>
          <li><a href="index.php">
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
      <div class="row md-5" style=" display: flex;
    flex-direction: column;">
    <div class="site-blocks-table">
        <table class="table">
            <thead>
                <tr>
                    <th class="product-thumbnail">Sản Phẩm</th>
                    <th class="product-name">Tên Sản Phẩm</th>
                    <th class="product-size">Size</th>
                    <th class="product-color">Màu sắc</th>
                    <th class="product-price">Giá</th>
                    <th class="product-quantity">Số Lượng</th>
                    <th class="product-total">Tổng</th>
                    <th class="product-remove">Thao tác</th>
                  </th>
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
                    echo '<td class="img-item"><img src="../img/item/' . $item["img"] . '" alt="Image" class="img-fluid" style="max-width: 220px; height:100px;"></td>';
                    echo '<td class=""><h2 class="h5 text-black">' . $item["Name"] . '</h2></td>';
                    echo '
                    <td>' . $item["Size"] . '</td>
                    <td>' . $item["Color"] . '</td>
                    <td>' . $item["Cost"] . '</td>
                    ';
                    echo '<td>
                            <div class="input-group mb-3 d-flex align-items-center quantity-container" style="">
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-black decrease" type="button">−</button>
                                </div>
                                <input type="text" class="form-control text-center item-quantity" value="' . $item["Quantity"] . '" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-black increase" type="button">+</button>
                                </div>
                            </div>
                          </td>';
                          $total= $item['Quantity']*$item['Cost'];
                          echo '<td>' . $total . '</td>';
                    echo '<td>
                    <form method="post" action="cartproduct.php">
                    <button type="submit" class="btn btn-black btn-sm remove_item" name="remove_item" value="' . $item["id_product"] . '">
                    <i class="fa fa-trash"></i></button></form></td>';
                    echo '</tr>';
                }
              }} else{
                foreach ($_SESSION['cart'] as $key => $item) {
                  $_SESSION['cart'][$key]['Quantity'] = 1; 
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
                      $total= $item['Quantity']*$item['Cost'];
                      $tong122+=$total;
                      echo '<td>' . $total . '</td>';
                echo '<td>
                <form method="post" action="cartproduct.php">
                <input type="hidden" name="product_key" value="' . $key . '">
                <button type="submit" class="btn btn-black btn-sm remove_item"  value="' . $item["id_product"] . '">
                <i class="fa fa-trash"></i></button></form></td>';
                echo '</tr>';
            }
              }
                ?>
                <script>
                </script>
            </tbody>
        </table>
    </div>
    <?php $tong12=(isset($total1)&& ($total1>0)) ? $total1 : $total1=0;
          
    ?>
    <div class="btn-paypal" style=" display:flex;justify-content: flex-end; text-align:center;">
      <form action="thanhtoan.php?sum=<?= $sum?>" method="post" enctype="application/x-www-form-urlencoded" style=" display:flex;">
      <input type="hidden" name="total12" id="" value="<?= $tong12?>" readonly>
        <div class="price"><?= $tong12?></div><div class="price" style="margin-left:5px;">VNĐ</div>
            <input type="submit" name="thanhtoan" class="btn btn-success" value="Thanh toán" style="margin-left:15px;"
              onclick="showConfirmation() "
            >
        </form>
    </div>
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
    <script type="text/javascript" src="/ js/script.js" ></script>
<script src="../js/jquery-3.5.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js">

  
</script>

  
</body>
</html>