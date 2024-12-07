<?php
// user_data.php
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "cse305";

$conn = mysqli_connect($serverName, $userName, $password, $dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

function getUserInfo($user_id)
{
    global $conn;
    $sql = "SELECT * FROM users WHERE user_id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $user_info = mysqli_fetch_assoc($result);
        return $user_info;
    } else {
        return null;
    }
}
?>