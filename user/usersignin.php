<?php
// Call file to connect server eLeave
include("connection.php");

// This query inserts a record in the eLeave table
// Has form been submitted?
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $error = array(); // Initialize an error array

    // Check for userName
    if (empty($_POST['userName'])) {
        $error[] = 'You forgot to enter your name.';
    } else {
        $n = mysqli_real_escape_string($conn, trim($_POST['userName']));
    }

    // Check for a userPassword
    if (empty($_POST['userPassword'])) {
        $error[] = 'You forgot to enter the password.';
    } else {
        $p = mysqli_real_escape_string($conn, trim($_POST['userPassword']));
    }

    // Check for userPhoneNo
    if (empty($_POST['userPhoneNo'])) {
        $error[] = 'You forgot to enter your phone number.';
    } else {
        $ph = mysqli_real_escape_string($conn, trim($_POST['userPhoneNo']));
    }

    // Check for userEmail
    if (empty($_POST['userEmail'])) {
        $error[] = 'You forgot to enter your email.';
    } else {
        $e = mysqli_real_escape_string($conn, trim($_POST['userEmail']));
    }

    // Check for userAddress
    if (empty($_POST['userAddress'])) {
        $error[] = 'You forgot to enter your address.';
    } else {
        $ad = mysqli_real_escape_string($conn, trim($_POST['userAddress']));
    }

    // Register the user in the database
    // Make the query:
    $q = "INSERT INTO user (userID, userPassword, userName, userPhoneNo, userEmail, userAddress) 
    VALUES ('', '$p', '$n', '$ph', '$e', '$ad')";
    $result = @mysqli_query($conn, $q); // Run the query
    if ($result) // If it runs
    {
        echo '<div class="container">';
        echo '<h1>Thank You</h1>';
        echo '<div class="back-to-login"><a href="userLogin.php" class="button">Back to Login</a></div>';
        echo '</div>';
        exit();
    } else { // If it didn't run
        // Message
        echo '<h1>System Error</h1>';

        // Debugging Message
        echo '<p>' . mysqli_error($conn) . '<br><br>Query: ' . $q . '</p>';
    } // End of it (result)
    mysqli_close($conn); // Close the database connection
    exit();
} // End of the main submit conditional
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration | Women's Bag</title>
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
    <h2>Register User</h2>
    <h4>*required field</h4>
    <form action="usersignin.php" method="post">
        <div>
            <label for="userName">Full Name*:</label>
            <input type="text" id="userName" name="userName" placeholder="Enter your full name" required>
        </div>
        <div>
            <label for="userPassword">Password:</label>
            <input type="password" id="userPassword" name="userPassword" placeholder="Enter your password" required>
        </div>
        <div>
            <label for="userPhoneNo">Phone No.*:</label>
            <input type="tel" pattern="[0-9]{3}-[0-9]{7}" id="userPhoneNo" name="userPhoneNo"
                   placeholder="Enter your phone number" required>
        </div>
        <div>
            <label for="userEmail">User Email*:</label>
            <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" id="userEmail" name="userEmail"
                   placeholder="Enter your email" required>
        </div>
        <div>
            <label for="userAddress">User Address*:</label>
            <textarea id="userAddress" name="userAddress" rows="4" cols="50"
                      placeholder="Enter your address" required></textarea>
        </div>
        <div>
            <button type="submit">Register</button>
            <button type="reset">Clear All</button>
        </div>
        <div class="back-to-login">
            <label>Already have an account?
                <a href="userLogin.php" class="button">Login</a>
            </label>
        </div>
    </form>
</div>
</body>
</html>
