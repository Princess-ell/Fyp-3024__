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

            <!-- Love Icon -->
<div class="love-icon">
    <a href="fav.php">
        <img src="heart.png" alt="Love">
    </a>
</div>

            <div class="sign-in-icon" onclick="toggleSignInMenu()">
                <img src="sign.png" alt="Sign In">
                <div class="dropdown-menu" id="dropdown-menu">
                    <div class="dropdown-item" onclick="location.href='login.php'">Login</div>
                    <div class="dropdown-item" onclick="location.href='register.php'">Register</div>
                </div>
            </div>
            <div class="cart-icon" onclick="toggleCartSidebar()">
                <img src="trolli.png" alt="Cart">
            </div>
        </div>
    </div>
</header>

<div id="cart-sidebar" class="cart-sidebar">
    <span class="close-btn" onclick="toggleCartSidebar()">&times;</span>
    <h2>Your Cart</h2>
    <div id="cart-items"></div>
</div>


<!-- Navigation Bar -->
<nav class="navbar">
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="makeup.php">Makeup</a></li>
        <li><a href="tutorial.php">Tuts</a></li>
        <li><a href="skintone.php">Skin Tone</a></li>
        <?php
        session_start();
        if (isset($_SESSION['username'])) {
            echo '<li><a href="logout.php">Logout</a></li>';
        } else {
            echo '<li><a href="login.php">Login</a></li>';
        }
        ?>
    </ul>
</nav>


<div class="page-container">
    <div class="content-container">
        <!-- Your page content here -->
        <div class="left-nav">
    <h3>FACE</h3>
    <ul>
        <li><a href="foundation.php">Foundation</a></li>
        <li><a href="powder.php">Powder</a></li>
        <li><a href="spray.php">Setting Spray</a></li>
    </ul>
    
    <!-- Brand Filter -->
    <h3>BRANDS</h3>
    <form method="GET" action="face.php">
        <!-- Search Brand Input -->
        <input type="text" name="search_brand" placeholder="Search Brands">
        
        <!-- Brand Checkboxes -->
        <div class="brand-filters">
            <label><input type="checkbox" name="brand[]" value="Maaez"> Maaez</label><br>
            <label><input type="checkbox" name="brand[]" value="Sobella"> Sobella</label><br>
            <label><input type="checkbox" name="brand[]" value="Cubre Mi"> Cubre Mi</label><br>
            <label><input type="checkbox" name="brand[]" value="Bihan"> Bihan</label><br>
            <label><input type="checkbox" name="brand[]" value="Wawa Cosmetics"> Wawa Cosmetics</label><br>
            <!-- Add more brands as needed -->
        </div>
        
        <!-- Submit button -->
        <input type="submit" value="Apply Filters">
    </form>
</div>


    <!-- Right Content (Products) -->
    <div class="products-section">
    <h2>Face Products</h2>
    <div class="product-grid">
        
    <div class="product-card">
    <a href="makeitglow.php"> <!-- Replace with the actual product URL -->
        <img src="makeitglow.jpeg" alt="Foundation">
    </a>
    <h4 class="product-name">Maaez Make It Glow</h4>
    <h4 class="product-type">Foundation</h4>
    <p class="product-price">RM29.90 - RM49.90</p>
    <button>Add to Cart</button>
    <button>Buy Now</button>
    <button>&hearts; Favorite</button>
</div>


<div class="product-card">
    <a href="makeitglow.php"> <!-- Replace with the actual product URL -->
        <img src="sobellafd.jpeg" alt="Foundation">
    </a>
    <h4 class="product-name">Sobella Foundation</h4>
    <h4 class="product-type">Foundation</h4>
    <p class="product-price">RM36.00</p>
    <button>Add to Cart</button>
    <button>Buy Now</button>
    <button>&hearts; Favorite</button>
</div>

        <div class="product-card">
    <a href="makeitglow.php"> <!-- Replace with the actual product URL -->
        <img src="cubremifd.jpeg" alt="Foundation">
    </a>
    <h4 class="product-name">Cubre Mi Foundation</h4>
    <h4 class="product-type">Foundation</h4>
    <p class="product-price">RM19.90</p>
    <button>Add to Cart</button>
    <button>Buy Now</button>
    <button>&hearts; Favorite</button>
</div>

<div class="product-card">
    <a href="makeitglow.php"> <!-- Replace with the actual product URL -->
        <img src="serumfd.jpeg" alt="Foundation">
    </a>
    <h4 class="product-name">Maaez Luminious Silk</h4>
    <h4 class="product-type">Foundation</h4>
    <p class="product-price">RM69.90</p>
    <button>Add to Cart</button>
    <button>Buy Now</button>
    <button>&hearts; Favorite</button>
</div>

