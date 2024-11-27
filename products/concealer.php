<?php
session_start();
// Database connection
include 'connection.php';

// Example code to display products for the Foundation category
$query = "SELECT * FROM products WHERE categoryID = 8"; // Lipmatte
$result = mysqli_query($conn, $query);

?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eyes Products - Localuxe</title>
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

     <!-- Page Content -->
    <div class="content-container">

<!-- Sidebar -->
<div class="left-nav">
    <h3>Eyes</h3>
    <ul>
        <li><a href="concealer.php">Concealer</a></li>
        <li><a href="mascara.php">Mascara</a></li>
        <li><a href="eyeliner.php">Eyeliner</a></li>
        <li><a href="eyeshadow.php">Eyeshadow</a></li>
    </ul>
    <h3>BRANDS</h3>
    <form method="GET" action="">
        <div class="brand-filters">
            <label><input type="radio" name="brand" value="Maaez" onclick="redirectToBrandPage('maaez.php')"> Maaez</label><br>
            <label><input type="radio" name="brand" value="Sobella" onclick="redirectToBrandPage('sobella.php')"> Sobella</label><br>
            <label><input type="radio" name="brand" value="Cubre Mi" onclick="redirectToBrandPage('cubremi.php')"> Cubre Mi</label><br>
            <label><input type="radio" name="brand" value="Bihan" onclick="redirectToBrandPage('bihan.php')"> Bihan</label><br>
            <label><input type="radio" name="brand" value="AlhaAlfa" onclick="redirectToBrandPage('bihan.php')"> Alha Alfa</label><br>
            <label><input type="radio" name="brand" value="Anas" onclick="redirectToBrandPage('bihan.php')"> Anas</label><br>
            <label><input type="radio" name="brand" value="SilkyGirl" onclick="redirectToBrandPage('bihan.php')"> Silky Girl</label><br>
            <label><input type="radio" name="brand" value="In2It" onclick="redirectToBrandPage('in2it.php')"> In2It</label><br>
            <label><input type="radio" name="brand" value="Simplysiti" onclick="redirectToBrandPage('simplysiti.php')"> Simplysiti</label><br>
        </div>
    </form>
</div>

<!-- Products Section -->
<div class="products-section">
    <h2>Concealer</h2>
    <div class="product-grid">
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            // Fetch shades for the current product
            $productID = $row['productID'];
            $shadeQuery = "SELECT * FROM product_shades WHERE productID = '$productID'";
            $shadeResult = mysqli_query($conn, $shadeQuery);

            $shades = [];
            while ($shade = mysqli_fetch_assoc($shadeResult)) {
                $shades[] = $shade;
            }

            // Display the product with its shades
            echo "<div class='product-card'>";
            echo "<img src='upload/" . $row['productImage'] . "' alt='" . $row['productName'] . "'>";
            echo "<h4 class='product-name'>" . $row['productName'] . "</h4>";
            echo "<p class='product-price'>RM" . $row['productPrice'] . "</p>";
        ?>

            <!-- Add to Cart with Shade -->
            <form method="POST" action="addtocartprocess.php">
                <div class="shade-selector">
                    <label for="shade-select-<?php echo $row['productID']; ?>">Choose Shade:</label>
                    <select name="shadeID" id="shade-select-<?php echo $row['productID']; ?>" class="shade-dropdown">
                        <option value="" disabled selected>Select a shade</option>
                        <?php
                        foreach ($shades as $shade) {
                            echo "<option value='" . $shade['shadeID'] . "'>" . $shade['shadeName'] . "</option>";
                        }
                        ?>
                    </select>
                </div>

                <input type="hidden" name="productID" value="<?php echo $row['productID']; ?>">
                <button type="submit" name="add_to_cart" class="add-to-cart-btn" >Add to Cart</button>
            </form>

        <?php
            echo "</div>";
        }
        ?>
    </div>
