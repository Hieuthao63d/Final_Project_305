<?php
// profile_controller.php
include '../Data_Layer/user_data.php';

// Kiểm tra xem người dùng đã đăng nhập hay chưa
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect nếu người dùng chưa đăng nhập
    exit();
}

$user_id = $_SESSION['user_id'];
$user_info = getUserInfo($user_id);
include '../Presentation_Layer/profile_page.php';
?>
