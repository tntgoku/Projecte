<?php require_once("user_UI_index.php");?>
<?php
$data = new Database();
$data->connect();
$productdb=new Product();
//echo $currentDate ;
//Phần này hiển thị sản phẩm theo loại nhá
if(isset($_REQUEST['id_type']))
{
  $id = $_REQUEST['id_type'];
  $tittle = mysqli_fetch_assoc($data->query("SELECT * from product_list Where Type_id = '$id'"));
  $product_type = array();
  $result = $data->query("SELECT * from product where Type_id = '$id'");
  if($result->num_rows > 0)
  {
    while ($row = $result->fetch_assoc())
    {
      $product_type[] = $row;
    }
  }
  $_SESSION['products'] = $product_type;
}
else{
  $sql= "SELECT * FROM product";
  $result=$data->query($sql);
  $product=array();
  if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
      $products[] = $row;
    }
  }
  $_SESSION['products'] = $products;
  $tittle['Type_name'] = 'Tất cả sản phẩm';
}
//

 
  $cartProducts = array();
  $totalQuantity = 0;

  //Thêm session['cart']
  $id_us = $_SESSION['id_user'];
  $sql = "SELECT cart.id_sp, product.Name, product.Size,product.Color,product.img,product.id_product,product.Cost,cart.amount from cart inner join product ON product.id_product = cart.id_sp where cart.id_us = '$id_us'";
  $result = $data->query($sql);
  while($row = $result->fetch_assoc())
  {
    $cartProducts[] = $row;
  }
  $_SESSION['cart'] = $cartProducts;

  // --- daon nay ne----
  foreach ($_SESSION['cart'] as $key => $product) {
    // Ensure Quantity is set and numeric
    if (!isset($product['Quantity']) || !is_numeric($product['Quantity'])) {
        $_SESSION['cart'][$key]['Quantity'] = 1; 
    }
    $quantity = $_SESSION['cart'][$key]['Quantity'];
    $totalQuantity += $quantity; }

    function addToCart($productId, &$cartProducts) {
      global $data; // Assuming $data is your Database object
      $productdb=new Product();
      // Query the database for the product
      $cartProducts=$productdb->getinforProduct($productId);
          
          // Check if product already exists in cart
          $found = false;
          foreach ($cartProducts as $key => $product) {
              if ($product['id_product'] == $productId) {
                  // Product already exists in cart, increase quantity
                  $_SESSION['cart'][$key]['Quantity']++;
                  $found = true;
                  break;
              }
          }
          // If not found, add new product to cart with initial quantity 1
          if (!$found) {
              $row['Quantity'] = 1; // Set initial quantity
              $cartProducts[] = $row; // Add product to cart
          }
      }
      
      // Initialize or process any additional session data related to cart shopping
      //session_start();
      if (!isset($_SESSION['cartshopping'])) {
          $_SESSION['cartshopping'] = []; // Initialize cartshopping if not set
      }
      
      // Handle payment processing if triggered by a form submission
      if (isset($_POST['payment']) && ($_POST['payment'])) {
          // Your payment handling logic goes here
          // This block will execute if the 'payment' form field is submitted
      }
  
  
  if (isset($_REQUEST['idproduct'])) {
      if (is_array($_REQUEST['idproduct'])) {
          foreach ($_REQUEST['idproduct'] as $productId) {
              addToCart($productId, $_SESSION['cart']);
          }
      } else {
          $productId = $_REQUEST['idproduct'];
          addToCart($productId, $_SESSION['cart']);
      }
  }
  // echo "du lieu cart <br>";
  if (isset($_POST['key']) && isset($_POST['quantity'])) {
    $key = $_POST['key'];
    $quantity = $_POST['quantity'];

    if (isset($_SESSION['cart'][$key])) {
        $_SESSION['cart'][$key]['Quantity'] = $quantity;
    }
}
if (isset($_POST['product_key'])) {
  $key = $_POST['product_key'];
  unset($_SESSION['cart'][$key]);
  header('Location: index.php');
  exit();
}
//dua vao gio hang
  // if($_SERVER['REQUEST_METHOD']=='POST'){
  //   $quantity12=1;
  //   $result=$productdb->getinforProduct($_POST['idproduct']);
  //   $new_product=array(array('id'=>$result[0]['id_product'],
  //                             'Name'=>$result[0]['Name'],'Type_id'=>$result[0]['Type_id'],'Color'=>$result[0]['Color'],
  //                             'Size'=>$result[0]['Size'],'Cost'=>$result[0]['Cost'],'Amount1'=>$quantity12,
  //                             'Amount'=>$result[0]['Amount'],'Discount'=>$result[0]['Discount'],'img'=>$result[0]['img']
  // ));
  // if(isset($_SESSION['cart'])){
  //   $found=false;
  //   foreach($_SESSION['cart'] as $item){
  //     if($item['id']==$_POST['idproduct']){
  //       $productnew[]=array('id'=>$result[0]['id_product'],
  //                             'Name'=>$result[0]['Name'],'Type_id'=>$result[0]['Type_id'],'Color'=>$result[0]['Color'],
  //                             'Size'=>$result[0]['Size'],'Cost'=>$result[0]['Cost'],'Amount1'=>$quantity12+1,
  //                             'Amount'=>$result[0]['Amount'],'Discount'=>$result[0]['Discount'],'img'=>$result[0]['img']);
  //                             $found=true;
  //     }else{
  //       $productnew[]=array('id'=>$result[0]['id_product'],
  //                             'Name'=>$result[0]['Name'],'Type_id'=>$result[0]['Type_id'],'Color'=>$result[0]['Color'],
  //                             'Size'=>$result[0]['Size'],'Cost'=>$result[0]['Cost'],'Amount1'=>$quantity12,
  //                             'Amount'=>$result[0]['Amount'],'Discount'=>$result[0]['Discount'],'img'=>$result[0]['img']);
  //     }
  //   }
  //   if($found==false){
  //     $_SESSION['cart']=array_merge($product,$new_product);
  //   }else{
  //     $_SESSION['cart']=$product;
  //   }
  // }
  //                           }
  //                           echo "<pre>";
  //                           var_dump($new_product);
  //                           echo "</pre>";
  //                           if(isset($_POST['buy-cart12'])){
  //                             echo "<br> addd; <br>";
  //                           }else{
  //                             echo "<br> addd;111212 <br>";

  //                           }
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
      .hidden {
    display: none;
}

