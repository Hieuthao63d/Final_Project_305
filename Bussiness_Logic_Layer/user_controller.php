<?php
include '../Data_Layer/database.php'; // Đảm bảo đường dẫn chính xác

function handleUserRequest()
{
    // Kiểm tra nếu yêu cầu là POST để thực hiện hành động thêm người dùng hoặc đăng nhập
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $user_name = isset($_POST['user_name']) ? trim($_POST['user_name']) : null;
        $user_email = isset($_POST['user_email']) ? trim($_POST['user_email']) : null;
        $user_password = isset($_POST['user_password']) ? $_POST['user_password'] : null;

        if ($user_name && $user_email && $user_password) {
            // Xử lý đăng ký
            echo addUser($user_name, $user_email, $user_password); // Gọi hàm từ tầng Data Layer
        } elseif ($user_email && $user_password) {
            // Xử lý đăng nhập
            echo loginUser($user_email, $user_password); // Gọi hàm từ tầng Data Layer
        } else {
            echo "Dữ liệu không hợp lệ.";
        }
    }

    // Đóng kết nối
    closeConnection();
}

// Gọi hàm xử lý
handleUserRequest();
?>