<div class="product-card">
    <a href="makeitglow.php"> <!-- Replace with the actual product URL -->
        <img src="cubcushion.jpeg" alt="Foundation">
    </a>
    <h4 class="product-name">Cubre Mi X Sallywho cushion foundation</h4>
    <h4 class="product-type">Foundation</h4>
    <p class="product-price">RM21.00</p>
    <button>Add to Cart</button>
    <button>Buy Now</button>
    <button>&hearts; Favorite</button>
</div>

<div class="product-card">
    <a href="makeitglow.php"> <!-- Replace with the actual product URL -->
        <img src="bihanfd.jpg" alt="Foundation">
    </a>
    <h4 class="product-name">Bihan liquid foundation </h4>
    <h4 class="product-type">Foundation</h4>
    <p class="product-price">RM15.90</p>
    <button>Add to Cart</button>
    <button>Buy Now</button>
    <button>&hearts; Favorite</button>
</div>

        <!-- Add more product cards as needed -->
    </div>
</div>


    </div>
    <footer>
    <div class="footer-container">
        <div class="footer-section">
            <h3>About Us</h3>
            <ul>
                <li><a href="#">About Localuxe</a></li>
                <li><a href="#">Careers</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Terms of Use</a></li>
                <li><a href="#">International</a></li>
                <li><a href="#">Sitemap</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h3>Customer Care</h3>
            <ul>
                <li><a href="#">Delivery</a></li>
                <li><a href="#">FAQ</a></li>
                <li><a href="#">Beauty Services</a></li>
                <li><a href="#">Store Events</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h3>Beauty Rewards</h3>
            <img src="path_to_logo.png" alt="Localuxe Rewards">
            <button>Explore Benefits</button>
        </div>
        <div class="footer-section">
            <h3>Get the App</h3>
            <img src="path_to_qr_code.png" alt="QR Code">
            <div class="app-links">
                <a href="#"><img src="path_to_apple_store_badge.png" alt="App Store"></a>
                <a href="#"><img src="path_to_google_play_badge.png" alt="Google Play"></a>
            </div>
        </div>
        <div class="footer-section">
            <h3>Connect with Us</h3>
            <div class="social-icons">
                <a href="#"><img src="path_to_facebook_icon.png" alt="Facebook"></a>
                <a href="#"><img src="path_to_instagram_icon.png" alt="Instagram"></a>
            </div>
            <h3>Payment Options</h3>
            <div class="payment-icons">
                <img src="path_to_paypal_icon.png" alt="Paypal">
                <img src="path_to_visa_icon.png" alt="Visa">
                <img src="path_to_mastercard_icon.png" alt="Mastercard">
                <!-- Add more payment icons here -->
            </div>
        </div>
    </div>
</footer>
</div>
 


<!-- Add your JavaScript here -->
<script>
// Add your custom script if needed
function toggleSearch() {
    var searchContainer = document.getElementById("search-container");
    
    if (searchContainer.classList.contains("active")) {
        // If currently active, remove the active class
        searchContainer.classList.remove("active");
        
        // Delay the hiding of display property to allow transition
        setTimeout(() => {
            searchContainer.style.display = 'none'; // Set display to none after transition
        }, 300); // Match the duration of your CSS transition
    } else {
        // If not active, show the search container
        searchContainer.style.display = 'flex'; // Show it as flex first
        searchContainer.classList.add("active");
        var searchInput = document.getElementById("search-input");
        searchInput.focus(); // Focus on the input field when search is activated
    }
}

function toggleSignInMenu() {
    var dropdownMenu = document.getElementById("dropdown-menu");
    
    if (dropdownMenu.style.display === "block") {
        dropdownMenu.style.display = "none"; // Hide if it's already displayed
    } else {
        dropdownMenu.style.display = "block"; // Show the dropdown menu
    }
}

// Close dropdown when clicking outside of it
document.addEventListener('click', function (e) {
    var dropdownMenu = document.getElementById("dropdown-menu");
    var signInIcon = document.querySelector('.sign-in-icon');
    
    if (!dropdownMenu.contains(e.target) && !signInIcon.contains(e.target)) {
        dropdownMenu.style.display = 'none'; // Hide the dropdown
    }
});

let cart = [];

function addToCart(button) {
    const productCard = button.closest('.product-card');
    const productName = productCard.getAttribute('data-name');
    const productPrice = parseFloat(productCard.getAttribute('data-price'));

    const existingItem = cart.find(item => item.name === productName);
    if (existingItem) {
        existingItem.quantity += 1;
    } else {
        cart.push({ name: productName, price: productPrice, quantity: 1 });
    }
    displayCartItems();
}

