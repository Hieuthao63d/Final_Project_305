<?php
// Include database connection
include_once '../Data_Layer/database.php'; 
global $conn;

// Fetch appointment data
$sql = "SELECT a.appointment_id, 
               u1.user_name AS client_name, 
               u2.user_name AS doctor_name, 
               a.appointment_time, 
               a.status 
        FROM appointment a
        JOIN users u1 ON a.client_id = u1.user_id
        JOIN users u2 ON a.doctor_id = u2.user_id";s
        
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['appointment_id']}</td>
                <td>{$row['client_name']}</td>
                <td>{$row['doctor_name']}</td>
                <td>{$row['appointment_time']}</td>
                <td>{$row['status']}</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='5' class='text-center'>No appointments found!</td></tr>";
}
?>
