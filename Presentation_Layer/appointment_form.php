<?php

// Bắt đầu session để xác thực người dùng
session_start();

// Kiểm tra nếu người dùng đã đăng nhập
if (!isset($_SESSION['user_id'])) {
  echo "Vui lòng đăng nhập để xem trang hồ sơ.";
  exit;
}

// Kết nối cơ sở dữ liệu
include '../Data_Layer/information_form.php';


// Lấy user_id từ session
$patient_id = $_SESSION['user_id'];
$patient_name = $_SESSION['user_name'];


// Include the database connection
include_once '../Data_Layer/database.php';  // Adjust the path if necessary

// Get the database connection
// Ensure Database class is defined in database.php
global $conn;

// Example SQL query to fetch doctor data (modify based on your actual table structure)
$sql = "SELECT user_id, user_name FROM users WHERE role_id = 2";  // Assuming 'role_id = 2' is for doctors

// Prepare the SQL statement
$stmt = $conn->prepare($sql);
$stmt->execute();

// Get the result
$result = $stmt->get_result();

// Initialize an array to store doctor data
$doctors = [];

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    // Add each doctor to the $doctors array
    $doctors[] = $row;
  }
} else {
  echo "No doctors found!";
}

// Close the statement and connection
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Book a Doctor's Appointment</title>
  <link rel="stylesheet" href="stylesa.css">
  <style>
    .navbar {
      background-color: #00c1f1;
      padding: 1rem;
    }

    .navbar a {
      color: white;
      font-weight: bold;
      margin-right: 15px;
      text-decoration: none;
    }

    .navbar .flag {
      float: right;
      display: flex;
      align-items: center;
    }

    .navbar .flag img {
      width: 30px;
      border-radius: 50%;
    }

    main {
      padding: 40px;
    }

    h1 {
      margin-top: 20px;
      margin-bottom: 10px;
      color: #00c1f1;
    }

    p {
      color: gray;
      margin-bottom: 20px;
    }

    label {
      display: block;
      font-weight: bold;
      margin-bottom: 10px;
      color: gray;
    }

    select {
      width: 70%;
      padding: 10px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 10px;
      box-sizing: border-box;
      margin-bottom: 30px;
    }

    input {
      width: 70%;
      padding: 10px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 10px;
      box-sizing: border-box;
      margin-bottom: 30px;
    }

    button {
      padding-top: 10px;
      padding-bottom: 10px;
      border-radius: 5px;
      background-color: #47D5FF;
      color: white;
      width: 70%;
    }
  </style>
</head>

<body>
  <div class="container">
    <header class="navbar">
      <nav>
        <a href="#">Home</a>
        <a href="../Presentation_Layer/profile_page.php">Profile</a>
      </nav>

    </header>
    <main>
      <h1>Book a doctor's appointment</h1>
      <p>Request a new appointment in 10 seconds</p>
      <form class="appointment-form" method="POST" action="../Bussiness_Logic_Layer/AppointmentService.php">
        <div class="form-group">
          <input type="hidden" name="client_id" value="<?= $patient_id ?>">
          <input type="hidden" name="client_name" value="<?= $patient_name ?>">
          <label for="doctor_id">Doctor</label>
          <select name="doctor_id" id="doctor_id" required>
            <option value="">Select Doctor</option>
            <?php foreach ($doctors as $doctor): ?>
              <option value="<?= $doctor['user_id'] ?>"><?= $doctor['user_name'] ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group">
          <div class="form-group col-md-6">
            <label for="reason">Reason for appointment</label>
            <input type="text" class="form-control" id="reason" name="reason" placeholder="Ex: Annual monthly check-up">
          </div>
          <div class="form-group col-md-6">
            <label for="comments">Additional comments/notes</label>
            <input type="text" class="form-control" id="comments" name="comments"
              placeholder="Ex: Prefer afternoon appointments, if possible">
          </div>
          <label for="appointment_time">Appointment Date and Time</label>
          <input type="datetime-local" id="appointment_time" name="appointment_time" required>
        </div>
        <button type="submit">Submit and continue</button>
      </form>
    </main>
  </div>
</body>

</html>