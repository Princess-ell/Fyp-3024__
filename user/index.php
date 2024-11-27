
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Localuxe - Beauty & Makeup</title>
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

            <div class="cart-icon" >
            <a href="cart.php">
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
        <li><a href="tutorial.php">Tutorials</a></li>
        <li><a href="skintone.php">Skin Tone</a></li>
        <li><a href="documents/usermanual.pdf">User Manual</a></li>

    </ul>
</nav>



    <!-- Face Icon Section (initially hidden) -->
    <section class="face-navigation" id="face-section" style="display: none;">
        <h2>Makeup Areas</h2>
        <img src="face_icon.png" usemap="#face-map" alt="Face Makeup Areas" style="max-width: 100%;">
        <map name="face-map">
            <area shape="rect" coords="50,100,150,200" href="cheeks.html" alt="Cheeks">
            <area shape="rect" coords="150,50,250,150" href="eyes.html" alt="Eyes">
            <area shape="rect" coords="50,50,150,100" href="forehead.html" alt="Forehead">
            <!-- Add more areas as needed -->
        </map>
    </section>

    <!-- Slideshow Section -->
    <div class="slideshow-container">
        <div class="slide">
            <img src="maaez.jpg" alt="Promotion 1">
        </div>
        <div class="slide">
            <img src="sale.webp" alt="Promotion 2">
        </div>
        <div class="slide">
            <img src="beauty.webp" alt="Promotion 3">
        </div>
        <div class="slide">
            <img src="sitiadve.jpg" alt="Promotion 3">
        </div>
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>


    <!-- Shop by Brands Section -->
<section class="shop-by-brands">
    <h2>Shop by Brands</h2>
    <div class="brand-container">
        <!-- Example Brand Card -->
        <div class="brand-card">
            <a href="maaez.php">
                <img src="maaezbrand.jpeg" alt="Brand 1">
                <h3>Maaez Cosmetics</h3>
                <p>By Ainin Sofieya</p>
            </a>
        </div>
        <div class="brand-card">
            <a href="sobella.php">
                <img src="sobellabrand.png" alt="Brand 2">
                <h3>Sobella Beauty</h3>
                <p>By Wan Nor Syuhadah </p>
            </a>
        </div>
        <div class="brand-card">
            <a href="cubremi.php">
                <img src="cubremibrand.jpeg" alt="Brand 3">
                <h3>Cubre Mi </h3>
                <p>By Alzalifah Azizan</p>
            </a>
        </div>
        <div class="brand-card">
            <a href="bihan.php">
                <img src="bihanbrandd.jpg" alt="Brand 3">
                <h3>Bihan Makeup Girly </h3>
                <p>By Nurul Nabihan Azmi</p>
            </a>
        </div>
        <div class="brand-card">
            <a href="simplysiti.php">
                <img src="simplysitibrand.png" alt="Brand 3">
                <h3>Simplysiti </h3>
                <p>By Siti Nurhaliza</p>
            </a>
        </div>
        <div class="brand-card">
            <a href="alhaalfa.php">
                <img src="alhaalfabrand.png" alt="Brand 3">
                <h3>Alha Alfa</h3>
                <p>By Abdul Al Halim Mohd Al Fadzil</p>
            </a>
        </div>
        <div class="brand-card">
            <a href="anas.php">
                <img src="anasbrandd.jpg" alt="Brand 3">
                <h3>Anas Cosmetics </h3>
                <p>By Anas Zahrin</p>
            </a>
        </div>
        <div class="brand-card">
            <a href="silkygirl.php">
                <img src="silkygirlbrandd.jpg" alt="Brand 3">
                <h3>Silky Girl </h3>
                <p>Explore a variety of products from Brand 3.</p>
            </a>
        </div>
        <div class="brand-card">
            <a href="in2it.php">
                <img src="in2itbrandd.jpg" alt="Brand 3">
                <h3>In2it Cosmetics </h3>
                <p>By Daniel Hayes</p>
            </a>
        </div>
        <!-- Add more brand cards as needed -->
    </div>
