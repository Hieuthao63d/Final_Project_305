<?php
// Kết nối với file chứa các hàm thông tin
include '../Data_Layer/information_form.php';

function handleRegistrationRequest()
{
    session_start();

    // Kiểm tra xem người dùng đã đăng nhập chưa
    if (!isset($_SESSION['user_id'])) {
        echo "Vui lòng đăng nhập trước.";
        return;
    }

    // Lấy user_id từ session
    $user_id = $_SESSION['user_id'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Lấy dữ liệu từ form
        $user_name = isset($_POST['user_name']) ? trim($_POST['user_name']) : null;
        $user_email = isset($_POST['user_email']) ? trim($_POST['user_email']) : null;
        $phone_number = isset($_POST['phone_number']) ? $_POST['phone_number'] : null;
        $dOB = isset($_POST['dOB']) ? $_POST['dOB'] : null;
        $insurance_policy = isset($_POST['insurance_number']) ? $_POST['insurance_number'] : null;
        $gender = isset($_POST['gender']) ? $_POST['gender'] : null;
        $user_address = isset($_POST['user_address']) ? $_POST['user_address'] : null;
        $occupation = isset($_POST['occupation']) ? $_POST['occupation'] : null;
        $relative_name = isset($_POST['relative_name']) ? $_POST['relative_name'] : null;
        $relative_phone = isset($_POST['relative_phone']) ? $_POST['relative_phone'] : null;
        $insurance_provider = isset($_POST['insurance_provider']) ? $_POST['insurance_provider'] : null;
        $identication_type = isset($_POST['identication_type']) ? $_POST['identication_type'] : null;
        $identication_number = isset($_POST['identication_number']) ? $_POST['identication_number'] : null;

        // Kiểm tra các trường bắt buộc
        if ($user_name && $user_email && $phone_number) {
            // Gọi hàm cập nhật thông tin người dùng
            $result = updateUser($user_id, $user_name, $user_email, $phone_number, $dOB, $insurance_policy, $gender, $user_address, $occupation, $relative_name, $relative_phone, $insurance_provider, $identication_type, $identication_number);

            // Nếu cập nhật thành công, chuyển hướng về trang profile_page.php
            if ($result) {
                // Chuyển hướng về trang profile_page.php
                header("Location: ../Presentation_Layer/profile_page.php");
                exit();
            } else {
                echo "Cập nhật thông tin thất bại. Vui lòng thử lại.";
            }
        } else {
            echo "Dữ liệu không hợp lệ. Vui lòng kiểm tra lại các trường bắt buộc.";
        }
    }
}

// Gọi hàm để xử lý request đăng ký
handleRegistrationRequest();
?>
