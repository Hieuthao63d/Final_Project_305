<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <title>Login</title>
    
    <style>
        body {
            background-color: #f4f7fc;
            font-family: 'Arial', sans-serif;
        }

        .container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        .form-group label {
            font-weight: bold;
            color: #555;
        }

        .form-control {
            border-radius: 4px;
            border: 1px solid #ccc;
            padding: 12px;
            font-size: 16px;
        }

        .btn-primary {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            color: white;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-secondary {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            background-color: #6c757d;
            border: none;
            border-radius: 4px;
            color: white;
            cursor: pointer;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        .mt-3 p {
            text-align: center;
            font-size: 14px;
            color: #555;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .container form {
            max-width: 400px;
            margin: auto;
        }

        .container .mt-3 {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1>Login</h1>
        <form method="POST" action="../Bussiness_Logic_Layer/user_controller.php">
            <div class="form-group">
                <label for="user_email">Email</label>
                <input type="email" name="user_email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="user_password">Password</label>
                <input type="password" name="user_password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>

    
        <div class="mt-3">
            <p>Don't have an account?</p>
            <a href="add_user.php" class="btn btn-secondary">Register Now</a>
        </div>
    </div>
</body>

</html>
