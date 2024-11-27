<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Localuxe - Beauty & Makeup Tutorials</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <div class="header-container">
        <div class="logo">
            <h1>LOCALUXE</h1>
        </div>
        <!-- Icons Section -->
        <div class="header-icons">
            <!-- Search Icon -->
            <div class="search-icon" onclick="toggleSearch()">
                <img src="search.png" alt="Search">
            </div>
            <!-- Hidden Search Container -->
            <div class="search-container" id="search-container">
                <input type="text" placeholder="Search for products, brands, tutorials..." id="search-input">
                <button>Search</button>
            </div>


            <div class="cart-icon">
                <img src="trolli.png" alt="Cart">
            </div>
        </div>
    </div>
    
</header>

<!-- Navigation Bar -->
<nav class="navbar">
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="makeup.php" id="makeup-link">Makeup</a></li>
        <li><a href="tutorial.php" class="active">Tuts</a></li>
        <li><a href="skintone.php">Skin Tone</a></li>
        <li><a href="purchase.php">Your Order</a></li>
    </ul>
</nav>

<section class="tutorial-video">
    <h2>Glowing Look</h2>
    <div class="video-container">
        <!-- Embed the YouTube video -->
        <iframe src="https://www.youtube.com/embed/O2CD_mg3UfY?si=aMJvdKaogDPWolJW" 
                frameborder="0" 
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                allowfullscreen></iframe>
    </div>
</section>



<script>
// Add your JavaScript code here if needed
// JavaScript for the search toggle
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

/* Styling for the Tutorial Section */
.tutorial-video {
    text-align: center;
    margin: 40px auto;
    padding: 20px;
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
    max-width: 1100px;
}

.tutorial-video h2 {
    font-size: 32px;
    color: #bb7349;
    font-family: 'Georgia', serif;
    margin-bottom: 20px;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
}

.video-container {
    position: relative;
    width: 100%; /* Make the video container full width of its parent */
    max-width: 1100px; /* Optional: Set a max-width to prevent excessive stretching */
    margin: 0 auto; /* Center it horizontally */
    overflow: hidden;
    padding-top: 56.25%; /* Maintain the 16:9 aspect ratio */
    border-radius: 15px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
}

.video-container iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: 0;
    border-radius: 15px;
}


.tutorial-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    margin-top: 20px;
}

.tutorial-card {
    background-color: #fff;
    border-radius: 12px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.tutorial-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
}

.tutorial-card img {
    width: 100%;
    height: 150px;
    object-fit: cover;
}

.tutorial-info {
    padding: 15px;
}

.tutorial-info h3 {
    font-size: 18px;
    color: #bb7349;
    margin-bottom: 10px;
}

.tutorial-info p {
    font-size: 14px;
    color: #666;
    line-height: 1.5;
}