</div>



    <script>
        // JavaScript to update shade selection for the product
        document.querySelectorAll('.shade-dropdown').forEach(select => {
            select.addEventListener('change', function() {
                const productID = this.id.split('-')[2]; // Get the productID from the ID
                document.querySelector(`#shade-select-${productID}`).value = this.value;
            });
        });

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
        document.addEventListener('click', function(e) {
            var dropdownMenu = document.getElementById("dropdown-menu");
            var signInIcon = document.querySelector('.sign-in-icon');

            if (!dropdownMenu.contains(e.target) && !signInIcon.contains(e.target)) {
                dropdownMenu.style.display = 'none'; // Hide the dropdown
            }
        });



        // Add JavaScript to toggle dropdown on click
        document.querySelectorAll('.dropdown-btn').forEach(button => {
            button.addEventListener('click', function() {
                const dropdownContent = this.nextElementSibling;
                dropdownContent.style.display = dropdownContent.style.display === 'block' ? 'none' : 'block';
            });
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.dropdown')) {
                document.querySelectorAll('.dropdown-content').forEach(content => {
                    content.style.display = 'none';
                });
            }
        });

        // Add product to cart
        function addToCart(productID) {
            var productName = document.querySelector(`[data-id='${productID}'] .product-name`).textContent;
            var productPrice = document.querySelector(`[data-id='${productID}'] .product-price`).textContent.replace('RM', '');
            var shadeSelect = document.getElementById('shade-select-' + productID);
            var selectedShade = shadeSelect.options[shadeSelect.selectedIndex].value;

            // Create product object
            var product = {
                id: productID,
                name: productName,
                price: productPrice,
                shade: selectedShade,
                quantity: 1
            };

            // Send product to server via AJAX to add to session
            $.ajax({
                url: 'add_to_cart.php',
                method: 'POST',
                data: {
                    product: product
                },
                success: function(response) {
                    alert('Product added to cart!');
                },
                error: function() {
                    alert('Failed to add product to cart');
                }
            });
        }

        // Function to redirect to the selected brand's page
    function redirectToBrandPage(pageUrl) {
        window.location.href = pageUrl;
    }
    
    </script>

    <style>
        /* Style for left navigation and products */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body {
            height: 100%;
            /* Ensures the body and html elements take up full height */
            margin: 0;
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
            position: relative;
            /* Keep it relative for absolute positioning */
        }

        .header-icons {
            display: flex;
            /* Ensure icons are aligned horizontally */
            align-items: center;
            /* Center vertically */
        }


        .logo h1 {
            margin: 0;
            font-size: 36px;
            color: black;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            margin-left: 15px;
        }

        .search-container {
            display: none;
            /* Hidden by default */
            position: absolute;
            /* Position absolutely */
            left: 50%;
            /* Center horizontally */
            top: 50%;
            /* Center vertically */
            transform: translate(-50%, -50%);
            /* Adjust for centering */
            z-index: 1000;
            /* Keep it above other elements */
        }

        /* Show the search bar when the class 'active' is added */
        .search-container.active {
            display: flex;
            /* Change to flex to make it clickable */
            align-items: center;
            /* Center items inside */
        }

        /* Style for input and button */
        #search-input {
            padding: 8px;
            /* Add padding */
            border: 1px solid #ccc;
            /* Add border */
            border-radius: 4px;
            /* Rounded corners */
            margin-right: 5px;
            /* Space between input and button */
        }

        .search-icon img {
            width: 25px;
            height: 25px;
        }

        .sign-in-icon {
            margin-left: 5px;
            position: relative;
            /* Required for dropdown positioning */
            cursor: pointer;
            /* Change cursor to pointer */
        }


        .sign-in-icon img {
            width: 40px;
            /* Adjust the size of the icons */
            height: 40px;
        }



        .dropdown-menu {
            display: none;
            /* Initially hidden */
            position: absolute;
            /* Position it below the sign-in icon */
            top: 100%;
            /* Align it directly under the icon */
            left: 50%;
            /* Center it */
            transform: translateX(-50%);
            /* Center alignment */
            background-color: white;
            /* Background color */
            border: 1px solid black;
            /* Border for visibility */
            border-radius: 4px;
            /* Rounded corners */
            z-index: 100;
            /* Ensure it appears above other elements */
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            /* Optional shadow */
        }

        .dropdown-item {
            padding: 10px 15px;
            /* Add padding for items */
            cursor: pointer;
            /* Pointer cursor */
        }

        .dropdown-item:hover {
            background-color: #f0f0f0;
            /* Hover effect */
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


        .cart-item {
            border-bottom: 1px solid #ccc;
            margin-bottom: 10px;
            padding: 5px 0;
        }

        .page-container {
    display: flex;
    gap: 20px;
    padding: 20px;
    font-family: Arial, sans-serif;
}

        .content-container {
            flex: 1;
            /* Takes available space */
            display: flex;
            margin: 20px;
        }



        /* Centering and Styling the Navigation Bar */
        .navbar {
            background-color: rgba(187, 115, 73, 0.993);
            padding: 15px;
            display: flex;
            justify-content: center;
            /* Center the nav items */
            align-items: center;
            /* Vertically align the items */
        }

        .navbar ul {
            list-style-type: none;
            display: flex;
        }

        .navbar ul li {
            margin: 0 20px;
        }

        .navbar ul li a {
            color:  black;
            text-decoration: none;
            font-size: 18px;
            padding: 8px 16px;
            font-family: 'Times New Roman', Times, serif;
        }

        .navbar ul li a:hover {
            background-color: antiquewhite;
            border-radius: 4px;
        }




      /* Left Navigation Styling */
.left-nav {
    width: 250px;
    background-color: #fff;
    box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
    padding: 20px;
    border-right: 1px solid #e5e5e5;
    position: sticky;
    top: 0;
    height: 100vh;
    overflow-y: auto;
}

/* Section Headings */
.left-nav h3 {
    font-size: 18px;
    color: #333;
    border-bottom: 2px solid #e0e0e0;
    padding-bottom: 5px;
    margin-bottom: 10px;
}

/* List Items */
.left-nav ul {
    list-style: none;
    padding: 0;
}

.left-nav ul li {
    margin-bottom: 10px;
}

.left-nav ul li a {
    text-decoration: none;
    color: #555;
    font-size: 16px;
    display: block;
    padding: 8px 12px;
    border-radius: 4px;
    transition: all 0.3s ease;
}

.left-nav ul li a:hover {
    background-color: #f5f5f5;
    color: #000;
    transform: translateX(5px);
}

/* Brand Filter Section */
.brand-filters {
    margin-top: 20px;
}

.brand-filters label {
    display: block;
    font-size: 14px;
    margin-bottom: 10px;
    cursor: pointer;
    transition: color 0.3s ease;
}

.brand-filters label:hover {
    color: #000;
}

.brand-filters input[type="radio"] {
    margin-right: 8px;
    transform: scale(1.2);
}

        /* Container for the entire products section */
.products-section {
    width: 75%; /* Adjust as needed */
    padding: 30px;
    background-color: #ffffff;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    margin: 20px auto; /* Center the section */
}

/* Section Heading */
.products-section h2 {
    font-size: 32px;
    color: #bb7349;
    text-align: center;
    margin-bottom: 30px;
    font-family: 'Georgia', serif;
    position: relative;
}

.products-section h2::after {
    content: '';
    width: 60px;
    height: 4px;
    background-color: #bb7349;
    display: block;
    margin: 10px auto 0;
    border-radius: 2px;
}

.product-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr); /* 4 equal-width columns */
    gap: 20px; /* Spacing between products */
}


