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

    // Đóng statement sau khi thực thi
    mysqli_stmt_close($stmt);
}


// Đóng kết nối cơ sở dữ liệu khi không còn sử dụng
// function closeConnection() {
//     global $conn;
//     mysqli_close($conn);
// }
?>