#box {
    width: 160px;
    height: 120px;
    position: absolute;
    border: 1px solid #9ae6e2;
    display: none;
    border-radius: 5px;
    z-index: 456;
    background-color: #9dd8d5;
}
.login:hover #box{
    display: block;
}
.login {
    margin-bottom: 20px;
}
.header-top .login{
    margin-left: 3%;
    margin-top: 16%;
    width: 100%;
    position: relative;
}

#list-itema{
    margin-left: 17px;
    list-style: none;
}
#list-itema #itema{
    margin-top: 9px;
}
#list-itema #itema:hover a{
    color: #126964;
}

    </style>
    </head>
    <body>
      <div class="header-top">
        <div class="topbar-right">
          <!-- ----SEARCH-BOX--- -->
          <div class="search-box">
            <form action="get" enctype="application/x-www-form-urlencoded" class="search-group">
              <input type="text" name="search" id="search-input" placeholder="Tìm kiếm sản phẩm....">
              <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
                </div>
                <!-- ---LOGIN--- -->
                <div class="./View/" style="margin-top: 6px;">
                    <?php 
                            if(isset($_SESSION['Name']) && ($_SESSION['Name'] !='') ){ echo'<div class="login">
                      <label for="">'.$_SESSION['Name'].'<a href="Projecte/View/User/changuser.php"> 
                          <i class="fa-regular fa-user" style="margin-top: 5px; margin-left:8px;"></i></a>
                      </label>
                      <div id="box">
                          <ul id="list-itema">
                              <li id="itema"><a href="../View/User/changuser.php">Tài khoản của tôi</a></li>
                              <li id="itema"><a href="">Lịch sử đơn hàng</a></li>
                              <li id="itema"><a href="logout.php">Đăng xuất</a></li> <!-- Thêm link đăng xuất -->
                          </ul>
                      </div></div>';?>
                  <?php }else{ 
                    echo '
                    <div class="login">
                      <label for=""><a href="Login_Resign.php">Đăng nhập<i class="fa-regular fa-user" style="margin-top: 5px; margin-left:8px;"></i></a></label>
                    </div>';
                   } ?>
              </div>
                  </a>
                  </div>
                  <!-- ---cart-shopping--- -->
                  <div class="cart-shopping">
                    <a href="cartproduct.php" id="cartLink">
                      <i class="fa-solid fa-cart-shopping"></i>
                      <span class="count_item_pr hidden-count" style="padding-left:  3px;"><?php echo $totalQuantity;?></span></a>
                      <div class="top-cart-content">
                          <div class="CartHeaderContainer" style="width: 440px;">
                            <div class="cart--empty--message" style="text-align: center;">
                                <?php   
                                  // Them UI vao ho nha
                                  $count = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
                                  if($count == 0) 
                                  echo '<img src="../img/shopping-bag.png" alt="" width="80px">
                                  <p>Không có sản phẩm nào trong giỏ hàng</p>
                                  <form method="post" action="index.php" id="btn-check123">';        
                                  else{
                                    foreach ($_SESSION['cart'] as $key => $product) {
                                      if(empty($quantity)){
                                        $quantity=1;
                                      }
                                      if (!isset($product['Quantity'])) {
                                        $_SESSION['cart'][$key]['Quantity'] = 0;
                                        $quantity = $_SESSION['cart'][$key]['Quantity'];
                                        $key=1;
                                    }
                                      echo '<div class="productcart">
                                                <div class="header-cart">
                                                  <img src="../img/item/' . $product['img'] . '"name="img" alt="'.'>';
                                                  echo '
                                                  <p id="cont" >'.$product['Name'].'</p>'.
                                                  '</div>'
                                      ;
                                      echo '
                                      <div class="gop" style="display:flex; flex-direction: column;">
                                      <div class="body-cart">';

                                      echo '<p id="cont" name="color">Màu sắc:<br> ' . $product['Color'] . "/".$product['Size'].'</p>';
                                      echo '<input type="number" class="quantity" id="quantity-' . $key . '" name="quantity[' . $key . ']" min="1" max="55" value="'.$quantity.'" data-cost="' . $product['Cost'] . '
                                      " data-key="' . $key . '">';
                                      echo '<p id="conti">Giá: <span class="price" id="price-' . $key . '" style="color:#f81f1f;">' . 
                                              $product['Cost'] . '</span> đ</p>
                                              
                                              
                                                <input type="hidden" name="product_key" value="' . $key . '">
                                                <button type="submit" class="btn btn-primary" style="width:70px;">Xóa</button>
                                              
                                              </div>
                                              ';
                                      echo '
</div>
';
                                      // Thêm các thông tin khác của sản phẩm nếu cần
                                      echo '<style>
                                      .header-cart{
                                          width: 30%;
    display: flex;
    align-items: center;
    flex-direction: column;
                                      }
                                      .productcart {
                                        display:flex;
                                            align-items: center;
                                            justify-content: space-between;

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
                                      margin: 0 5px;
                                      font-size: 15px;
                                      color: #f81f1f;
                                      }
                                      input#quantity-'. $key.'{
                                        margin: 0 3px;
                                        text-align: center;
                                        height: 25px;
                                        width: 55px;
                                      }
                                        #btn123{
                                      
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
    // document.querySelector(".btn-success").addEventListener("click", function(event) {
    //         event.preventDefault(); // Prevent default form submission
    //         document.querySelector("form").submit(); // Submit the form
    //     });
});

