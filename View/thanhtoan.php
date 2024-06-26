<?php require_once("user_UI_index.php");

if (isset($_POST['total'])) {
    $total = $_POST['total'];
} else {
    // Fallback if no total amount is received
    $total = 0;
}
if (isset($_POST['action']) && $_POST['action'] == 'thanhtoan') {
    // Lưu lại thông tin số lượng sản phẩm vào session
    if (isset($_POST['quantity']) && is_array($_POST['quantity'])) {
        foreach ($_POST['quantity'] as $key => $quantity) {
            // Cập nhật số lượng cho từng sản phẩm trong giỏ hàng
            if (isset($_SESSION['cart'][$key])) {
                $_SESSION['cart'][$key]['Quantity'] = $quantity;
            }
        }
    }
    echo $_POST['Name'];
    echo "<pre>";
    print_r($_SESSION['cart']);
    echo "</pre>";
    // Redirect to the payment processing page or display the payment details
    // Ví dụ: Chuyển hướng tới trang xử lý thanh toán
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="container1 ">
        <div class="checkpaypal" style="border-right: 1px solid #333333; width:65%;">
            <form action="" class="paypal-user">
                <div class="wrap">
                <div class="header">
                            <a href="index.php" class="logo">
                                <img src="../img/icon/LogoSecondP.jpg" alt="asdasd" width="150px" height="50px"></a>
                        </div>
                    <div class="main col-md-12" >
                        <div class="content-user col-md-7">
                                <div class="title-header">
                                    <h5 class="title-layour">Thông tin nhận hàng 
                                        <a href="" class="login-user" style="float: right;"><i class="fa-regular fa-user"></i><?php echo  $user_name;?></a>
                                    </h5>
                                </div>
                                <div class="user-infor">
                                    <div class="form-group">
                                        <label for="" name="">Họ và tên</label>
                                        <input type="text" class="form-control" id="" aria-describedby="" value="<?php echo $user_name;?>">
                                        <small id="" class="form-text text-muted"></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="" name="">Số điện thoại</label>
                                        <input type="text" class="form-control" id="" aria-describedby="" value="<?php echo $user_sdt;?>">
                                    </div>
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
                        </div>
                        <div class="vanchuyen col-md-5">
                        <div class="header">
                            <h5>Thông tin vận chuyển</h5>
                        </div>
                        <div class="choosenpay">
                            <h4><i class="fa-regular fa-credit-card" style="margin-right: 5px;"></i>Thanh Toán</h4>
                            <br>
                            <div class="box-choosen">
                                    <div class="form-check" style=" display:flex;">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1" >
                                            Thanh toán khi nhận hàng (COD) <i class="fa-solid fa-money-bill"></i>
                                        </label>
                                    </div>
                                    <div class="form-check" style=" display:flex; ">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1" style="text-align: center;">
                                            Thanh toán bằng Ví MOMO <img src="../img/icon/momo.png" alt="" width="35px">
                                        </label>
                                    </div>
                            </div>
                                
                            </div>
                        </div>
                        </div>
                    </div>
                </form>
        </div>
        <form class="btn-order" method="post" action="User/atm-momo.php">
        <div class="cartshopping">
            <div class="title" style="display: flex;"><h3 class="header" >Đơn hàng </h3>
            <h3><?php
            //  echo $count_sp;
             ?></h3></div>
            <div class="content">
                <div class="order-table">
                    <table class="product-table">
                        <thead>
                            <tr>
                                <th><span class="visually">Ảnh</span></th>
                                <th><span class="visually">Mô tả</span></th>
                                <th><span class="visually">Số lượng</span></th>
                                <th><span class="visually">Đơn giá</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="product">
								<?php
								// $sql = "SELECT cart.id_sp, product.Name, product.Color, product.Size, product.Cost,cart.amount, product.img from product inner join cart on product.id_product = cart.id_sp where cart.id_us = '$id'";
								// $sp = $data->query($sql);
								// $total = 0;
								// 	while ($row = mysqli_fetch_assoc($sp)){
								// 		$total += ($row["Cost"] * $row["amount"]);
								?>
                                <td>
                                    <div class="img-pro" >
                                        <div class="img-tile"><img src="../img/item/<?php 
                                        // echo $row["img"];
                                        ?>" alt="" width="50px"></div>
                                        <span>
                                            <?php
                                            //  echo $row["amount"];
                                             ?>
                                        </span>
                                    </div>
                                </td>
                                <td colspan="2">
                                    <span class="product_name">
									<?php
                                    //  echo $row["Name"];
                                     ?>
									</span>
                                    <br>
                                    <span class="property" style="font-size: 13px;">
                                        <?php 
                                        // echo $row["Color"];
                                        ?>/<?php 
                                        // echo $row["Size"];
                                        ?>
                                    </span>
                                </td>
                                <td></td>
                                <td><span class="cost"><?php 
                                // echo $row["amount"] * $row["Cost"].".000";
                                ?></span></td>
                            </tr>
							<?php
									// }
								?>
                        </tbody>
                    </table>
                    <div class="form-group1">
                                    <div class="laber"><label for="" name="">Nhập mã giảm giá</label></div>
                                    <div class="input1"
                                     style="display: flex;">
                                        <input type="text" class="form-control" id="" aria-describedby="" placeholder="Mã giảm giá" fdprocessedid="tm75do" style="width: 70%;">
                                        <button type="button" class="btn btn-secondary">sử dụng</button>
                                    </div>
                    </div>
                    <div class="form-group1">
                        <div class="cost1">
                            <span>Tạm phí</span>
                            <span><?= $total?> đ</span>
                        </div>
                        <div class="cost1">
                            <span>Phí vận chuyển</span>
                            <span>30.000</span>
                        </div>
                    </div>
                    <div class="form-group1">
                        <div class="cost1">
                            <span>Tổng cộng</span>
                            <input type="text" name="tong" id="" style="font-weight: bold;" readonly value="<?= $total+30000 ?>"> 
                        </div>
                            
                            <a href="cartproduct.php">
                            <i class="fa-solid fa-chevron-left"></i>Quay lại giỏ hàng
                            </a>
                            <input type="text" name="name-user" value="<?= $id?>">
                            <input type="text" name="bill1" value="<?= 5?>">
                            <button type="submit" class="btn btn-success" > Đặt hàng</button>
                                </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>
<script>
</script>
    
<style>
    .container1{
        display: flex;
    }
  .title-header{
    margin-bottom: 10px;
   }
 .title-layour .login-user{
        float: right;
        color: #333333;
        text-decoration: none;
    }
    .vanchuyen
    .wrap{
        display: flex;
        flex-direction: column;
        gap:20px;
    }
    .wrap .header{
        display: flex;
        align-items: center;justify-content: center;
    }
    .wrap .main{
        margin-top: 20px;
        display: flex;
    }
    .user-infor{
        margin-top: 10px;
    }
    .radio-wrapper{
        display: table;
    box-sizing: border-box;
    width: 100%;
    }
     .box-choosen input{
        margin-top: 8px;
    }
    .box-choosen .form-check{
        justify-content: space-between;
    }
    .checkpaypal{
        margin-right: 35px;
    }
    .radio-input{
        display: flex;
        text-align: center;
        align-items: center;
        border:1px solid #cecdcd;
        border-radius: 10px;
        justify-content: space-between;
    }
    .vanchuyen h5{
        margin-bottom: 58px;
    }
    .cartshopping .title{
        margin-left: 20px;
        border-bottom: 1px solid #333333;
    }

    .img-pro{
        width: 100%;
        position: relative;
    }
    table thead{
        display: none;
    }
    .order-table{
        margin-top: 35px;
    }
    .form-group1{
        margin-top: 10px;
        border-top: 1px solid #333333;
    }
    .form-group1 .btn-order{
        margin-top: 25px;
        display: flex;
        justify-content: space-between;
    }
    .form-group1 .cost1{
        display: flex;
        justify-content: space-between;
    }
    .product .cost{
        margin-left: 10px;
    }
    .img-pro span{
        font-size: .78em;
    white-space: nowrap;
    padding: 0 .62em;
    border-radius: 2em;
    background-color: #2a9dcc;
    color: #fff;
    position: absolute;
    right: 0;
    top: 0px;
    z-index: 3;
    box-sizing: border-box;
    min-width: 1.75em;
    height: 1.75em;
    text-align: center;
    line-height: 1.75em;
    }
</style>