</section>



<script>
    let slideIndex = 0;
    showSlides();

    function showSlides() {
        let slides = document.getElementsByClassName("slide");
        for (let i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) { slideIndex = 1 }
        slides[slideIndex - 1].style.display = "block";
        setTimeout(showSlides, 3000); // Change image every 3 seconds
    }

    function plusSlides(n) {
        slideIndex += n;
        showSlides();
    }

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
    font-family: 'Courier New', Courier, monospace;
}

.navbar ul li a:hover {
    background-color: antiquewhite;
    border-radius: 4px;
}

/* Product Filter Section */
.product-filters {
    text-align: center;
    padding: 20px;
    background-color: #fff;
}

.product-filters select {
    margin: 10px;
    padding: 10px;
    width: 150px;
}

.product-filters button {
    padding: 10px;
    background-color: #333;
    color: #fff;
    border: none;
    cursor: pointer;
}

/* Product Grid */
.product-grid {
    padding: 20px;
}

.product-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
}

.product-card {
    background-color: #fff;
    border: 1px solid #ddd;
    margin: 10px;
    padding: 10px;
    width: 200px;
    text-align: center;
}

.product-card img {
    width: 100%;
    height: auto;
}

.product-card h3 {
    font-size: 16px;
    margin: 10px 0;
}

.product-card button {
    background-color: #333;
    color: #fff;
    padding: 10px;
    border: none;
    cursor: pointer;
}

.product-card button:hover {
    background-color: #555;
}

/* Slideshow Styling */
.slideshow-container {
    position: relative;
    max-width: 90%;
    margin: 20px auto;
}

.slide {
    display: none;
}

.slide img {
    width: 100%;
    height: auto;
}

.prev, .next {
    cursor: pointer;
    position: absolute;
    top: 50%;
    width: auto;
    padding: 16px;
    color: white;
    font-weight: bold;
    font-size: 18px;
    transition: 0.6s ease;
    border-radius: 0 3px 3px 0;
}

.next {
    right: 0;
    border-radius: 3px 0 0 3px;
}

.prev:hover, .next:hover {
    background-color: rgba(0,0,0,0.8);
}

/* Short Video Section */
.short-video-section {
    display: flex;
    justify-content: space-around;
    align-items: center;
    padding: 40px;
    background-color: rgba(187, 115, 73, 0.993);
}

.video-container {
    width: 50%;
}

.video-description {
    width: 45%;
    padding-left: 20px;
}

.video-description h2 {
    font-size: 24px;
    margin-bottom: 10px;
}

.video-description p {
    font-size: 16px;
    margin-bottom: 20px;
}

.video-description button {
    padding: 10px 20px;
    background-color: #333;
    color: #fff;
    border: none;
    cursor: pointer;
}

.video-description button:hover {
    background-color: #555;
}



/* Shop by Brands Section */
.shop-by-brands {
    text-align: center; /* Center the heading */
    padding: 20px;
}

.shop-by-brands  h2 {
    background-color: tan;

}

.brand-container {
    display: flex; /* Use flexbox for layout */
    flex-wrap: wrap; /* Allow wrapping to the next line */
    justify-content: center; /* Center items horizontally */
}

.brand-card {
    background-color: #fff; /* Background color for brand cards */
    border: 1px solid #ddd; /* Border for brand cards */
    margin: 10px; /* Space around each card */
    padding: 15px; /* Padding inside the card */
    width: calc(33.33% - 20px); /* Three cards per row, accounting for margin */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Optional shadow for depth */
    text-align: center; /* Center text inside card */
}

.brand-card  p {
    font-style: italic;
    color: black;
}

.brand-card h3 {
    color: black;
}


/* Responsive Design: Adjust for smaller screens */
@media (max-width: 768px) {
    .brand-card {
        width: calc(50% - 20px); /* Two cards per row on smaller screens */
    }
}

@media (max-width: 480px) {
    .brand-card {
        width: 100%; /* One card per row on very small screens */
    }
}

</style>



</body>
</html>
