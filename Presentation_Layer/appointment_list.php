<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Registration List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.6.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .container {
           padding-left: 20%;
           padding-right: 20%;
        }

        h1 {
            margin-top: 20px;
            margin-bottom: 10px;
            color: #00c1f1;
            margin-left: 200px;
        }

        .btn-appointment {
            background-color: #007bff;
            color: white;
            border: none;
            padding-top: 10px;
            padding-bottom: 10px;
            padding: 10px 375px;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            margin-top: 50px;
            /* Cách nút logout */
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

        .container {
            margin-top: 2rem;
        }

        .table {
            margin-top: 1.5rem;
            margin-bottom: 30px;
        }

        .btn-submit {
            margin-top: 2rem;
            background-color: #28a745;
            color: white;
            border: none;
            padding-top: 20px;
            padding-bottom: 20px;
            width: 70%;
            cursor: pointer;
        }

        thead tr th {
            padding-left: 40px;
            padding-right: 40px;
            padding-top: 20px;
            padding-bottom: 20px;

        }

        td {
            padding-left: 40px;
            padding-right: 40px;
            padding-top: 10px;
            padding-bottom: 10px;
            border-bottom: 1px solid lightgray;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <header class="navbar">
        <a href="#">Home</a>
        <a href="../Presentation_Layer/profile_page.php">Profile</a>
        <div class="flag">
            <img src="https://upload.wikimedia.org/wikipedia/en/a/a4/Flag_of_the_United_States.svg" alt="Flag">
        </div>
    </header>
    <div class="container">
        <h1 class="text-center text-primary">Appointment Registration List</h1>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Order</th>
                    <th>Client Name</th>
                    <th>Doctor Name</th>
                    <th>Appointment Time</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody id="appointment-list">
                <!-- Data will be dynamically inserted here -->
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        fetch('../Bussiness_Logic_Layer/fetch_appointments.php')
                            .then(response => response.text())
                            .then(data => {
                                document.getElementById('appointment-list').innerHTML = data;
                            });
                    });
                </script>

            </tbody>
        </table>

        <a href="../Presentation_Layer/profile_page.php" class="btn-appointment">Back to Profile</a>
    </div>
</body>

</html>