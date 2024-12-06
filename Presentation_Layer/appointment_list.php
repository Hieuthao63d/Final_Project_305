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

        .btn-appointment {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            width: 100%;
            margin-top: 20px; /* Cách nút logout */
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
        }

        .btn-submit {
            margin-top: 2rem;
            background-color: #28a745;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <header class="navbar">
        <a href="#">MedTrack</a>
        <a href="#">Home</a>
        <a href="#">Profile</a>
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
        <div class="form-group">
            
        </div>
        <div class="form-group">
            <a href="../Presentation_Layer/profile_page.php" class="btn-appointment">Back to Profile</a>
        </div>
    </div>
</body>

</html>