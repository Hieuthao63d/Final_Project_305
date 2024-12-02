<?php
session_start(); // Khởi tạo session

// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Nếu chưa đăng nhập, chuyển hướng về trang login
    exit();
}

// Hiển thị thông tin người dùng
echo "Welcome " . $_SESSION['user_name'] . "! You are logged in.";
?>

<!-- Thêm các nội dung khác của dashboard ở đây -->
