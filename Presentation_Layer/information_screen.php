<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <title>User Registration Form</title>
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
            max-width: 700px;
            margin: auto;
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

        .form-group {
            margin-bottom: 20px;
        }

        .container form {
            max-width: 700px;
            margin: auto;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1>User Registration</h1>
        <form method="POST" action="../Bussiness_Logic_Layer/information_controller.php">
            <!-- Personal Information Section -->
            <div class="form-group">
                <label for="user_name">Full Name</label>
                <input type="text" name="user_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="user_email">Email Address</label>
                <input type="email" name="user_email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <input type="text" name="phone_number" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="dOB">Date of Birth</label>
                <input type="date" name="dOB" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="insurance_number">Insurance Policy Number</label>
                <input type="text" name="insurance_number" class="form-control">
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <select name="gender" class="form-control">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="user_address">Address</label>
                <input type="text" name="user_address" class="form-control">
            </div>
            <div class="form-group">
                <label for="occupation">Occupation</label>
                <input type="text" name="occupation" class="form-control">
            </div>
            <div class="form-group">
                <label for="relative_name">Relative's Name</label>
                <input type="text" name="relative_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="relative_phone">Relative's Phone Number</label>
                <input type="text" name="relative_phone" class="form-control">
            </div>
            <div class="form-group">
                <label for="insurance_provider">Insurance Provider</label>
                <input type="text" name="insurance_provider" class="form-control">
            </div>

            <!-- Identification and Verification Section -->
            <div class="form-group">
                <label for="identication_type">Identification Type</label>
                <input type="text" name="identication_type" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="identication_number">Identification Number</label>
                <input type="text" name="identication_number" class="form-control" required>
            </div>

            <!-- Consent and Privacy Section -->
            <div class="form-group">
                <label>
                    <input type="checkbox" name="consent_treatment" required> I consent to treatment.
                </label>
            </div>
            <div class="form-group">
                <label>
                    <input type="checkbox" name="consent_information_use" required> I consent to the use and disclosure of my information for treatment purposes.
                </label>
            </div>
            <div class="form-group">
                <label>
                    <input type="checkbox" name="consent_privacy" required> I agree to the privacy policy.
                </label>
            </div>

            <!-- Submit Button and Back Button -->
            <button type="submit" class="btn btn-primary">Submit and Continue</button>
            <a href="profile_page.php" class="btn btn-secondary mt-3">Back to Profile</a>
        </form>
    </div>
</body>

</html>
