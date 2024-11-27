<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Makeup Areas - Localuxe</title>
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
        <li><a href="tutorial.php">Tuts</a></li>
        <li><a href="skintone.php">Skin Tone</a></li>
        <li><a href="purchase.php">Your Order</a></li>
    </ul>
</nav>

<!-- Makeup Areas Section -->
<section class="makeup-areas">
    <h2>Explore Makeup Areas</h2>
    <p>Select a specific area of your face to learn more about the best makeup tips and product recommendations.</p>

    <!-- Face Icon Section -->
    <div class="face-navigation">
        <img src="face_icon.png" usemap="#face-map" alt="Face Makeup Areas" style="max-width: 100%;">
        <map name="face-map">
    <!-- Forehead (adjusted upwards) -->
    <area shape="rect" coords="150,10,450,100" href="foundation.php" alt="Forehead">
    
    <!-- Eyes -->
    <area shape="rect" coords="120,130,500,200" href="concealer.php" alt="Eyes">
    
    <!-- Cheeks (circular) -->
    <area shape="rect" coords="100,250,500,350" href="blusher.php" alt="Cheeks">
    
    <!-- Nose -->
    <area shape="rect" coords="250,250,350,350" href="nose.php" alt="Nose">
    
    <!-- Lips -->
    <area shape="rect" coords="200,330,400,450" href="lipmatte.php" alt="Lips">
</map>

    </div>
</section>

<!-- Makeup Categories Section -->
<section class="makeup-categories">
    <h2>Popular Makeup Categories</h2>
    <p>Discover makeup essentials to enhance your beauty routine.</p>

    <div class="categories-container">
        <!-- Category Card 1 -->
        <div class="category-card">
            <img src="pondesen.jpg" alt="Foundation">
            <h3>Foundation</h3>
            <a href="foundation.php" class="btn">Explore</a>
        </div>
        <!-- Category Card 2 -->
        <div class="category-card">
            <img src="powderrrr.avif" alt="Powder">
            <h3>Powder</h3>
            <a href="powder.php" class="btn">Explore</a>
        </div>
        <!-- Category Card 3 -->
        <div class="category-card">
            <img src="sprayy.avif" alt="Setting Spray">
            <h3>Setting Spray</h3>
            <a href="settingspray.php" class="btn">Explore</a>
        </div>
        <!-- Category Card 4 -->
        <div class="category-card">
            <img src="blusherrr.webp" alt="Blusher">
            <h3>Blusher</h3>
            <a href="blusher.php" class="btn">Explore</a>
        </div>
        <div class="category-card">
            <img src="contourrr.webp" alt="Blusher">
            <h3>Contour</h3>
            <a href="contour.php" class="btn">Explore</a>
        </div>
        <div class="category-card">
            <img src="mascaraaa.webp" alt="Blusher">
            <h3>Mascara</h3>
            <a href="mascara.php" class="btn">Explore</a>
        </div>
        <div class="category-card">
            <img src="highlighterrr.jpg" alt="Blusher">
            <h3>Highlighter</h3>
            <a href="highlighter.php" class="btn">Explore</a>
        </div>
        <div class="category-card">
            <img src="lipmatteee.jpg" alt="Blusher">
            <h3>Lipmatte</h3>
            <a href="lipmatte.php" class="btn">Explore</a>
        </div>
        <div class="category-card">
            <img src="eyelinerrr.jpg" alt="Blusher">
            <h3>Eyeliner</h3>
            <a href="eyeliner.php" class="btn">Explore</a>
        </div>
        <div class="category-card">
            <img src="eyeshadowww.jpg" alt="Blusher">
            <h3>Eyeshadow</h3>
            <a href="eyeshadow.php" class="btn">Explore</a>
        </div>
        <div class="category-card">
            <img src="lipglosss.jpg" alt="Blusher">
            <h3>Lipgloss</h3>
            <a href="lipgloss.php" class="btn">Explore</a>
        </div>
        <div class="category-card">
            <img src="blusherrr.webp" alt="Blusher">
            <h3>Blusher</h3>
            <a href="blusher.php" class="btn">Explore</a>
        </div>
        <!-- Add more cards as needed -->
    </div>
</section>

<script>
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
    color:black;
    text-decoration: none;
    font-size: 18px;
    padding: 8px 16px;
    font-family: 'Courier New', Courier, monospace;
}

.navbar ul li a:hover {
    background-color: antiquewhite;
    border-radius: 4px;
}

/* Makeup Categories Section */
.makeup-categories {
    text-align: center;
    padding: 50px 20px;
    background-color: tan; /* Adjust background as needed */
}

.makeup-categories h2 {
    font-size: 28px;
    color: black;
    margin-bottom: 15px;
}

.makeup-categories p {
    font-size: 16px;
    color: black;
    margin-bottom: 30px;
}

.categories-container {
    display: flex;
    justify-content: center;
    gap: 20px;
    flex-wrap: wrap; /* Allow wrapping for smaller screens */

}

.category-card {
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    border-radius: 8px;
    overflow: hidden;
    text-align: center;
    width: 220px; /* Adjust card size */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    background-color: antiquewhite; /* Adjust background as needed */
}

.category-card img {
    width: 100%;
    height: 150px; /* Adjust image height */
    object-fit: cover;
}

.category-card h3 {
    font-size: 18px;
    margin: 10px 0;
    color: #333;
}

.category-card .btn {
    display: inline-block;
    margin: 10px 0;
    padding: 10px 15px;
    font-size: 14px;
    background-color: rgba(187, 115, 73, 0.993);
    color: #fff;
    text-decoration: none;
    border-radius: 4px;
    transition: background-color 0.3s ease;
}

.category-card .btn:hover {
    background-color: #9c6d49;
}

.category-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
}

/* Centering and styling for Face Icon */
.face-navigation {
    display: flex;                 /* Use flexbox for centering */
    justify-content: center;       /* Center horizontally */
    align-items: center;           /* Center vertically */
    flex-direction: column;        /* Stack children vertically */
    margin: 20px 0;               /* Add some space around the section */
}

.face-navigation img {
    max-width: 80%;                /* Adjust the maximum width as needed */
    height: auto;                  /* Keep the aspect ratio */
    width: 600px;                  /* Set a fixed width, adjust as needed */
}

area:active {
    outline: 2px solid #f5a623; /* Highlight with an outline when clicked */
}

area:hover {
    cursor: pointer;
    opacity: 0.7; /* Slightly fade the area when hovered */
}


</style>

</body>
</html>
