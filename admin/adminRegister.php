<?php
// Include database connection
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $adminName = mysqli_real_escape_string($conn, trim($_POST['adminName']));
    $adminPhoneNo = mysqli_real_escape_string($conn, trim($_POST['adminPhoneNo']));
    $adminEmail = mysqli_real_escape_string($conn, trim($_POST['adminEmail']));
    $adminPassword = trim($_POST['adminPassword']);
    $adminConfirmPassword = trim($_POST['adminConfirmPassword']);

    // Check if passwords match
    if ($adminPassword !== $adminConfirmPassword) {
        echo "<script>alert('Passwords do not match. Please try again.'); window.history.back();</script>";
        exit();
    }

    // Prepare and execute SQL statement (No hashed password)
    $sql = "INSERT INTO admin (adminName, adminPhoneNo, adminEmail, adminPassword) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssss", $adminName, $adminPhoneNo, $adminEmail, $adminPassword);

        if (mysqli_stmt_execute($stmt)) {
            echo '<div class="container">';
            echo '<h1>Registration successful</h1>';
            echo '<div class="back-to-login"><a href="adminLogin.php" class="button">Back to Login</a></div>';
            echo '</div>';
        } else {
            echo '<h1>Error</h1>';
            echo '<p>Could not register admin. Please try again.</p>';
        }
        mysqli_stmt_close($stmt);
    } else {
        echo '<h1>Error</h1>';
        echo '<p>SQL statement preparation failed: ' . mysqli_error($conn) . '</p>';
    }

    // Close database connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-image: url('bck.jpg'); /* Add the image path here */
    background-size: cover; /* Ensure the background image covers the entire screen */
    background-position: center; /* Position the image in the center */
    background-attachment: fixed; /* Optional: Keeps the background fixed when scrolling */
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

        .container {
            background-color: rgba(255, 255, 255, 0.9); /* Adjust the opacity as needed */
            border-radius: 10px;
            box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 400px;
            max-width: 90%;
            padding: 40px;
            box-sizing: border-box;
            text-align: center;
            border: 3px solid;
            border-image: linear-gradient(to right, #8B4513, #A0522D, #D2691E);
            border-image-slice: 1;
            height: auto; /* Set height to auto */
            margin: 20px; /* Add margin for spacing */
        }

        h1 {
            margin-bottom: 20px;
            color: #333;
        }

        .back-to-login {
            margin-top: 20px;
        }

        .back-to-login a {
            color: #555;
            text-decoration: none;
            padding: 10px 20px;
            background-color: #f5b85e;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .back-to-login a:hover {
            background-color: #e39f33;
        }

        /* Add scrollbar to container if content exceeds height */
        .container {
            overflow-y: auto;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        label {
            display: block;
            text-align: left;
            margin-bottom: 5px;
            color: #555;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"],
        input[type="tel"],
        textarea {
            width: calc(100% - 24px); /* Adjust width to account for padding */
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 20px;
            box-sizing: border-box;
            font-family: Arial, sans-serif; /* Adjust font family */
            font-size: 16px;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="password"]:focus,
        input[type="email"]:focus,
        input[type="tel"]:focus,
        textarea:focus {
            border-color: #f5b85e;
            outline: none;
        }

        button[type="submit"],
        button[type="reset"],
        button[type="button"],
        a.button {
            background-color: #f5b85e;
            color: #fff;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        button[type="submit"]:hover,
        button[type="reset"]:hover,
        button[type="button"]:hover,
        a.button:hover {
            background-color: #e39f33;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Register Admin</h2>
    <h4>* required fields</h4>
    <form action="adminRegister.php" method="post">
        <div>
            <label for="adminName">Admin Name*:</label>
            <input type="text" id="adminName" name="adminName" placeholder="Enter admin name" required>
        </div>
        <div>
            <label for="adminPhoneNo">Phone No.*:</label>
            <input type="tel" pattern="[0-9]{3}-[0-9]{7}" id="adminPhoneNo" name="adminPhoneNo"
                   placeholder="Enter admin phone number" required>
        </div>
        <div>
            <label for="adminEmail">Admin Email*:</label>
            <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" id="adminEmail" name="adminEmail"
                   placeholder="Enter admin email" required>
        </div>
        <div>
            <label for="adminPassword">Password*:</label>
            <input type="password" id="adminPassword" name="adminPassword" placeholder="Enter admin password" required
                   pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                   title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
        </div>
        <div>
            <label for="adminConfirmPassword">Confirm Password*:</label>
            <input type="password" id="adminConfirmPassword" name="adminConfirmPassword"
                   placeholder="Confirm admin password" required>
        </div>
        <div>
            <button type="submit">Register</button>
            <button type="reset">Clear All</button>
        </div>
        <div class="back-to-login">
            <label>Already have an account?
                <a href="adminLogin.php" class="button">Login</a>
            </label>
        </div>
    </form>
</div>
</body>
</html>