function updateCart(key, quantity) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "index.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("key=" + key + "&quantity=" + quantity);
}
   document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("cartLink").addEventListener("click", function(event) {
        event.preventDefault(); // Prevent default action
        document.getElementById("cartForm").submit(); // Submit the form
    })
});
                                      </script>'
                                      ;
                                      echo '</div>
                                      </form>';
                                  }
                                  echo '<form method="post" action="cartproduct.php" style="float:right";>
                                      <input type="hidden" name="product_key1" value="' . $key . '">
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
          <li><a href="./change.php">CHÍNH SÁCH ĐỔI TRẢ</a></li>
          <li><a href="./index.php">
            <img src="../img/icon/LogoSecondP.jpg" alt="" width="100px"></a></li>
            <li><a href="size.php">BẢNG SIZE</a></li>
            <li><a href="store.php">HỆ THỐNG CỬA HÀNG</a></li>
        </ul>
        <div class="close-menu ">
          <div class="title d-lg-none d-block">MENU</div>
          <div class="menu-slider">
              <ul>
              <li><a href="index.php">Tất cả sản phẩm</a></li>
                <li><a href="index.php?id_type=1">Áo Thun</a></li>
                <li><a href="index.php?id_type=2">Baby Tee</a></li>
                <li><a href="index.php?id_type=3">Áo Polo</a></li>
                <li><a href="index.php?id_type=4">Áo Sơ Mi</a></li>
                <li><a href="index.php?id_type=5">Áo Khoác</a></li>
                <li><a href="index.php?id_type=6">Hoodie</a></li>
                </ul>
          </div>
        </div>  
      </nav>
      <section class="container">
        <div class="col">
            <h2 class="head-title">Chính sách đổi trả</h2>
            <div class="content-page">
                <!-- 1.. -->
                <p>
                    <span style="font-size:14px;">
                    <span style="font-family:Tahoma,Geneva,sans-serif;">
                    <strong>1. CHÍNH SÁCH ĐỔI SẢN PHẨM</strong>
                    </span>
                    </span>
                </p>
                <p>
                    <span>
                        a. Đổi size
                    </span>
                    <span>
                        – Áp dụng 01 lần đổi /1 đơn hàng với các đơn hàng mua online và các đơn hàng mua tại cửa hàng.
                    </span>
                    <span>
                        – Sản phẩm đổi trong thời gian 3 ngày kể từ ngày mua hàng trên hoá đơn (đối với khách mua hàng trực tiếp tại cửa hàng), 3 ngày kể từ ngày nhận hàng (Đối với khách mua online)
                    </span>
                    <span>
                        – Sản phẩm còn mới nguyên tem, tags và mang theo hoá đơn mua hàng, sản phẩm chưa giặt và không dơ bẩn, hư hỏng bởi những tác nhân bên ngoài cửa hàng sau khi mua hàng.
                    </span>
                    <span>
                        – Không áp dụng đối với các sản phẩm là phụ kiện
                    </span>
                </p>
                <p>
                    <span>
                        b. Đổi sản phẩm lỗi
                    </span>
                    <span>
                        Điều kiện áp dụng
                    </span>
                    <span>
                        – Sản phẩm lỗi kỹ thuật: Sản phẩm rách, bung keo, …
                    </span>
                    <span>
                        Trường hợp không được giải quyết
                    </span>
                    <span>
                        – Sản phầm đã qua sử dụng
                    </span>
                    <span>
                        Đối với sản phẩm lỗi kỹ thuật cần phản hồi đến CLOSET trong vòng 3 ngày, kể từ ngày mua hàng trên hoá đơn đối với khách mua trực tiếp tại cửa hàng, 3 ngày kể từ ngày nhận hàng đối với khách mua online. 
                    </span>
                </p>
                <!-- 2.. -->
                <p>
                    <span style="font-size:14px;">
                    <span style="font-family:Tahoma,Geneva,sans-serif;">
                    <strong>2. PHƯƠNG THỨC ĐỔI SẢN PHẨM</strong>
                    </span>
                    </span>
                </p>
                <p>
                    <span>
                    – Hàng mua trực tiếp tại cửa hàng: Đổi trả trực tiếp tại cửa hàng mua hàng
                    </span>
                    <span>
                        – Hàng mua online (thông qua webiste, Shopee, Lazada): liên hệ fanpage CLOSET để được hướng dẫn đổi trả
                    </span>
                </p>
                <!-- 3.. -->
                <p><span style="font-size:14px;">
                    <span style="font-family:Tahoma,Geneva,sans-serif;">
                    <strong>3. CHI PHÍ ĐỔI HÀNG</strong>
                    </span>
                    </span>
                </p>
                <p>
                    <span>
                        – Miễn phí đổi hàng cho khách mua ở CLOSET trong trường hợp bị lỗi từ nhà sản xuất, giao nhầm hàng, bị hư hỏng trong quá trình vận chuyển hàng.
                    </span>
                    <span>
                        – Trong trường hợp không vừa size hay khách hàng không ưng sản phẩm không muốn nhận hàng phiền khách hàng trả ship hoàn đơn hàng về
                    </span>
                </p>
                </p>
            </div>
        </div>
      </section>

      <!-- footer -->
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
                      <li><a href="allproducts.php" title="Instagram">Tất cả sản phẩm</a></li>
                      <li><a href="size.php" title="Messenger">Bảng size</a></li>
                      <li><a href="store.php" title="Tiktok">Hệ thống cửa hàng</a></li>
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
                            </div>
    </footer>
<script src="../js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>

  </body>
</html>