<?php 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Projecte/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="/Projecte/css/reponse.css">
    <link rel="stylesheet" href="style.css">
    <title>CloSet</title>
    <!-- doan nay toi cung ko biet tai sao chuyen sang file style.css lai khong chay -->
    <style>
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
                <div class="login">
                  
                  <?php 
                  echo $_SESSION["Name"];
                  if(isset($_SESSION['Name']) && ($_SESSION['Name'] != '')){
                  echo'
                  <label for="">'.$_SESSION["Name"].'<a href="http://localhost/projecte/view/user/changuser.php"> 
                      <i class="fa-regular fa-user" style="margin-top: 5px; margin-left:8px;"></i></a>
                  </label>
                  <div id="box">
                    <ul id="list-itema">
                      <li id="itema"><a href="http://localhost/projecte/view/user/changuser.php">Tài khoản của tôi</a></li>
                      <li id="itema"><a href="">Lịch sử đơn hàng</a></li>
                      <li id="itema"><a href="loguot.php">Đăng xuất</a></li>
                    </ul>';
                  }else{?>
                 
                  <?php echo '<label for=""> <a href="login.php"> Đăng nhập
                  <i class="fa-regular fa-user" style="margin-top: 5px; margin-left:8px;"></i>
                  </a></label>}'; }?>
                </div>
                  <!-- ---cart-shopping--- -->
                  <div class="cart-shopping">
                    <a href="">
                      <i class="fa-solid fa-cart-shopping"></i>
                      <span class="count_item_pr hidden-count" style="padding-left:  3px;">0</span></a>
                      <div class="top-cart-content">
                          <div class="CartHeaderContainer" style="width: 340px;">
                            <div class="cart--empty--message" style="text-align: center;">
                                  <img src="/projecte/img/shopping-bag.png" alt="" width="80px">
                                  <p>Không có sản phẩm nào trong giỏ hàng của bạn</p>
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
          <li><a href="#">
            <img src="/projecte/img/icon/LogoSecondP.jpg" alt="" width="100px"></a></li>
            <li><a href="size.php">BẢNG SIZE</a></li>
            <li><a href="store.php">HỆ THỐNG CỬA HÀNG</a></li>
        </ul>
        <div class="close-menu ">
          <div class="title d-lg-none d-block">MENU</div>
          <div class="menu-slider">
              <ul>
                <li><a href="allproducts.php">Tất cả sản phẩm</a></li>
                <li><a href="allproducts.php">Áo Thun</a></li>
                <li><a href="allproducts.php">Baby Tee</a></li>
                <li><a href="allproducts.php">Áo Polo</a></li>
                <li><a href="allproducts.php">Áo Sơ Mi</a></li>
                <li><a href="allproducts.php">Áo Khoác</a></li>
                <li><a href="allproducts.php">Hoodie</a></li>
                </ul>
          </div>
        </div>  
        
      </nav>
                <!-- slideshow -->
      <!-- <div class="slider">
        <swiper-container class="mySwiper" pagination="true" pagination-clickable="true" navigation="true" space-between="30"
        centered-slides="true" autoplay-delay="2500" autoplay-disable-on-interaction="true">
        <swiper-slide> <img src="/projecte/img/slide1.jpg" alt=""></swiper-slide>
        <swiper-slide> <img src="/projecte/img/slide1.jpg" alt=""></swiper-slide>
        <swiper-slide><img src="/projecte/img/slide2.jpg" alt=""></swiper-slide>
        <swiper-slide><img src="/projecte/img/slide3.jpg" alt=""></swiper-slide>
      </swiper-container>
      </div> -->
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
          <h2 class="cata-title">Áo Thun</h2>
          <div class="section-list">
            <!-- Items-1 -->
            <div class="section-item">
              <div class="product-lists-item">
                <div class="product-items">
                  <div class="product-block">
                    <!-- Ảnh sản phẩm -->
                    <div class="product-img" style="position: relative; text-align: center;">
                      <span class="discount">-45%</span>
                      <div class="btn-action">
                        <div class="action-cart" >
                        <button type="submit" title="Thêm vào giỏ hàng" style="background: #101010; width: 40px; height: 40px;"><i class="fa-solid fa-cart-shopping" style="font-size: 24px; color: #fff;"></i></button>
                        </div>
                      </div>
                      <a href="allproducts.php">
                        <img src="/projecte/img/item/AoPolo.png" width="230px" alt="" class="main-img">
                    </a></div>
                  <div class="product-info">
                              <div class="product-detail clearfix">
                                <!-- Màu áo -->
                              <div class="selectionColor">
                                <ul>
                                  <li>
                                    <a href="allproducts.php">
                                      <img src="/projecte/img/item/f1.jpg" alt="" id="small-img"></a></li>
                                  <li>
                                    <a href="allproducts.php">
                                      <img src="/projecte/img/item/f2.jpg" alt="" id="small-img"></a></li>
                                      </ul>
                                      </div>
                                      <!-- Tên sản phẩm -->
                                      <div class="box-pro-detail">
                                <h3 class="pro-name">
                                  <a href="allproducts.php" class="tp_product_name">
                                    Áo sơ mi cộc
                                    </a>
                                    </h3>
                                    </div>
                                    <!-- Giá sản phẩm -->
                                    <div class="box-pro-prices">
                                <p class="pro-price highlight tp_product_price">
                                  <span>139,000₫</span></p>
                                  </div>
                                  </div>
                  </div>
                  <div class="product">
                    <a href="cartproduct.php">
                      <button type="button" class="btn btn-primary btn-lg">Them vao gio hang</button>
                    </a>
                  </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Items-2 -->
            <div class="section-item">
              <div class="product-lists-item">
                <div class="product-items">
                  <div class="product-block">
                    <!-- Ảnh sản phẩm -->
                    <div class="product-img" style="position: relative; text-align: center;">
                      <span class="discount">-45%</span>
                      <div class="btn-action">
                        <div class="action-cart" >
                        <button type="submit" title="Thêm vào giỏ hàng" style="background: #101010; width: 40px; height: 40px;"><i class="fa-solid fa-cart-shopping" style="font-size: 24px; color: #fff;"></i></button>
                        </div>
                      </div>
                      <a href="allproducts.php">
                        <img src="/projecte/img/item/AoPolo.png" width="230px" alt="" class="main-img">
                    </a></div>
                  <div class="product-info">
                              <div class="product-detail clearfix">
                                <!-- Màu áo -->
                              <div class="selectionColor">
                                <ul>
                                  <li>
                                    <a href="allproducts.php">
                                      <img src="/projecte/img/item/f1.jpg" alt="" id="small-img"></a></li>
                                  <li>
                                    <a href="allproducts.php">
                                      <img src="/projecte/img/item/f2.jpg" alt="" id="small-img"></a></li>
                                      </ul>
                                      </div>
                                      <!-- Tên sản phẩm -->
                                      <div class="box-pro-detail">
                                <h3 class="pro-name">
                                  <a href="allproducts.php" class="tp_product_name">
                                    Áo sơ mi cộc
                                    </a>
                                    </h3>
                                    </div>
                                    <!-- Giá sản phẩm -->
                                    <div class="box-pro-prices">
                                <p class="pro-price highlight tp_product_price">
                                  <span>139,000₫</span></p>
                                  </div>
                                  </div>
                  </div>
                  <div class="product">
                  <button type="button" class="btn btn-primary btn-lg">Them vao gio hang</button>
                  </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Items-3 -->
              <div class="section-item">
              <div class="product-lists-item">
                <div class="product-items">
                  <div class="product-block">
                    <!-- Ảnh sản phẩm -->
                    <div class="product-img" style="position: relative; text-align: center;">
                      <span class="discount">-45%</span>
                      <div class="btn-action">
                        <div class="action-cart" >
                        <button type="submit" title="Thêm vào giỏ hàng" style="background: #101010; width: 40px; height: 40px;"><i class="fa-solid fa-cart-shopping" style="font-size: 24px; color: #fff;"></i></button>
                        </div>
                      </div>
                      <a href="allproducts.php">
                        <img src="/projecte/img/item/bb1.jpg" width="230px" alt="" class="main-img">
                    </a></div>
                  <div class="product-info">
                              <div class="product-detail clearfix">
                                <!-- Màu áo -->
                              <div class="selectionColor">
                                <ul>
                                  <li>
                                    <a href="allproducts.php">
                                      <img src="/projecte/img/item/f1.jpg" alt="" id="small-img"></a></li>
                                  <li>
                                    <a href="allproducts.php">
                                      <img src="/projecte/img/item/f2.jpg" alt="" id="small-img"></a></li>
                                      </ul>
                                      </div>
                                      <!-- Tên sản phẩm -->
                                      <div class="box-pro-detail">
                                <h3 class="pro-name">
                                  <a href="allproducts.php" class="tp_product_name">
                                    Áo sơ mi cộc
                                    </a>
                                    </h3>
                                    </div>
                                    <!-- Giá sản phẩm -->
                                    <div class="box-pro-prices">
                                <p class="pro-price highlight tp_product_price">
                                  <span>139,000₫</span></p>
                                  </div>
                                  </div>
                  </div>
                  <div class="product">
                  <button type="button" class="btn btn-primary btn-lg">Them vao gio hang</button>
                  </div>
                  </div>
                </div>
              </div>
            </div>
                    <!-- Xem them -->
                    <div class="section-item">
                      <div class="more">
                        <a href="">Xem thêm</a>
                                    </div>
                            </div>
      </section>
      <!-- BAbY Tee -->
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
                                  <img src="/projecte/img/icon/facebook.png" alt=""></a></li>
                                  <li>
                                    <a href="" title="Instagram">
                                      <img src="/projecte/img/icon/instagram.png" alt=""></a></li>
                            <li><a href="https://gmail.com/" title="Messenger"><img src="/projecte/img/icon/messenger.png" alt=""></a></li>
                            <li><a href="https://www.tiktok.com/foryou?lang=vi-VN" title="Tiktok"><img src="/projecte/img/icon/tik-tok.png" alt=""></a></li>
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