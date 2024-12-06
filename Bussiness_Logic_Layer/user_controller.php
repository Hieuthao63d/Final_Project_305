<?php
include '../Data_Layer/database.php';
function handleUserRequest()
{

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $user_name = isset($_POST['user_name']) ? trim($_POST['user_name']) : null;
        $user_email = isset($_POST['user_email']) ? trim($_POST['user_email']) : null;
        $user_password = isset($_POST['user_password']) ? $_POST['user_password'] : null;

        if ($user_name && $user_email && $user_password) {

            echo addUser($user_name, $user_email, $user_password);
        } elseif ($user_email && $user_password) {

            echo loginUser($user_email, $user_password);
        } else {
            echo "Dữ liệu không hợp lệ.";
        }
    }
    //closeConnection();
}

handleUserRequest();
?>