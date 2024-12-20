<?php
// profile_controller.php
include '../Data_Layer/doctor_data.php';
include '../Data_Layer/user_data.php';

// Kiểm tra xem người dùng đã đăng nhập hay chưa
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect nếu người dùng chưa đăng nhập
    exit();
}
// Lấy user_id từ session
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $appointment_id = $_POST['appointment_id'];
    $status = $_POST['status'];

    updateAppointmentStatus($status, $appointment_id);
    header("Location: ../Presentation_Layer/doctor_appointment.php");
}

function getClientHealthStatus($client_id)
{
    return getHealthStatus($client_id);
}

function getDoctorAppointmentController()
{
    global $user_id;
    return getDoctorAppointment($user_id);
}

function getDoctorInforController()
{
    global $user_id;

    return getUserInfo($user_id);
}
?>