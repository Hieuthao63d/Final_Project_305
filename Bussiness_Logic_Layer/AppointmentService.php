<?php
// Include the database connection
include_once '../Data_Layer/database.php';
global $conn;

// Enable MySQLi exceptions for better error handling
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $client_id = $_POST['client_id']; 
    $doctor_id = $_POST['doctor_id'];
    $reason = $_POST['reason'];
    $comments = $_POST['comments'];
    $appointment_time = $_POST['appointment_time'];

    // Validate the inputs (you can add more validation rules)
    if (empty($doctor_id) || empty($reason) || empty($appointment_time)) {
        die("Please fill in all required fields.");
    }

    // Insert the appointment into the database
    try {
        // Prepare the SQL for inserting the appointment
        $sql = "INSERT INTO appointment (client_id, doctor_id, appointment_time, status) 
                VALUES (?, ?, ?, 'Pending')"; // 'Pending' as default status
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iis", $client_id, $doctor_id, $appointment_time);
        $stmt->execute();

        // Get the appointment ID
        $appointment_id = $stmt->insert_id;

        // Optionally, insert additional information like reason and comments
        if (!empty($reason)) {
            $sql_reason = "UPDATE appointment SET reason = ?, comments = ? WHERE appointment_id = ?";
            $stmt_reason = $conn->prepare($sql_reason);
            $stmt_reason->bind_param("ssi", $reason, $comments, $appointment_id);
            $stmt_reason->execute();

            // Close the reason statement
            $stmt_reason->close();
        }

        // Close the main appointment statement
        $stmt->close();

        // Redirect to a confirmation page or show a success message
        echo "Appointment successfully booked!";
        // You can redirect like this:
        // header("Location: ..//Presentation_Layer/profile_page.php");

    } catch (mysqli_sql_exception $e) {
        echo "Error processing the appointment: " . $e->getMessage();
    }
}
?>
