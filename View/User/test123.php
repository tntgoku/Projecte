<?php 
session_start();
if(isset($_POST['thanhtoan123'])){
    echo $_POST['name-user'];
    echo $_POST['tong'];
    print_r($_SESSION['cart']);
    echo "<br>" .$_POST['name-cus'];
    if(isset($_POST['radioCOD'])){
        echo "ban chon thanh toan COD";
    }else{
        echo "ko chon code";
    }
// Kiểm tra xem có dữ liệu từ form gửi đi không
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy giá trị của input radio
    if (isset($_POST['payment-1'])) {
        $radioValue = $_POST['payment-1'];
        // Xử lý dữ liệu theo giá trị của input radio
        if ($radioValue == 'qr-momo') {
            // Nếu chọn thanh toán bằng MOMO
            // Thực hiện các hành động tương ứng
            echo "Bạn đã chọn thanh toán bằng Ví MOMO";
            // Tiếp tục xử lý hoặc chuyển hướng đến trang thanh toán MOMO
        } elseif($radioValue == 'atm-momo') {
            // Xử lý các trường hợp khác
            echo "Bạn đã chọn phương thức thanh toán atm-momo";
        }else{
            echo "Bạn đã chọn phương thức thanh toán COD";
        }
    } else {
        // Xử lý khi không có dữ liệu radio được gửi đi
        echo "Không có dữ liệu radio được gửi đi";
    }
    echo $radioValue;

}

}


?>