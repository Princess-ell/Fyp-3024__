
<?php
// Database connection
include 'connection.php';

// Fetch products with category name and brand name using JOIN
$query = "SELECT p.productID, p.productName, p.productDesc, p.productPrice, p.productQuan, 
                 c.categoryName, b.brandName
          FROM products p
          LEFT JOIN categories c ON p.categoryID = c.categoryID
          LEFT JOIN brands b ON p.brandID = b.brandID";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css"> <!-- Optional: External CSS -->
</head>
<body>
    <!-- Header Section -->
    <header>
        <div class="header-container">
            <div class="logo">
                <h1>LOCALUXE</h1>
            </div>
        </div>
    </header>

    <!-- Navigation Bar -->
    <nav class="navbar">
        <ul>
            <li><a href="adminUpload.php">Upload</a></li>
            <li><a href="adminDashboard.php">Admin Dashboard</a></li>
            <li><a href="orders.php">Order Placed</a></li>
            
        </ul>
    </nav>

    <main>
    <section class="dashboard-header">
        <h1>Admin Dashboard</h1>
        <p>Manage your products, view details, and take quick actions.</p>
    </section>

    <section class="orders-section">
        <h2>Product Edit</h2>
        <table>
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Brand</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['productName']) ?></td>
                        <td><?= htmlspecialchars($row['categoryName']) ?></td>
                        <td><?= htmlspecialchars($row['brandName']) ?></td>
                        <td>RM<?= number_format($row['productPrice'], 2) ?></td>
                        <td>
                            <a href="updateProduct.php?productID=<?= $row['productID'] ?>" class="action-btn update-btn">Update</a>
                        
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </section>
</main>

</body>
</html>

<style>
/* General Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Body Styling */
body {
    font-family: 'Arial', sans-serif;
    background-color: #f5f5f5;
    cursor: url('cursorr.png'), auto !important;
}

/* Header Section */
.header-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
    background-color: white;
}

.logo h1 {
    font-size: 36px;
    color: black;
    font-family: Cambria, serif;
    margin-left: 15px;
}

.header-icons {
    display: flex;
    align-items: center;
    margin-left: auto;
}

.search-icon img,
.cart-icon img {
    width: 25px;
    height: 25px;
    cursor: pointer;
}

.search-container {
    display: none;
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    z-index: 1000;
}

.search-container.active {
    display: flex;
    align-items: center;
}

#search-input {
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    margin-right: 5px;
}

/* Navigation Bar */
.navbar {
    background-color: rgba(187, 115, 73, 0.993);
    padding: 15px;
    display: flex;
    justify-content: center;
}

.navbar ul {
    list-style: none;
    display: flex;
}

.navbar ul li {
    margin: 0 20px;
}

.navbar ul li a {
    text-decoration: none;
    font-size: 18px;
    color: black;
    padding: 8px 16px;
    font-family: 'Times New Roman', Times, serif;
}

.navbar ul li a:hover {
    background-color: antiquewhite;
    border-radius: 4px;
}

/* Main Content Section */
main {
    padding: 20px;
    background-color: #f9f9f9;
    font-family: 'Arial', sans-serif;
}

/* Dashboard Header */
.dashboard-header {
    text-align: center;
    margin-bottom: 20px;
}

.dashboard-header h1 {
    font-size: 32px;
    color: #bb7349;
    margin-bottom: 10px;
}

.dashboard-header p {
    font-size: 18px;
    color: #666;
}

/* Orders Section */
.orders-section {
    margin: 0 auto;
    max-width: 90%;
}

.orders-section h2 {
    font-size: 24px;
    margin-bottom: 15px;
    color: #333;
    border-bottom: 2px solid #bb7349;
    display: inline-block;
    padding-bottom: 5px;
}

/* Table Styling */
table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
    background-color: #fff;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

table th, table td {
    padding: 12px;
    text-align: left;
    border: 1px solid #ddd;
}

table th {
    background-color: #bb7349;
    color: #fff;
    font-weight: bold;
}

table tbody tr:nth-child(even) {
    background-color: #f9f9f9;
}

table tbody tr:hover {
    background-color: #f1f1f1;
}

/* Action Buttons */
.action-btn {
    text-decoration: none;
    padding: 8px 12px;
    border-radius: 4px;
    font-size: 14px;
    color: #fff;
}

.update-btn {
    background-color: #4CAF50; /* Green */
}

.delete-btn {
    background-color: #f44336; /* Red */
}

.action-btn:hover {
    opacity: 0.8;
}

</style>