function displayCartItems() {
    const cartItemsContainer = document.getElementById('cart-items');
    cartItemsContainer.innerHTML = '';

    if (cart.length === 0) {
        cartItemsContainer.innerHTML = '<p>Your cart is empty.</p>';
        return;
    }

    cart.forEach(item => {
        const itemElement = document.createElement('div');
        itemElement.className = 'cart-item';
        itemElement.innerHTML = `
            <p><strong>${item.name}</strong></p>
            <p>Price: RM${item.price.toFixed(2)}</p>
            <p>Quantity: ${item.quantity}</p>
            <hr>
        `;
        cartItemsContainer.appendChild(itemElement);
    });
}

function toggleCartSidebar() {
    const cartSidebar = document.getElementById('cart-sidebar');
    cartSidebar.classList.toggle('active');
}
</script>

<style>
/* Style for left navigation and products */

<style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

html, body {
    height: 100%; /* Ensures the body and html elements take up full height */
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

/* Sign In and Cart Icons */
.cart-icon {
    margin-left: 5px;
    cursor: pointer;
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

.cart-item {
    border-bottom: 1px solid #ccc;
    margin-bottom: 10px;
    padding: 5px 0;
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

.page-container {
    display: flex;
    flex-direction: column;
    min-height: 100vh; /* Full viewport height */
}

.content-container {
    flex: 1; /* Takes available space */
    display: flex;
    margin: 20px;
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

/* Footer Styling */
footer {
    background-color: black;
    padding: 40px 20px;
    /* Make sure footer takes full width */
    width: 100%;
}

/* Main footer container using flexbox */
.footer-container {
    display: flex;
    justify-content: space-between; /* Even spacing between sections */
    flex-wrap: wrap; /* Allow wrapping on smaller screens */
    gap: 20px; /* Space between items */
    max-width: 1200px; /* Ensure container has a max width */
    margin: 0 auto; /* Center the footer */
}

/* Individual sections take up equal space */
.footer-section {
    flex: 1;
    min-width: 200px; /* Ensure minimum width for smaller screens */
}

/* Styling for heading */
.footer-section h3 {
    margin-bottom: 20px;
    font-size: 16px;
    font-weight: bold;
    color: white;
}

/* Links in the footer */
.footer-section ul {
    list-style: none;
    padding: 0;
    
}

.footer-section ul li {
    margin-bottom: 10px;
    color: white;
}

.footer-section ul li a {
    text-decoration: none;
    color: white;
}

.footer-section ul li a:hover {
    text-decoration: underline;
}

/* Make sure images like logos or QR codes don't exceed their container */
.footer-section img {
    max-width: 100%;
}

/* Style buttons */
.footer-section button {
    padding: 10px 20px;
    background-color: #000;
    color: #fff;
    border: none;
    cursor: pointer;
}

/* Styling for app download section */
.footer-section .app-links img {
    width: 120px;
    margin: 10px 0;
}

/* Social and payment icons */
.social-icons img, .payment-icons img {
    width: 40px;
    margin-right: 10px;
}

/* Align icons in a horizontal row */
.payment-icons img {
    margin-bottom: 10px;
}


.left-nav {
    width: 25%;
    padding: 10px;
}

.left-nav ul {
    list-style-type: none;
    padding: 0;
}

.left-nav ul li {
    margin: 5px 0;
}

.left-nav ul li a {
    text-decoration: none;
    color: #b16c59;
}

.products-section {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    gap: 20px;
}

.product-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 20px; /* Space between product cards */
    justify-content: flex-start; /* Aligns products evenly */
}



.product-card {
    width: calc(25% - 20px); /* Make each card take 25% of the width minus the gap */
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 8px;
    padding: 15px;
    background-color: #fff;
    text-align: center;
    margin-bottom: 20px;
    overflow: hidden;
    transition: transform 0.3s;
}


.product-card:hover {
    transform: translateY(-5px);
}

.product-card img {
    width: 100%;
    border-radius: 10px;
}

.product-card h4 {
    margin: 10px 0;
    font-size: 16px;
    color: #444;
}

.product-card p {
    color: #777;
    margin-bottom: 15px;
}

.product-type, .product-name, .product-price {
    margin: 5px 0;
}

.product-type {
    font-size: 14px;
    color: #888; /* Lighter color for type */
}

.product-name {
    font-size: 16px;
    color: #444; /* Slightly darker */
}

.product-price {
    font-size: 15px;
    color: #b16c59; /* Accent color */
    font-weight: bold;
}

.button-container {
    display: flex;
    justify-content: space-around;
    margin-top: 10px;
}

button {
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
}

.add-to-cart-btn {
    background-color: #b16c59;
    color: #fff;
}

.buy-now-btn {
    background-color: #4CAF50;
    color: #fff;
}

.love-btn {
    background-color: #f44336;
    color: #fff;
}

button:hover {
    opacity: 0.9;
}

@media screen and (max-width: 768px) {
    .product-card {
        flex: 1 1 calc(50% - 20px); /* Adjust for smaller screens */
    }
    .left-nav {
        width: 100%; /* Full width on smaller screens */
    }
}


</style>

</body>
</html>