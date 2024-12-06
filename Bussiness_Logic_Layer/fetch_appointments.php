<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    die("Access denied: User not logged in.");
}

$userId = $_SESSION['user_id'];

// Include database connection
include_once '../Data_Layer/database.php'; 
global $conn;

// Fetch appointments for a specific user
function getAppointmentsByUser($conn, $userId) {
    $sql = "SELECT a.appointment_id, 
                   u1.user_name AS client_name, 
                   u2.user_name AS doctor_name, 
                   a.appointment_time, 
                   a.status 
            FROM appointment a
            JOIN users u1 ON a.client_id = u1.user_id
            JOIN users u2 ON a.doctor_id = u2.user_id
            WHERE a.client_id = ?";
            
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    return $stmt->get_result();
}





$result = getAppointmentsByUser($conn, $userId);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row['appointment_id']) . "</td>
                <td>" . htmlspecialchars($row['client_name']) . "</td>
                <td>" . htmlspecialchars($row['doctor_name']) . "</td>
                <td>" . htmlspecialchars($row['appointment_time']) . "</td>
                <td>" . htmlspecialchars($row['status']) . "</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='5' class='text-center'>No appointments found!</td></tr>";
}
?>
