
<?php 
session_start();
include '../../App/connect.php';
$data=new Database();
$data->connect();
$sql='SELECT * FROM `user` WHERE id_user= '.$_SESSION['id_user'].'';
$user_data=array();
    $result=$data->query($sql);
    while($row =$result->fetch_assoc() ){
        $user_data[]=$row;
    }
    print_r($user_data);
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
      
      // Query the database for the product
      $sql = "SELECT * FROM product WHERE id_product = $productId";
      $result = $data->query($sql);
      
      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          
          // Check if product already exists in cart
          $found = false;
          foreach ($cartProducts as $key => $product) {
              if ($product['id_sp'] == $row['id_sp']) {
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
  if (isset($_POST['key']) && isset($_POST['quantity'])) {
    $key = $_POST['key'];
    $quantity = $_POST['quantity'];

    if (isset($_SESSION['cart'][$key])) {
        $_SESSION['cart'][$key]['Quantity'] = $quantity;
    }
}
echo "<br><br>";
print_r($_SESSION['cart']);
if (isset($_POST['product_key'])) {
  $key = $_POST['product_key'];
  unset($_SESSION['cart'][$key]);
  header('Location: index.php');
  exit();
}

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
    <title>CloSet</title>
    <style>#box {
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
    margin-top: 4%;
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
                                                  <img src="../../img/item/' . $product['img'] . '"name="img" alt="'.'>';
                                                  echo '
                                                  <p id="cont" >'.$product['Name'].'</p>'.
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
                                              <form method="post" action="index.php" id="btn-check123">
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
                                      echo '</div>';
                                  }
                                  echo '<form method="post" action="../cartproduct.php" style="float:right";>
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
          <li><a href="../index.php">TRANG CHỦ</a></li>
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
                <li><a href="../index.php">Tất cả sản phẩm</a></li>
                <li><a href="../index.php?id_type=1">Áo Thun</a></li>
                <li><a href="../index.php?id_type=2">Baby Tee</a></li>
                <li><a href="../index.php?id_type=3">Áo Polo</a></li>
                <li><a href="../index.php?id_type=4">Áo Sơ Mi</a></li>
                <li><a href="../index.php?id_type=5">Áo Khoác</a></li>
                <li><a href="../index.php?id_type=6">Hoodie</a></li>
                </ul>
          </div>
        </div>  
      </nav>
    <div class="main container">
        <br>
        <div class="header">
        <div class="nameuser">
            <h2>CHÀO <?= $_SESSION['Name']?></h2>
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
                        <li class="item infor-user"><a href="changuser.php"><span>Thông tin cá nhân</span></a><i class="fa-solid fa-chevron-right"></i></li>
                        <li class="item loc-user"><a href="cart-user.php"><span>Lịch sử mua hàng</span></a><i class="fa-solid fa-chevron-right"></i></li>
                        <li class="item"><span>Thẻ thành viên</span><i class="fa-solid fa-chevron-right"></i></li>
                        <li class="item"><span><a href="/Projecte/View/logout.php">Đăng xuất</a></span><i class="fa-solid fa-chevron-right"></i></li>
                    </ul>
                </div>
            </div>
            <div class="information">
                <div class="title-header">
                    <h2>LỊCH SỬ MUA HÀNG</h2>
                </div>
                <br>
                <form action="" style="display: flex; justify-content:center;">
                    <div class="content-user">
                        <h2 class="header-content">THÔNG TIN HÓA ĐƠN BẠN ĐÃ MUA</h2><br>
                            <h5>
                            <?php 
                            if($user_data[0]['role'] ==1){
                                echo 'Admin';
                            }else{
                                echo 'Khách hàng thân thiết';
                            }
                            ?>
                            </h5>
                            <br>
                            <table class="table">
                                <thead class="thead-dark" style="width: 100%;">
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Mã hóa đơn</th>
                                    <th scope="col">Họ tên</th>
                                    <th scope="col">Số lượng </th>
                                    <th scope="col">Thành tiền </th>
                                    <th scope="col">Trạng thái </th>
                                    <th scope="col">Ngày mua </th>
                                    <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $cartDB= new Cart();
                                        $ketqua=$cartDB->getbillDetail($user_data[0]['id_user']);
                                    // echo "<pre>";
                                    // var_dump($ketqua);
                                    // echo "</pre>";
                                        $i=0;
                                        foreach($ketqua as $item){?>
                                        <tr style="text-align: center;">
                                            <th scope="row"><?=$i ?></th>
                                            <td><?=$item['id_Bill'] ?></td>
                                            <td><?=$item['Name'] ?></td>
                                            <td><?=$item['count'] ?></td>
                                            <td><?=$item['cost'] ?></td>
                                            <td><?=$item['status'] ?></td>
                                            <td><?=$item['date'] ?></td>
                                            <td><button type="submit" class="btn btn-success">Mua lại</button></td>
                                        </tr>

                                    <?php
                                        }
                                    
                                    ?>
                                </tbody>
                            </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </body>
</html>
<style>
.save-btn{
    display: flex;
    align-items: center;
    justify-content: center;
}
    .save-btn #save{
        font-weight: bold;
    font-size: 20px;
    height: 40px;
    margin: auto;
    width: 100px;
    }
.user-card{
    width: 25%;
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
    .item i.fa-solid.fa-chevron-right {
    margin-top: 6px;
    margin-right: 10px;
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


<?php 
    // if(isset($_POST['save']) && $_POST['save']){
    //     if($_POST['pwd']=$_POST['pwd1']){
    //         $pwd=md5($_POST['pwd']);
    //         $sql= 'UPDATE `user` SET Name = '.$_POST['Name'].',Address='.$_POST['address'].
    //         ',Phone_Num='.$_POST['phone'].',pass='.$pwd.' WHERE `user`.`id_user` = '.$idus.'';
    //         $result=$data->query($sql);
    //         if($result==true){
    //             echo '<script>
    //             alert("Thay đổi thành công sản phẩm '.$name.'");
    //           window.location.href="changuser.php";</script>';
    //         }
    //         else{
    //             echo"ada";
    //         }
            
    //     }
    //     else{
    //         echo '123';
    //     }
    // }
    // else{
    //     echo 'adsadasd';
    // }
    if(isset($_POST['save']) && $_POST['save']){
        if($_POST['pwd'] == $_POST['pwd1']){
            // Hash the password before storing it (consider using stronger hashing methods than MD5)
            $pwd = md5($_POST['pwd']);
            
            // Assuming $data is your database connection
            $sql = 'UPDATE `user` SET Name = "'.$_POST['Name'].'", Address = "'.$_POST['address'].'", Phone_Num = "'.$_POST['phone'].'", pass = "'.$pwd.'" WHERE `user`.`id_user` = '.$_POST['idu'];
            
            // Execute the query
            $result = $data->query($sql);
            
            if($result === true){
                echo '<script>
                alert("Thay đổi thành công sản phẩm '.$name.'");
                window.location.href="changuser.php";
                </script>';
            } else {
                echo "Có lỗi xảy ra khi cập nhật thông tin người dùng.";
            }
            
        } else {
            echo 'Mật khẩu không khớp. Vui lòng nhập lại.';
        }
    }
?>