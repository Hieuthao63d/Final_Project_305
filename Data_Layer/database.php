<?php

$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "cse305";

$conn = mysqli_connect($serverName, $userName, $password, $dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


function addUser($user_name, $user_email, $user_password)
{
    global $conn;

    $hashed_password = password_hash($user_password, PASSWORD_BCRYPT);

    $sql = "INSERT INTO users (user_name, user_email, user_password) 
            VALUES ('$user_name', '$user_email', '$hashed_password')";

    if (mysqli_query($conn, $sql)) {
        // Thông báo thêm thành công
        echo "<script>alert('Thêm thành công!');</script>";
        echo "<script>window.location.href = '../Presentation_Layer/login.php';</script>";
        exit();
    } else {
        return "Lỗi: " . mysqli_error($conn);
    }
}

function loginUser($user_email, $user_password)
{
    global $conn;

    // Tìm người dùng theo email
    $sql = "SELECT * FROM users WHERE user_email = '$user_email'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

       
        if (password_verify($user_password, $user['user_password'])) {
            session_start();
            $_SESSION['user_name'] = $user['user_name'];
            $_SESSION['role_id'] = $user['role_id'];
            $_SESSION['user_id'] = $user['user_id'];

            
            if (is_null($user['role_id'])) {
                echo "<script>alert('Đăng nhập thành công!');</script>";
                echo "<script>window.location.href = '../Presentation_Layer/profile_page.php';</script>";
            } elseif ($user['role_id'] == 2) {
                echo "<script>alert('Đăng nhập thành công!');</script>";
                echo "<script>window.location.href = '../Presentation_Layer/doctor.php';</script>";
            } elseif ($user['role_id'] == 1) {
                echo "<script>alert('Đăng nhập thành công!');</script>";
                echo "<script>window.location.href = '../Presentation_Layer/admin.php';</script>";
            }
            exit();
        } else {
            return "Sai mật khẩu!";
        }
    } else {
        return "Không tìm thấy người dùng với email này!";
    }
}



function closeConnection()
{
    global $conn;
    mysqli_close($conn);
}
