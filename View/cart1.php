<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['payment'])) {
    // Lấy dữ liệu giỏ hàng từ session
    $cart = $_SESSION['cart'] ?? [];

    if (!empty($cart)) {
        // Xử lý thanh toán
        // Ví dụ: Hiển thị dữ liệu giỏ hàng để xác nhận thanh toán
        echo '<h1>Thanh Toán</h1>';
        echo '<table border="1">';
        echo '<tr><th>ID Sản Phẩm</th><th>Tên Sản Phẩm</th><th>Số Lượng</th><th>Giá</th></tr>';
        foreach ($cart as $item) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($item['id_product']) . '</td>';
            echo '<td>' . htmlspecialchars($item['Name']) . '</td>';
            echo '<td>' . htmlspecialchars($item['Color']) . '</td>';
            echo '<td>' . htmlspecialchars($item['Size']) . '</td>';
            echo '<td>' . htmlspecialchars($item['Cost']) . '</td>';
            echo '<td>' . htmlspecialchars($item['Quantity']) . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo 'Giỏ hàng trống.';
    }
} else {
    echo 'Yêu cầu không hợp lệ.';
}
?>