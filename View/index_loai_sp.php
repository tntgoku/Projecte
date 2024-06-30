<?php require_once("user_UI_index.php");?>
<?php
$data = new Database();
$data->connect();


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

//

 
  $cartProducts = array();
  $totalQuantity = 0;

  // --- daon nay ne----
  foreach ($_SESSION['cart'] as $key => $product) {
    // Ensure Quantity is set and numeric
    if (!isset($product['Quantity']) || !is_numeric($product['Quantity'])) {
        $_SESSION['cart'][$key]['Quantity'] = 1; // Default to 1 if not set or not numeric
    }
    $quantity = $_SESSION['cart'][$key]['Quantity'];
    $totalQuantity += $quantity; }
  function addToCart($productId, &$cartProducts) {
      global $data; // Assuming $data is your Database object
      
      $sql = "SELECT * FROM product WHERE id_product = $productId";
      $result = $data->query($sql);
      
      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $cartProducts[] = $row;
      }
      session_start();
    if(!isset($_SESSION['cartshoping']))
    $_SESSION['cartshopping']=[];
      if(isset($_POST['payment'])&& ($_POST['payment'])){
        $img1=$_POST[''];
      }
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
  echo "du lieu cart <br>";
  print_r($_SESSION['cart'] );
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
  header('Location: index.php'); // Redirect back to the cart page
  exit();
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
                                                  <input type="text"
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
                                      echo '<p id="conti">Giá: <span class="price" id="price-' . $key . '" style="color:#f81f1f;">' . 
                                              $product['Cost'] . '</span> đ</p>
                                              <form method="post" action="index1.php">
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
    // document.querySelector(".btn-success").addEventListener("click", function(event) {
    //         event.preventDefault(); // Prevent default form submission
    //         document.querySelector("form").submit(); // Submit the form
    //     });
});

function updateCart(key, quantity) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "index1.php", true);
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
                                      echo '</div>';
                                  }
                                  echo '<form method="post" action="cartproduct.php" style="float:right";>
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
          <li><a href="change.php">CHÍNH SÁCH ĐỔI TRẢ</a></li>
          <li><a href="index.php">
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
                
                <!-- slideshow -->
      <div class="slider">
        <swiper-container class="mySwiper" pagination="true" pagination-clickable="true" navigation="true" space-between="30"
        centered-slides="true" autoplay-delay="2500" autoplay-disable-on-interaction="true">
        <swiper-slide> <img src="../img/slide1.jpg" alt=""></swiper-slide>
        <swiper-slide> <img src="../img/slide1.jpg" alt=""></swiper-slide>
        <swiper-slide><img src="../img/slide2.jpg" alt=""></swiper-slide>
        <swiper-slide><img src="../img/slide3.jpg" alt=""></swiper-slide>
      </swiper-container>
      </div>
    <section class="intro1">
                                      <h4>Trendy threads for you!</h4>
                                      <div class="content">
                                        <p>Chúng tôi rất vui được chào đón bạn! Hãy tận hưởng trải nghiệm mua sắm thú vị và đầy cảm hứng tại cửa hàng mới của chúng tôi, nơi mọi sản phẩm đều được lựa chọn kỹ lưỡng để đáp ứng nhu cầu của bạn.</p>
                                        </div>
    </section>
    <!-- ListProducts -->
    <section class="container">
      <!-- Áo Thun -->
      <section class="section_products">
        <div class="container">
          <h2 class="cata-title"><?php echo $tittle['Type_name'];?></h2>
          <div class="section-list">
            <!-- Items-1 -->
             <!-- doan nay la lay het thong tin san pham -->
             <?php 
              if (!empty($_SESSION['products'])) {
        reset($_SESSION['products']); // Reset the array pointer
        while ($product = current($_SESSION['products'])) {
            ?>
            <div class="section-item">
              <div class="product-lists-item">
                <div class="product-items">
                  <div class="product-block">
                    <!-- Ảnh sản phẩm -->
                    <div class="product-img" style="position: relative; text-align: center;">
                      <span class="discount">
                      <!-- product.Discount   -->
                      <?= $product['Discount'] ?>%</span>
                      <div class="btn-action">
                        <div class="action-cart" >
                              <button type="submit" title="Thêm vào giỏ hàng" style="background: #101010; width: 40px; height: 40px;">
                              <i class="fa-solid fa-cart-shopping" style="font-size: 24px; color: #fff;"></i></button>
                        </div>
                      </div>
                      <a href="chitiet.php?id_sp=<?php echo $product['id_product'];?>">
                        <!-- product.img -->
                        <img src="../img/item/<?= $product['img'] ?>" width="230px" alt="" class="main-img">
                    </a>
                  </div>
                  <div class="product-info">
                              <div class="product-detail clearfix">
                                <!-- Màu áo -->
                              <div class="selectionColor">
                                <ul>
                                  <li>
                                    <a href="chitiet.php?id_sp=<?php echo $product['id_product'];?>">
                                      <img src="../img/item/f1.jpg" alt="" id="small-img"></a></li>
                                  <li>
                                    <a href="chitiet.php?id_sp=<?php echo $product['id_product'];?>">
                                      <img src="../img/item/f2.jpg" alt="" id="small-img"></a></li>
                                      </ul>
                                      </div>
                                      <!-- Tên sản phẩm -->
                                      <div class="box-pro-detail">
                                        <a href="chitiet.php?id_sp=<?php echo $product['id_product'];?>" class="tp_product_name">
                                <h5 class="pro-name">
                                    <!-- product.Name -->
                                    <?= $product['Name'] ?>
                                  </h5>
                                    </a>
                                    </div>
                                    <!-- Giá sản phẩm -->
                                    <div class="box-pro-prices">
                                <p class="pro-price highlight tp_product_price">
                                  <span>
                                  <!-- product.cost -->
                                  <?= $product['Cost'] ?>
                                  </span></p>
                                  </div>
                                  </div>
                  </div>
                  <div class="product">
                    <form action="index1.php" method="post" enctype="application/x-www-form-urlencoded">
                      <input type="hidden" name="idproduct[]" value="<?= $product['id_product']?>">
                      <button type="submit" name="addcart" class="btn btn-primary btn-lg">Them vao gio hang</button>
                    </form>
                  </div>
                  </div>
                </div>
              </div>
            </div>
            <?php 
            next($_SESSION['products']);
            }
            }
            ?>
                    <!-- Xem them -->
                    <div class="section-item">
                      <div class="more">
                        <a href="">Xem thêm</a>
                                    </div>
                            </div>
      </section>
    </section>
    
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
<script src="./js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>

  </body>
</html>