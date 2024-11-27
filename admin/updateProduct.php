<?php
include 'connection.php';

if (isset($_GET['productID'])) {
    $productID = $_GET['productID'];

    // Fetch product details for editing
    $query = "SELECT * FROM products WHERE productID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $productID);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();

    // Fetch category and brand options
    $categoryQuery = "SELECT * FROM categories";
    $categoryResult = mysqli_query($conn, $categoryQuery);
    
    $brandQuery = "SELECT * FROM brands";
    $brandResult = mysqli_query($conn, $brandQuery);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission to update the product
    $productName = $_POST['productName'];
    $productDesc = $_POST['productDesc'];
    $productPrice = $_POST['productPrice'];
    $productQuan = $_POST['productQuan'];
    $categoryID = $_POST['categoryID'];
    $brandID = $_POST['brandID'];

    // Update the product in the database
    $updateQuery = "UPDATE products SET productName = ?, productDesc = ?, productPrice = ?, productQuan = ?, categoryID = ?, brandID = ? WHERE productID = ?";
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param("ssdiisi", $productName, $productDesc, $productPrice, $productQuan, $categoryID, $brandID, $productID);
    
    if ($stmt->execute()) {
        header("Location: adminDashboard.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
    <link rel="stylesheet" href="styles.css"> <!-- External stylesheet link -->
</head>
<body>
    <!-- Header Section -->
    <header>
        <div class="header-container">
            <h1 class="logo">LOCALUXE</h1>
        </div>
    </header>

    <!-- Navigation Bar -->
    <nav class="navbar">
        <ul>
            <li><a href="adminUpload.php">Upload</a></li>
            <li><a href="adminDashboard.php">Admin Dashboard</a></li>
        </ul>
    </nav>

    <!-- Main Content -->
    <main>
        <div class="form-container">
            <h1>Update Product</h1>
            <form method="POST">
                <div class="form-group">
                    <label for="productName">Product Name</label>
                    <input type="text" id="productName" name="productName" value="<?= $product['productName'] ?>" required>
                </div>

                <div class="form-group">
                    <label for="productDesc">Description</label>
                    <textarea id="productDesc" name="productDesc" required><?= $product['productDesc'] ?></textarea>
                </div>

                <div class="form-group">
                    <label for="productPrice">Price</label>
                    <input type="number" id="productPrice" name="productPrice" value="<?= $product['productPrice'] ?>" required>
                </div>

                <div class="form-group">
                    <label for="productQuan">Quantity</label>
                    <input type="number" id="productQuan" name="productQuan" value="<?= $product['productQuan'] ?>" required>
                </div>

                <div class="form-group">
                    <label for="categoryID">Category</label>
                    <select id="categoryID" name="categoryID" required>
                        <?php while ($category = mysqli_fetch_assoc($categoryResult)): ?>
                            <option value="<?= $category['categoryID'] ?>" <?= $category['categoryID'] == $product['categoryID'] ? 'selected' : '' ?>>
                                <?= $category['categoryName'] ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="brandID">Brand</label>
                    <select id="brandID" name="brandID" required>
                        <?php while ($brand = mysqli_fetch_assoc($brandResult)): ?>
                            <option value="<?= $brand['brandID'] ?>" <?= $brand['brandID'] == $product['brandID'] ? 'selected' : '' ?>>
                                <?= $brand['brandName'] ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>

                <button type="submit">Update Product</button>
            </form>
        </div>
    </main>
</body>
</html>

<style>
/* Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Body Styling */
body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
    color: #333;
    padding: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
}

/* Header Styling */
header {
    background-color: white;
    width: 100%;
    padding: 20px;
    text-align: center;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.logo {
    font-size: 36px;
    color: #bb7349;
}

/* Navbar Styling */
.navbar {
    background-color: #bb7349;
    width: 100%;
    display: flex;
    justify-content: center;
    padding: 15px;
}

.navbar ul {
    list-style: none;
    display: flex;
    gap: 20px;
}

.navbar ul li a {
    color: white;
    text-decoration: none;
    font-size: 18px;
    padding: 8px 16px;
    transition: background-color 0.3s;
}

.navbar ul li a:hover {
    background-color: black;
    border-radius: 4px;
}

/* Main Content */
main {
    width: 100%;
    max-width: 600px;
    margin-top: 20px;
}

.form-container {
    background: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

h1 {
    font-size: 24px;
    color: #bb7349;
    text-align: center;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 15px;
}

label {
    font-size: 16px;
    color: #555;
    display: block;
    margin-bottom: 5px;
}

input, select, textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 14px;
}

textarea {
    resize: vertical;
    height: 100px;
}

button {
    width: 100%;
    background-color: #bb7349;
    color: white;
    border: none;
    padding: 12px;
    font-size: 16px;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #9b5e37;
}
</style>
