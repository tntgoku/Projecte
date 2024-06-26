<?php
session_start(); // Bắt đầu session
session_unset(); // Xóa tất cả các biến session
session_destroy(); // Hủy session
echo '<script> alert(Ban da dang suat);</script>';
header("Location: index.php"); // Chuyển hướng về trang chủ sau khi đăng xuất
exit();
?>
