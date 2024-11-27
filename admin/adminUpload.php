<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Localuxe - Admin Upload</title>
    <link rel="stylesheet" href="style.css">
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
        <li><a href="orders.php">Orders Placed</a></li>

    </ul>
</nav>

<a href="maaezUpload.php" class="brand-link">
  <div class="brand-card">
    <img src="maaezbrand.jpeg" alt="Maaez Products" class="brand-image">
    <h3 class="brand-name">Maaez Products</h3>
  </div>
</a>

<a href="sobellaUpload.php" class="brand-link">
  <div class="brand-card">
    <img src="sobellabrand.png" alt="Sobella Products" class="brand-image">
    <h3 class="brand-name">Sobella Products</h3>
  </div>
</a>

<a href="cubremiUpload.php" class="brand-link">
  <div class="brand-card">
    <img src="cubremibrand.jpeg" alt="Cubre Mi Products" class="brand-image">
    <h3 class="brand-name">Cubre Mi Products</h3>
  </div>
</a>

<a href="simplysitiUpload.php" class="brand-link">
  <div class="brand-card">
    <img src="simplysitibrand.png" alt="Simplysiti Products" class="brand-image">
    <h3 class="brand-name">Simplysiti Products</h3>
  </div>
</a>

<a href="bihanUpload.php" class="brand-link">
  <div class="brand-card">
    <img src="bihanbrand.jpg" alt="Bihan Products" class="brand-image">
    <h3 class="brand-name">Bihan Products</h3>
  </div>
</a>

<a href="anasUpload.php" class="brand-link">
  <div class="brand-card">
    <img src="anasbrandd.jpg" alt="Anas Products" class="brand-image">
    <h3 class="brand-name">Anas Products</h3>
  </div>
</a>

<a href="in2itUpload.php" class="brand-link">
  <div class="brand-card">
    <img src="in2itbrandd.jpg" alt="Bihan Products" class="brand-image">
    <h3 class="brand-name">in2it Products</h3>
  </div>
</a>

<a href="silkygirlUpload.php" class="brand-link">
  <div class="brand-card">
    <img src="silkygirlbrandd.jpg" alt="Bihan Products" class="brand-image">
    <h3 class="brand-name">Silkygirl Products</h3>
  </div>
</a>

<a href="alhaalfaUpload.php" class="brand-link">
  <div class="brand-card">
    <img src="alhaalfabrand.png" alt="Bihan Products" class="brand-image">
    <h3 class="brand-name">Alha Alfa Products</h3>
  </div>
</a>



<!-- Footer -->
<footer>
    <!-- Your footer content here -->
</footer>

<script src="script.js"></script>
</body>
</html>

<style>

{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

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
    position: relative; /* Keep it relative for absolute positioning */
}

.header-icons {
    display: flex; /* Ensure icons are aligned horizontally */
    align-items: center; /* Center vertically */
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

/* Cart Sidebar Styles */
.cart-sidebar {
    position: fixed;
    top: 0;
    right: 0;
    width: 300px;
    height: 100%;
    background-color: white;
    box-shadow: -2px 0 5px rgba(0, 0, 0, 0.2);
    padding: 20px;
    transform: translateX(100%);
    transition: transform 0.3s ease;
    z-index: 1000;
    box-sizing: border-box;
}

/* Active class to show cart sidebar */
.cart-sidebar.active {
    transform: translateX(0);
}

/* Close Button Styles */
.close-btn {
    position: absolute;
    top: 10px;
    right: 15px;
    font-size: 24px;
    color: #333;
    cursor: pointer;
}

.cart-sidebar h2 {
    margin-top: 30px;
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
    color: white;
    text-decoration: none;
    font-size: 18px;
    padding: 8px 16px;
    font-family: 'Times New Roman', Times, serif;
}

.navbar ul li a:hover {
    background-color: black;
    border-radius: 4px;
}


.brand-card {
  width: 250px;
  margin: 15px;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  overflow: hidden;
  background-color: #f8f9fa;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.brand-card:hover {
  transform: scale(1.05);
  box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
}

.brand-image {
  width: 100%;
  border-radius: 8px;
  transition: filter 0.3s ease;
}

.brand-card:hover .brand-image {
  filter: brightness(1.1);
}

.brand-name {
  text-align: center;
  margin-top: 15px;
  font-size: 18px;
  font-weight: bold;
  color: #333;
}

.brand-link {
  text-decoration: none;
  color: inherit;
  display: inline-block;
  transition: transform 0.3s ease;
}

.brand-link:hover .brand-card {
  transform: scale(1.05);
  box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
}

.brand-link:hover .brand-image {
  filter: brightness(1.1);
}

</style>