/* Individual Product Card */
.product-card {
    background-color: #fff;
    border: 1px solid #e0e0e0;
    border-radius: 12px;
    padding: 20px;
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.product-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 20px rgba(0, 0, 0, 0.15);
}

/* Product Image */
.product-card img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    border-radius: 8px;
    margin-bottom: 15px;
    transition: transform 0.3s ease;
}

.product-card img:hover {
    transform: scale(1.05);
}

/* Product Name */
.product-name {
    font-size: 20px;
    font-weight: bold;
    color: #333333;
    margin-bottom: 10px;
    transition: color 0.3s ease;
}

.product-name:hover {
    color: #bb7349;
}

/* Product Price */
.product-price {
    font-size: 18px;
    color: #b16c59;
    margin-bottom: 15px;
    font-weight: bold;
}

/* Shade Selector */
.shade-selector {
    margin: 10px 0;
    text-align: left;
}

.shade-selector label {
    display: block;
    font-size: 14px;
    color: #555555;
    margin-bottom: 5px;
}

.shade-dropdown {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 14px;
    background-color: #f9f9f9;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
}

.shade-dropdown:focus {
    border-color: #bb7349;
    box-shadow: 0 0 5px rgba(187, 115, 73, 0.5);
    outline: none;
}

/* Add to Cart Button Styling */
.add-to-cart-btn {
    background-color: black;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: all 0.3s ease;
    display: inline-block;
}

.add-to-cart-btn:hover {
    background-color: #e64a19; /* Darker shade for hover */
    transform: translateY(-3px); /* Adds a lift effect */
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); /* Hover shadow */
}

/* Disabled State */
.add-to-cart-btn:disabled {
    background-color: #cccccc;
    cursor: not-allowed;
}


/* Responsive Design */
@media (max-width: 992px) {
    .product-grid {
        grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
    }

    .product-card img {
        height: 180px;
    }
}

@media (max-width: 768px) {
    .products-section {
        width: 90%;
        padding: 20px;
    }

    .product-grid {
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    }

    .product-card img {
        height: 160px;
    }
}

@media (max-width: 576px) {
    .product-grid {
        grid-template-columns: repeat(auto-fill, minmax(100%, 1fr));
    }

    .product-card img {
        height: 200px;
    }
}
</style>