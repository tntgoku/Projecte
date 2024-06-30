
<?php
session_start();


?>

    <style>
      .btn-paypal #btn-total123{
        border: none;
        width: 130px;
        text-align: center;
      }
      #btn-total123:focus-visible{
        border: none;
      }
      .product-thumbnail{
        width: 250px;
      }
    </style>
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

                    foreach ($cart as $key=>$item) {
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
                          echo '<td>' . $total . '</td>';
                    echo '<td>
                    <form method="post" action="test123.php">
                    <input type="hidden" name="product_key" value="' . $key . '">
                    <button type="submit" class="btn btn-black btn-sm remove_item"  value="' . $item["id_product"] . '">
                    <i class="fa fa-trash"></i></button></form></td>';
                    echo '</tr>
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Giảm số lượng
    $(".decrease").click(function() {
        let $input = $(this).closest(".input-group-prepend").next(".quantity-amount");
        let value = parseInt($input.val());
        if (value > 1) { // Đảm bảo không giảm xuống dưới 1
            $input.val(value - 1);
        }
    });

    // Tăng số lượng
    $(".increase").click(function() {
        let $input = $(this).closest(".input-group-append").prev(".quantity-amount");
        let value = parseInt($input.val());
        $input.val(value + 1);
    });
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
</script>';
                }
              }}else{
                if (isset($_SESSION['cart'])) {
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
                      echo '<td>' . $total . '</td>';
                echo '<td>
                <form method="post" action="test123.php">
                <input type="hidden" name="product_key" value="' . $key . '">
                <button type="submit" class="btn btn-black btn-sm remove_item"  value="' . $item["id_product"] . '">
                <i class="fa fa-trash"></i></button></form></td>';
                echo '</tr>
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
// Giảm số lượng
$(".decrease").click(function() {
    let $input = $(this).closest(".input-group-prepend").next(".quantity-amount");
    let value = parseInt($input.val());
    if (value > 1) { // Đảm bảo không giảm xuống dưới 1
        $input.val(value - 1);
    }
});

// Tăng số lượng
$(".increase").click(function() {
    let $input = $(this).closest(".input-group-append").prev(".quantity-amount");
    let value = parseInt($input.val());
    $input.val(value + 1);
});
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
</script>';
            }
              }
            }
                ?>
                <script>
                </script>
            </tbody>
        </table>
    </div>
    <?php 
    
    if (isset($_POST['product_key'])) {
      $key = $_POST['product_key'];
  
      // Kiểm tra xem $key có tồn tại trong $_SESSION['cart'] hay không
      if (isset($_SESSION['cart'][$key])) {
          // Xóa phần tử có key là $key trong $_SESSION['cart']
          unset($_SESSION['cart'][$key]);
          
          // Sau khi xóa xong, in ra lại các sản phẩm còn lại trong giỏ hàng
          echo '<h2>Các sản phẩm còn lại trong giỏ hàng:</h2>';
          if (!empty($_SESSION['cart'])) {
              foreach ($_SESSION['cart'] as $item) {
                  echo 'Tên sản phẩm: ' . $item['Name'] . '<br>';
                  echo 'Số lượng: ' . $item['Quantity'] . '<br>';
                  echo 'Giá: ' . $item['Cost'] . ' đ<br><br>';
              }
          } else {
              echo 'Giỏ hàng trống.';
          }
      } else {
          echo 'Không tìm thấy sản phẩm trong giỏ hàng.';
      }
  }
    ?>