<?php
include '../Bussiness_Logic_Layer/doctor_controller.php';

// Kiểm tra nếu người dùng đã đăng nhập
if (!isset($_SESSION['user_id'])) {
    echo "Vui lòng đăng nhập để xem trang hồ sơ.";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['id'])) {
        $user_id = $_GET['id'];
        $medical_record = getClientHealthStatus($user_id);

    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient's Medical Record</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        crossorigin="anonymous">
    <style>
        body {
            background-color: #f4f7fc;
            font-family: 'Arial', sans-serif;
        }

        .container {
            display: block;
            width: 500px;
            justify-content: space-between;
            padding: 30px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            font-size: 18px;
            background-color: #E3E3E1;
            margin-bottom: 5px;
        }

        p {
            padding-left: 10px;
            font-size: 18px;
        }

        h2 {
            background-color: #333;
            color: white;
            padding: 5px;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <?php if ($medical_record === null) { ?>
        <h1>Medical Record haven't been recorded for this client.</h1>
    <?php } else { ?>
        <div class="container mt-5">
            <div class="left-column">
                <h2>Client's Medical Record</h2>
                <div class="form-group">
                    <p><strong>Client ID:</strong> <?php echo htmlspecialchars($medical_record['user_id']); ?></p>
                </div>
                <div class="form-group">
                    <label>Date of recored:</label>
                    <p><?php echo htmlspecialchars($medical_record['date_of_record']); ?></p>
                </div>
                <div class="form-group">
                    <label>Record ID:</label>
                    <p><?php echo htmlspecialchars($medical_record['medical_record_id']); ?></p>
                </div>
                <div class="form-group">
                    <label>Temperature:</label>
                    <p><?php echo htmlspecialchars($medical_record['temperature']); ?></p>
                </div>
                <div class="form-group">
                    <label>Heart Rate:</label>
                    <p><?php echo htmlspecialchars($medical_record['heart_rate']); ?></p>
                </div>
                <div class="form-group">
                    <label>Doctor's diagnosis:</label>
                    <p><?php echo htmlspecialchars($medical_record['doctor_diagnosis']); ?></p>
                </div>
                <div class="form-group">
                    <label>Doctor Advice:</label>
                    <p><?php echo htmlspecialchars($medical_record['doctor_advice']); ?></p>
                </div>

            </div>


        </div>
    <?php } ?>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>

</html>