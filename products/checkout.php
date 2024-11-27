<?php
session_start();
include 'connection.php';

// Check if user is logged in
if (!isset($_SESSION['userID'])) {
    header("Location: userLogin.php");
    exit;
}

$userID = $_SESSION['userID'];

// Handle file upload
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['proof'])) {
    $targetDir = "uploads/";  // Directory to store uploaded images
    $fileName = basename($_FILES['proof']['name']);
    $targetFilePath = $targetDir . $fileName;

    if (move_uploaded_file($_FILES['proof']['tmp_name'], $targetFilePath)) {
        // Insert order details into `orders` table
        $sql = "INSERT INTO orders (userID, qrProofImage) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("is", $userID, $targetFilePath);
        if ($stmt->execute()) {
            $orderID = $stmt->insert_id;

            // Insert products into `order_items` table
            $cartQuery = "
    SELECT productID, shadeID, quantity 
    FROM cart 
    WHERE userID = ?";
$cartStmt = $conn->prepare($cartQuery);
$cartStmt->bind_param("i", $userID);
$cartStmt->execute();
$cartResult = $cartStmt->get_result();

while ($row = $cartResult->fetch_assoc()) {
    $insertItems = "
        INSERT INTO order_items (orderID, productID, shadeID, quantity) 
        VALUES (?, ?, ?, ?)";
    $itemStmt = $conn->prepare($insertItems);
    $itemStmt->bind_param("iiii", $orderID, $row['productID'], $row['shadeID'], $row['quantity']);
    $itemStmt->execute();
}

            // Clear the cart
            $deleteCart = "DELETE FROM cart WHERE userID = ?";
            $clearCartStmt = $conn->prepare($deleteCart);
            $clearCartStmt->bind_param("i", $userID);
            $clearCartStmt->execute();

            echo "<p>Thank you for purchasing!</p>";
            echo "<a href='purchase.php'><button>Track Your Shipping</button></a>";
            exit;
        }
    }
}


// Display QR code and upload form
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Face Products - Localuxe</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

    <!-- Header -->
    <header>
        <div class="header-container">
            <div class="logo">
                <h1>LOCALUXE</h1>
            </div>
            <div class="header-icons">
                <div class="search-icon" onclick="toggleSearch()">
                    <img src="search.png" alt="Search">
                </div>
                <div class="search-container" id="search-container">
                    <input type="text" placeholder="Search for products, brands, tutorials..." id="search-input">
                    <button>Search</button>
                </div>
                <div class="cart-icon">
                    <a href="cart.php">
                        <img src="trolli.png" alt="Cart">
                </div>
                <?php if (isset($_SESSION['userID'])): ?>
                    <div class="logout-button">
                        <a href="logout.php">
                            <button>Logout</button>
                        </a>
                    </div>
                <?php else: ?>
                    <div class="sign-in-icon" onclick="toggleSignInMenu()">
                        <img src="sign.png" alt="Sign In">
                        <div class="dropdown-menu" id="dropdown-menu">
                            <div class="dropdown-item" onclick="location.href='userLogin.php'">Login</div>
                            <div class="dropdown-item" onclick="location.href='usersignin.php'">Register</div>
                        </div>
                    </div>
                <?php endif; ?>

    </header>

    <!-- Navigation Bar -->
    <nav class="navbar">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="makeup.php">Makeup</a></li>
            <li><a href="tutorial.php">Tuts</a></li>
            <li><a href="skintone.php">Skin Tone</a></li>
            <li><a href="purchase.php">Your Order</a></li>


        </ul>
    </nav>

    <h2>Checkout</h2>
<p>Scan the QR code to make payment.</p>
<div class="qr-code-container">
    <img src="qrr.jpg" alt="QR Code">
</div>
<div class="form-container">
        <h2>Upload Payment Proof</h2>
        <form method="post" enctype="multipart/form-data">
            <label for="proof">Upload Payment Proof:</label>
            <input type="file" name="proof" id="proof" required>
            <button type="submit">Submit</button>
        </form>
    </div>

