<?php
include '../Bussiness_Logic_Layer/doctor_controller.php';

$user_info = getDoctorInforController();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        crossorigin="anonymous">
    <style>
        body {
            background-color: #f4f7fc;
            font-family: 'Arial', sans-serif;
        }

        .container {
            display: flex;
            justify-content: space-between;
            padding: 30px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .left-column {
            flex: 3;
            padding-right: 30px;
        }

        .right-column {
            flex: 1;
            background-color: #f7f7f7;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .alert-info {
            background-color: #ffcc00;
            color: #fff;
            padding: 10px;
            border-radius: 5px;
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .alert-info i {
            margin-right: 10px;
        }

        .btn-logout {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            width: 100%;
        }

        .btn-logout:hover {
            background-color: #c82333;
        }

        .btn-appointment {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            width: 100%;
            margin-top: 20px;
            /* Cách nút logout */
        }

        .btn-appointment:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="left-column">
            <h1>Doctor Profile</h1>
            <div class="form-group">
                <label>Doctor ID:</label>
                <p><?php echo htmlspecialchars($user_info['user_id']); ?></p>
            </div>
            <div class="form-group">
                <label>Full Name:</label>
                <p><?php echo htmlspecialchars($user_info['user_name']); ?></p>
            </div>
            <div class="form-group">
                <label>Date of Birth:</label>
                <p><?php echo htmlspecialchars($user_info['dOB']); ?></p>
            </div>
            <div class="form-group">
                <label>Gender:</label>
                <p><?php echo htmlspecialchars($user_info['gender']); ?></p>
            </div>
            <div class="form-group">
                <label>Phone Number:</label>
                <p><?php echo htmlspecialchars($user_info['phone_number']); ?></p>
            </div>
            <div class="form-group">
                <label>Email:</label>
                <p><?php echo htmlspecialchars($user_info['user_email']); ?></p>
            </div>
            <div class="form-group">
                <label>Address:</label>
                <p><?php echo htmlspecialchars($user_info['user_address']); ?></p>
            </div>
            <div class="form-group">
                <label>Identification:</label>
                <p><?php echo htmlspecialchars($user_info['identication_number']); ?></p>
            </div>

            <!-- Medical Schedule Section -->
            <div class="alert-info">
                <i class="fas fa-calendar-alt"></i>
                <div>
                    <strong>Medication Schedule:</strong>
                    <p>Example: Take medication at 8 AM every day.</p>
                </div>
            </div>

            <div class="alert-info">
                <i class="fas fa-calendar-check"></i>
                <div>
                    <strong>Medical Examination Schedule:</strong>
                    <p>Example: Checkup on the 1st of every month.</p>
                </div>
            </div>

        </div>

        <!-- Right Column (Account and Logout) -->
        <div class="right-column">
            <h5>Account</h5>
            <div class="form-group">
                <p><strong>Username:</strong> <?php echo htmlspecialchars($user_info['user_name']); ?></p>
            </div>
            <div class="form-group">
                <p><strong>Email:</strong> <?php echo htmlspecialchars($user_info['user_email']); ?></p>
            </div>
            <div class="form-group">
                <button class="btn-logout" onclick="window.location.href='login.php'">Logout</button>
            </div>

            <!-- Nút xem lịch hẹn -->
            <div class="form-group">
                <a href="../Presentation_Layer/doctor_appointment.php" class="btn-appointment">Show All Appointments</a>
            </div>

        </div>
    </div>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>

</html>