<?php
// Bắt đầu session để xác thực người dùng
session_start();

// Kiểm tra nếu người dùng đã đăng nhập
if (!isset($_SESSION['user_id'])) {
    echo "Vui lòng đăng nhập để xem trang hồ sơ.";
    exit;
}

// Kết nối cơ sở dữ liệu
include '../Data_Layer/doctor_data.php';

// Lấy user_id từ session
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];

// Truy vấn thông tin người dùng từ cơ sở dữ liệu
$sql = "SELECT * FROM `appointment` WHERE doctor_id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, 'i', $user_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Kiểm tra nếu có dữ liệu người dùng
if ($user_info = mysqli_fetch_assoc($result)) {
    // Dữ liệu người dùng đã được lấy thành công
} else {
    echo "Không tìm thấy thông tin người dùng.";
    exit;
}

// Đóng kết nối
mysqli_stmt_close($stmt);
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Doctor page</title>
    <style>
        body {
            background-color: #f4f7fc;
            font-family: 'Arial', sans-serif;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

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
    </style>
</head>

<body>
    <main>
        <div class="container">
            <div class="row">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Appointment ID</th>
                            <th scope="col">Client ID</th>
                            <th scope="col">Client Name</th>
                            <th scope="col">Medical Record</th>
                            <!-- <th scope="col">Doctor ID</th> -->
                            <!-- <th scope="col">Doctor Name</th> -->
                            <th scope="col">Time</th>
                            <th scope="col">Location</th>
                            <th scope="col">Status</th>
                            <th scope="col">Functions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (mysqli_num_rows($result) > 0) {
                            $stt = 1;
                            while ($row = mysqli_fetch_array($result)) {
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $stt++; ?></th>
                                    <td><?php echo $row["appointment_id"] ?></td>
                                    <td><?php echo $row["client_id"] ?></td>
                                    <td><?php echo $row['client_name'] ?></td>
                                    <td><a
                                            href="../Presentation_Layer/view_health_status.php?id=<?php echo $row["client_id"] ?>">View</a>
                                    </td>
                                    <!-- <td><?php echo $row["doctor_id"] ?></td> -->
                                    <!-- <td><?php echo $row['doctor_name'] ?></td> -->
                                    <td><?php echo $row['appointment_time'] ?></td>
                                    <td><?php echo $row['location'] ?></td>
                                    <td><?php echo $row['status'] ?></td>
                                    <?php if ($row['status'] === 'Pending') { ?>
                                        <form method="POST" action="../Bussiness_Logic_Layer/doctor_controller.php">
                                            <input type="hidden" name="appointment_id" value=<?php echo $row['appointment_id'] ?>>
                                            <td><button class="btn btn-outline-primary mb-2 accept" name="status" value="Accepted"
                                                    data-id="<?php echo $row['appointment_id'] ?>">Accept</button>
                                                <button class="btn btn-outline-danger mb-2 cancel" name="status" value="Cancelled"
                                                    data-id="<?php echo $row['appointment_id'] ?>">Cancel</button>
                                            </td>
                                        </form>
                                    <?php } ?>
                                </tr>
                                <?php
                            }
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
        crossorigin="anonymous"></script>


</body>

</html>