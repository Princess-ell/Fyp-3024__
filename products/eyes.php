<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cheeks Products - Localuxe</title>
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

<!-- Content Section -->
<div class="content-container">
    <!-- Left Navigation (Categories) -->
    <!-- Left Navigation (Categories and Filters) -->
<div class="left-nav">
    <h3>FACE</h3>
    <ul>
        <li><a href="#">Foundation</a></li>
        <li><a href="#">Powder</a></li>
        <li><a href="#">Setting Spray</a></li>
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

 <!-- Right Content (Product Display) -->
 <div class="right-content">
    <h2>Products</h2>
    <div class="product-container">
        <div class="product-item">
            <img src="summeria.webp" alt="Product Image">
            <h4>Product Name</h4>
            <p>$Price</p>
            <button>Add to Cart</button>
            <button>Buy Now</button>
            <button>❤️</button> <!-- Love button -->
        </div>

        <div class="product-item">
            <img src="summeria.webp" alt="Product Image">
            <h4>Product Name</h4>
            <p>$Price</p>
            <button>Add to Cart</button>
            <button>Buy Now</button>
            <button>❤️</button> <!-- Love button -->
        </div>

        <div class="product-item">
            <img src="summeria.webp" alt="Product Image">
            <h4>Product Name</h4>
            <p>$Price</p>
            <button>Add to Cart</button>
            <button>Buy Now</button>
            <button>❤️</button> <!-- Love button -->
        </div>

        <div class="product-item">
            <img src="summeria.webp" alt="Product Image">
            <h4>Product Name</h4>
            <p>$Price</p>
            <button>Add to Cart</button>
            <button>Buy Now</button>
            <button>❤️</button> <!-- Love button -->
        </div>

        <div class="product-item">
            <img src="summeria.webp" alt="Product Image">
            <h4>Product Name</h4>
            <p>$Price</p>
            <button>Add to Cart</button>
            <button>Buy Now</button>
            <button>❤️</button> <!-- Love button -->
        </div>

        <div class="product-item">
            <img src="summeria.webp" alt="Product Image">
            <h4>Product Name</h4>
            <p>$Price</p>
            <button>Add to Cart</button>
            <button>Buy Now</button>
            <button>❤️</button> <!-- Love button -->
        </div>

        <!-- Repeat product-item divs for other products -->
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
    </script>
    
    <style>
    /* Style for left navigation and products */
    
    <style>
        * {
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
    
footer {
    background-color: black;
    color: white;
    padding: 40px 20px;
    position: relative;
    width: 100%;
    bottom: 0;
    left: 0;
}

.footer-container {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    max-width: 1200px;
    margin: 0 auto;
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
    
    
    .content-container {
        display: flex;
        margin: 20px;
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

    .content-container {
    display: flex;
    margin: 20px;
}


.product-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px; /* Space between products */
    justify-content: space-between; /* Adjust to align items */
}

.product-item {
    flex: 1 1 calc(33.333% - 20px); /* Three items per row, adjustable */
    box-sizing: border-box;
    background-color: #fff;
    padding: 15px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    text-align: center; /* Center text */
}

.product-item button {
    margin: 5px;
    padding: 8px 12px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    background-color: #b16c59;
    color: white;
}

.product-item button:hover {
    background-color: #8a4c3a;
}


</style>

</body>
</html>