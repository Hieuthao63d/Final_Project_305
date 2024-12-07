<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "cse305";

$conn = mysqli_connect($serverName, $userName, $password, $dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

function updateUser($user_id, $user_name, $user_email, $phone_number, $dOB, $insurance_number, $gender, $user_address, $occupation, $relative_name, $relative_phone, $insurance_provider, $identication_type, $identication_number)
{
    global $conn;

    // Kiểm tra nếu các tham số cần thiết có giá trị hợp lệ
    if (empty($user_id) || empty($user_name) || empty($user_email) || empty($phone_number)) {
        return "Vui lòng nhập đầy đủ thông tin bắt buộc.";
    }

    // Chuẩn bị câu lệnh SQL để tránh SQL injection
    $sql = "UPDATE users SET 
                user_name = ?, 
                user_email = ?, 
                phone_number = ?, 
                dOB = ?, 
                insurance_number = ?, 
                gender = ?, 
                user_address = ?, 
                occupation = ?, 
                relative_name = ?, 
                relative_phone = ?, 
                insurance_provider = ?, 
                identication_type = ?, 
                identication_number = ? 
            WHERE user_id = ?";

    // Tạo prepared statement
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt === false) {
        return "Lỗi khi chuẩn bị câu lệnh: " . mysqli_error($conn);
    }

    // Xác định kiểu dữ liệu cho các tham số (14 tham số, trong đó user_id là int)
    $types = "sssssssssssssi"; // Mỗi 's' là một chuỗi, 'i' là số nguyên cho user_id

    // Đặt giá trị tham số cho câu lệnh SQL
    $params = [
        $user_name,
        $user_email,
        $phone_number,
        $dOB,
        $insurance_number,
        $gender,
        $user_address,
        $occupation,
        $relative_name,
        $relative_phone,
        $insurance_provider,
        $identication_type,
        $identication_number,
        $user_id
    ];

    // Bind tham số vào câu lệnh SQL
    mysqli_stmt_bind_param($stmt, $types, ...$params);

    // Thực thi câu lệnh SQL
    if (mysqli_stmt_execute($stmt)) {
        // Nếu thực hiện thành công
        return "Cập nhật thông tin thành công!";
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