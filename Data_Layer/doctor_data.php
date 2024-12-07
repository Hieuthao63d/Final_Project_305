<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "cse305";

$conn = mysqli_connect($serverName, $userName, $password, $dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

function updateAppointmentStatus($status, $appointment_id)
{
    global $conn;

    // Kiểm tra nếu các tham số cần thiết có giá trị hợp lệ
    if (empty($appointment_id) || empty($status)) {
        return "Vui lòng nhập đầy đủ thông tin bắt buộc.";
    }

    // Chuẩn bị câu lệnh SQL để tránh SQL injection
    $sql = "UPDATE `appointment` SET  
                `status` = ? 
            WHERE appointment_id = ?";

    // Tạo prepared statement
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt === false) {
        return "Lỗi khi chuẩn bị câu lệnh: " . mysqli_error($conn);
    }

    // Xác định kiểu dữ liệu cho các tham số (14 tham số, trong đó user_id là int)
    $types = "si"; // Mỗi 's' là một chuỗi, 'i' là số nguyên cho user_id

    // Đặt giá trị tham số cho câu lệnh SQL
    $params = [
        $status,
        $appointment_id
    ];

    // Bind tham số vào câu lệnh SQL
    mysqli_stmt_bind_param($stmt, $types, ...$params);

    // Thực thi câu lệnh SQL
    if (mysqli_stmt_execute($stmt)) {
        // Nếu thực hiện thành công
        return "Trạng thái cuộc hẹn đã được ghi nhận!";
    } else {
        // Nếu có lỗi xảy ra
        return "Lỗi khi cập nhật thông tin: " . mysqli_stmt_error($stmt);
    }

}

function getHealthStatus($user_id)
{
    global $conn;
    $sql = "SELECT * FROM health_status WHERE user_id = ? limit 1";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result);
    } else {
        return null;
    }
}

function getDoctorAppointment($user_id)
{
    global $conn;
    // Truy vấn thông tin người dùng từ cơ sở dữ liệu
    $sql = "SELECT * FROM `appointment` WHERE doctor_id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $user_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Kiểm tra nếu có dữ liệu người dùng
    if ($result) {
        // Dữ liệu người dùng đã được lấy thành công
        return $result;
    } else {
        echo "Không tìm thấy thông tin người dùng.";
        exit;
    }

    // Đóng kết nối
    mysqli_stmt_close($stmt);
}

?>