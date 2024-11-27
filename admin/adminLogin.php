<?php
include("connection.php");
session_start();

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $adminName = trim($_POST['adminName']);
    $adminPassword = trim($_POST['adminPassword']);

    // Validate admin name
    if (empty($adminName)) {
        $_SESSION['error'] = "You forgot to enter your admin name.";
        header("Location: adminLogin.php");
        exit();
    }

    // Validate password
    if (empty($adminPassword)) {
        $_SESSION['error'] = "You forgot to enter your password.";
        header("Location: adminLogin.php");
        exit();
    }

    // Retrieve the admin record from the database
    $query = "SELECT * FROM admin WHERE adminName = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $adminName);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        // Debugging (remove this in production)
        // echo "Entered Password: $adminPassword<br>";
        // echo "Stored Hash: " . $row['adminPassword'] . "<br>";

        // Verify the password
        if (password_verify($adminPassword, $row['adminPassword'])) {
            // Start the session and redirect to admin dashboard
            $_SESSION['adminName'] = $adminName;
            header("Location: adminDashboard.php");
            exit();
        } else {
            $_SESSION['error'] = "The password you entered is incorrect.";
            header("Location: adminLogin.php");
            exit();
        }
    } else {
        $_SESSION['error'] = "No account found with that admin name.";
        header("Location: adminLogin.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('bck.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.9);
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
            height: auto;
            margin: 20px;
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
            width: calc(100% - 24px);
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 20px;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
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
    <h2>ADMIN LOGIN</h2>
    <form action="adminLogin.php" method="post">
        <div>
            <label for="adminName">Admin Name:</label>
            <input type="text" id="adminName" name="adminName" placeholder="Please enter your name" size="20" maxlength="30"
                   value="<?php if (isset($_POST['adminName'])) echo $_POST['adminName']; ?>">
        </div>
        <div>
            <label for="adminPassword">Password:</label>
            <input type="password" id="adminPassword" name="adminPassword" placeholder="Please enter your password" size="15" maxlength="60" required
                   pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                   title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                   required value="<?php if (isset($_POST['adminPassword'])) echo $_POST['adminPassword']; ?>">
        </div>
        <div>
            <button type="submit">Login</button>
            <button type="reset">Reset</button>
        </div>
        <div>
            <label>Don't have an account? <a href="adminRegister.php">Sign Up</a></label>
        </div>
    </form>
</div>
</body>
</html>