<style>

 /* Header Section */
 .header-container {
    display: flex;
    justify-content: space-between; /* Ensures space between logo and icons */
    align-items: center;
    padding: 20px;
    background-color: white;
}

.header-icons {
    display: flex;
    align-items: center; /* Center icons vertically */
    margin-left: auto; /* Push icons to the right */
}

.header-icons > div {
    margin-left: 15px; /* Add spacing between icons */
}



.logo h1 {
    margin: 0;
    font-size: 36px;
    color: black;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    margin-left: 15px;
}

.search-container {
    display: none; /* Hidden by default */
    position: absolute; /* Position absolutely */
    left: 50%; /* Center horizontally */
    top: 50%; /* Center vertically */
    transform: translate(-50%, -50%); /* Adjust for centering */
    z-index: 1000; /* Keep it above other elements */
}

/* Show the search bar when the class 'active' is added */
.search-container.active {
    display: flex; /* Change to flex to make it clickable */
    align-items: center; /* Center items inside */
}

/* Style for input and button */
#search-input {
    padding: 8px; /* Add padding */
    border: 1px solid #ccc; /* Add border */
    border-radius: 4px; /* Rounded corners */
    margin-right: 5px; /* Space between input and button */
}

.search-icon img {
    width: 25px;
    height: 25px;
}

.love-icon {
    margin-left: 10px; /* Adjust spacing as needed */
    cursor: pointer; /* Change cursor to pointer */
}

.love-icon img {
    width: 20px; /* Adjust the size of the love icon */
    height: 20px; /* Keep the height consistent with other icons */
}

.sign-in-icon {
    margin-left: 5px;
    position: relative; /* Required for dropdown positioning */
    cursor: pointer; /* Change cursor to pointer */
}

/* Sign In and Cart Icons */
.cart-icon {
    margin-left: 5px;
    cursor: pointer;
}

.sign-in-icon img {
    width: 40px; /* Adjust the size of the icons */
    height: 40px;
}

.dropdown-menu {
    display: none; /* Initially hidden */
    position: absolute; /* Position it below the sign-in icon */
    top: 100%; /* Align it directly under the icon */
    left: 50%; /* Center it */
    transform: translateX(-50%); /* Center alignment */
    background-color: white; /* Background color */
    border: 1px solid black; /* Border for visibility */
    border-radius: 4px; /* Rounded corners */
    z-index: 100; /* Ensure it appears above other elements */
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); /* Optional shadow */
}

.dropdown-item {
    padding: 10px 15px; /* Add padding for items */
    cursor: pointer; /* Pointer cursor */
}

.dropdown-item:hover {
    background-color: #f0f0f0; /* Hover effect */
}

.cart-icon img {
    width: 30px;
    height: 30px;
}

/* Centering and Styling the Navigation Bar */
.navbar {
    background-color: rgba(187, 115, 73, 0.993);
    padding: 15px;
    display: flex;
    justify-content: center; /* Center the nav items */
    align-items: center; /* Vertically align the items */
}

.navbar ul {
    list-style-type: none;
    display: flex;
}

.navbar ul li {
    margin: 0 20px;
}

.navbar ul li a {
    color: black;
    text-decoration: none;
    font-size: 18px;
    padding: 8px 16px;
    font-family: 'Times New Roman', Times, serif;
}

.navbar ul li a:hover {
    background-color: antiquewhite;
    border-radius: 4px;
}

.qr-code-container {
    display: flex;
    justify-content: center; /* Centers horizontally */
    align-items: center; /* Centers vertically */
    margin: 20px 0; /* Add spacing around the QR code */
}

.qr-code-container img {
    max-width: 300px; /* Adjust the maximum width of the image */
    height: auto; /* Maintain aspect ratio */
    border: 2px solid #ccc; /* Optional border for styling */
    border-radius: 8px; /* Optional rounded corners */
}

 

        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        h2 {
            color: #333;
        }

        label {
            font-size: 14px;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
            display: block;
        }

        input[type="file"] {
            display: block;
            width: 100%;
            padding: 10px;
            margin: 10px 0 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            color: #333;
            background-color: #f9f9f9;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            color: #fff;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }

        button:active {
            background-color: #388e3c;
        }

</style>
