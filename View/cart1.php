<?php
require_once("user_UI_index.php");
$custommer= new Customer();
// Kiểm tra xem người dùng đã click vào nút Thanh Toán chưa
if (isset($_POST['payment'])) {
    // Lấy thông tin giỏ hàng từ session
    $cart = $_SESSION['cart'] ?? [];
    $cartshop=new Cart();
    $currentDate = date("Y-m-d");
    $total=0;
    $sum=0;
    // Hiển thị thông tin đơn hàng
    $id_bill=4;
    foreach ($cart as $key => $product) {
        $amount = $product['Quantity'];
        $total+=$amount*$product['Cost'];
        $sum+=$amount;
    }
    echo $sum;
    $cartshop->insertbilltong($id,2,$sum,$total,1,$currentDate);
    // Ví dụ: Cập nhật vào CSDL, xử lý thanh toán, etc.
    // Sau khi xử lý, có thể chuyển hướng hoặc hiển thị thông báo thành công
    // header("Location: thanhcong.php");
    // exit();
}
?>
