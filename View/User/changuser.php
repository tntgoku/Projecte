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
    <title>CloSet</title>
    
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
                  <a href="login.php" ><label for="">Đăng nhập</label> </label><i class="fa-regular fa-user"></i></a>
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
    <div class="main container">
        <div class="header">
        <div class="nameuser">
            <h2>CHÀO HIẾU</h2>
        </div>
        <div class="pointpay">
            <h4>Điểm 111111</h4>
        </div>
        </div>
        <div class="body1">
            <div class="user-card">
                <div class="bar-infor">
                    <h5>Thông tin tài khoản</h5>
                    <ul class="user-item">
                        <li class="item infor-user"><span>Thông tin cá nhân</span><i class="fa-solid fa-chevron-right"></i></li>
                        <li class="item loc-user"><span>Sổ địa chỉ</span><i class="fa-solid fa-chevron-right"></i></li>
                        <li class="item"><span>Thẻ thành viên</span><i class="fa-solid fa-chevron-right"></i></li>
                        <li class="item"><span>Đăng xuất</span><i class="fa-solid fa-chevron-right"></i></li>
                    </ul>
                </div>
            </div>
            <div class="information">
                <div class="title-header">
                    <h2>THÔNG TIN CỦA TÔI</h2>
                    <h5>Hãy chỉnh sửa bất kỳ thông tin chi tiết nào bên dưới để tài khoản của bạn luôn được cập nhật.</h5>
                </div>
                <form action="">
                    <div class="content-user">
                        <h2 class="header-content">THÔNG TIN CHI TIẾT</h2>
                        <div class="form-group">
                             <label for="">Họ tên</label>
                            <br>
                            <input type="text" class="form-control" id="" aria-describedby="" value="Bế Văn Hàng">
                        </div>
                        <div class="form-group">
                             <label for="">Giới tính</label>
                            <br>
                            <input type="text" class="form-control" id="" aria-describedby="" value="Nam">
                        </div>
                    </div>
                    <div class="content-user">
                        <h2 class="header-content">CHI TIẾT ĐĂNG NHẬP</h2>
                        <div class="form-group">
                             <label for="">Tên đăng nhập</label>
                            <br>
                            <input type="text" class="form-control" id="" aria-describedby="" value="trunghieuhsdd@gmail.com">
                        </div>
                        <div class="form-group">
                             <label for="">mật khẩu</label>
                            <br>
                            <input type="password" class="form-control" id="" aria-describedby="" value="Nam">
                        </div>
                    </div>
                    <div class="content-user-address">
                        <h2 class="header-content">THÔNG TIN ĐỊA CHỈ</h2>
                        <h5>Địa chỉ đặt hàng</h5>
                        <div class="form-group">
                                            <label for="">Tỉnh/ Thành phố</label>
                                            <br>
                                            <div class="input-group ">
                                                <select class="custom-select" id="inputGroupSelect02">
                                                    <option selected>Choose...</option>
                                                    <option value="1">Hà Nội</option>
                                                    <option value="2">Vĩnh Phúc</option>
                                                    <option value="3">Hải Phòng</option>
                                                    <option value="4">Yên Bái</option>
                                                    <option value="5">Lạng Sơn</option>
                                                </select>
                                                <div class="input-group-append">
                                                <label class="input-group-text" for="inputGroupSelect02"><i class="fa-solid fa-chevron-down"></i></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Quận/Huyện</label>
                                            <br>
                                            <div class="input-group ">
                                                <select class="custom-select" id="inputGroupSelect02">
                                                    <option selected>Choose...</option>
                                                    <option value="1">Hà Nội</option>
                                                    <option value="2">Vĩnh Phúc</option>
                                                    <option value="3">Hải Phòng</option>
                                                    <option value="4">Yên Bái</option>
                                                    <option value="5">Lạng Sơn</option>
                                                </select>
                                                <div class="input-group-append">
                                                <label class="input-group-text" for="inputGroupSelect02"><i class="fa-solid fa-chevron-down"></i></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Phường/xã</label>
                                            <br>
                                            <div class="input-group ">
                                                <select class="custom-select" id="inputGroupSelect02">
                                                    <option selected>Choose...</option>
                                                    <option value="1">Hà Nội</option>
                                                    <option value="2">Vĩnh Phúc</option>
                                                    <option value="3">Hải Phòng</option>
                                                    <option value="4">Yên Bái</option>
                                                    <option value="5">Lạng Sơn</option>
                                                </select>
                                                <div class="input-group-append">
                                                <label class="input-group-text" for="inputGroupSelect02"><i class="fa-solid fa-chevron-down"></i></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Ghi chú/Tùy chọn</label>
                                            <br>
                                            <textarea name="" id="" style="width: 100%;">
                                            </textarea>
                                            </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </body>
</html>
<style>
.user-card{
    margin-top: 20px;
    margin-right: 40px;
}
    .user-item{
        margin-left: 20px;
        margin-top: 20px;
        list-style: none;
    }
    .item{
        padding: 10px 0;
        display: flex;
        justify-content: space-between;
        font-size: 16px;

    }
    .user-item .item:hover{
        background: #333333;
        cursor: pointer;
    }
    .user-item .item span,.user-item .item i{
        font-size: 18px;
        text-align: center;
        font-weight: bold;
    }
    .user-item .item:hover span,.user-item .item:hover i{
        color: #fff;

    }
    .body1{
        display: flex;
    }
    .body1 .information{
        margin-left: 40px;
    }
    .information .title-header{
        margin-top: 35px;
    }
    .content-user{
        margin-top: 15px;
    }
</style>