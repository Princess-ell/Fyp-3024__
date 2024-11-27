<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Localuxe - User Login</title>
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
            background-color: rgba(255, 255, 255, 0.85);
            border-radius: 15px;
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.2);
            
            padding: 40px;
            width: 400px;
            max-width: 90%;
            text-align: center;
            border: 3px solid;
            border-image: linear-gradient(to right, #8B4513, #A0522D, #D2691E);
            border-image-slice: 1;
        }

        h2 {
            margin-bottom: 20px;
            color: #8B4513;
            font-size: 28px;
            font-weight: bold;
        }

        label {
            display: block;
            text-align: left;
            margin-bottom: 5px;
            font-size: 16px;
            color: #555;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 20px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #f5b85e;
            outline: none;
        }

        button {
            background-color: #f5b85e;
            color: #fff;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #e39f33;
        }

        .error {
            color: red;
            margin-bottom: 15px;
            font-size: 14px;
        }

        .signup-link {
            margin-top: 20px;
            color: #8B4513;
            font-size: 16px;
        }

        .signup-link a {
            color: #e39f33;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s;
        }

        .signup-link a:hover {
            color: #f5b85e;
        }
    </style>
</head>
<body>

<?php
session_start();
include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $loginSuccessful = false;

    if (!empty($_POST['userName'])) {
        $userName = mysqli_real_escape_string($conn, $_POST['userName']);
    } else {
        $userName = FALSE;
        $error_message = 'You forgot to enter your username.';
    }

    if (!empty($_POST['userPassword'])) {
        $password = mysqli_real_escape_string($conn, $_POST['userPassword']);
    } else {
        $password = FALSE;
        $error_message = 'You forgot to enter your password.';
    }

    if ($userName && $password) {
        $q = "SELECT userID, userPassword, userName, userPhoneNo, userEmail, userAddress 
              FROM user WHERE userName = '$userName'";
        $result = mysqli_query($conn, $q);

        if (@mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);

            if (password_verify($password, $user['userPassword']) || $password === $user['userPassword']) {
                $loginSuccessful = true;

                $_SESSION['userID'] = $user['userID'];
                $_SESSION['userName'] = $user['userName'];
                $_SESSION['userEmail'] = $user['userEmail'];
                $_SESSION['userPhoneNo'] = $user['userPhoneNo'];
                $_SESSION['userAddress'] = $user['userAddress'];

                $redirect_url = isset($_SESSION['redirect_url']) ? $_SESSION['redirect_url'] : 'index.php';
                header("Location: $redirect_url");
                exit();
            } else {
                $error_message = 'Invalid password. Please try again.';
            }
        } else {
            $error_message = 'The username entered does not match our records. Perhaps you need to register?';
        }
    } else {
        $error_message = 'Please try again.';
    }

    mysqli_close($conn);
}
?>

<div class="container">
    <h2>USER LOGIN</h2>

    <?php if (isset($error_message)): ?>
        <p class="error"><?php echo $error_message; ?></p>
    <?php endif; ?>

    <form action="userLogin.php" method="post">
        <div>
            <label for="userName">Username:</label>
            <input type="text" id="username" name="userName" placeholder="Enter your username" size="20" maxlength="30" required value="<?php if (isset($_POST['userName'])) echo $_POST['userName']; ?>">
        </div>
        <div>
            <label for="userPassword">Password:</label>
            <input type="password" id="userPassword" name="userPassword" placeholder="Enter your password" size="15" maxLength="60" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number, one uppercase and lowercase letter, and at least 8 or more characters" value="<?php if (isset($_POST['userPassword'])) echo $_POST['userPassword']; ?>">
        </div>
        <div>
            <button type="submit">Login</button>
            <button type="reset">Reset</button>
        </div>
        <div class="signup-link">
            Don't have an account? <a href="usersignin.php">Sign Up</a>
        </div>
    </form>
</div>

</body>
</html>
