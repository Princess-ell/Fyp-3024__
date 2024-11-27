<?php
session_start();
include 'connection.php';  // Include your database connection file

// Check if the user is logged in
if (!isset($_SESSION['userID'])) {
    header('Location: userLogin.php');  // Redirect to login page if not logged in
    exit;
}

$userID = $_SESSION['userID'];

// Fetch the cart items for the logged-in user, including shade name
$sql = "SELECT c.cartID, p.productName, p.productPrice, c.quantity, ps.shadeName
        FROM cart c
        JOIN products p ON c.productID = p.productID
        LEFT JOIN product_shades ps ON c.shadeID = ps.shadeID
        WHERE c.userID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userID);
$stmt->execute();
$result = $stmt->get_result();

$subtotal = 0; // Initialize subtotal
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

    <h2 style="text-align: center; font-size: 2rem; margin: 20px 0; font-family: 'Arial', sans-serif; color: #444;">Your Cart</h2>

<?php if ($result->num_rows > 0): ?>
    <form method="post" action="updateCart.php" style="width: 90%; max-width: 800px; margin: 0 auto;">
        <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);">
            <thead>
                <tr style="background-color: #f8f9fa;">
                    <th style="padding: 10px; text-align: left; border-bottom: 2px solid #ddd;">Product</th>
                    <th style="padding: 10px; text-align: left; border-bottom: 2px solid #ddd;">Shade</th>
                    <th style="padding: 10px; text-align: left; border-bottom: 2px solid #ddd;">Price</th>
                    <th style="padding: 10px; text-align: center; border-bottom: 2px solid #ddd;">Quantity</th>
                    <th style="padding: 10px; text-align: right; border-bottom: 2px solid #ddd;">Total</th>
                    <th style="padding: 10px; text-align: center; border-bottom: 2px solid #ddd;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): 
                    $itemTotal = $row['productPrice'] * $row['quantity'];
                    $subtotal += $itemTotal;
                ?>
                    <tr style="background-color: #fff; border-bottom: 1px solid #ddd;">
                        <td style="padding: 10px;"><?php echo htmlspecialchars($row['productName']); ?></td>
                        <td style="padding: 10px;"><?php echo htmlspecialchars($row['shadeName'] ?? 'No Shade'); ?></td>
                        <td style="padding: 10px;">RM <?php echo number_format($row['productPrice'], 2); ?></td>
                        <td style="padding: 10px; text-align: center;">
                            <input type="hidden" name="cartID[]" value="<?php echo $row['cartID']; ?>">
                            <button type="button" class="decrease" style="padding: 5px; border: none; background: #f0f0f0; cursor: pointer;">-</button>
                            <input type="number" name="quantity[]" value="<?php echo $row['quantity']; ?>" min="1" style="width: 50px; text-align: center; border: 1px solid #ccc;">
                            <button type="button" class="increase" style="padding: 5px; border: none; background: #f0f0f0; cursor: pointer;">+</button>
                        </td>
                        <td style="padding: 10px; text-align: right;">RM <?php echo number_format($itemTotal, 2); ?></td>
                        <td style="padding: 10px; text-align: center;">
                            <a href="removeFromCart.php?cartID=<?php echo $row['cartID']; ?>" style="color: #dc3545; text-decoration: none;">Remove</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <!-- Subtotal Section -->
        <div style="text-align: right; margin: 20px 0; font-size: 1.2rem; font-weight: bold; color: #444;">
            Subtotal: RM <?php echo number_format($subtotal, 2); ?>
        </div>

        <!-- Buttons -->
        <div style="display: flex; justify-content: flex-end; gap: 10px;">
            <a href="makeup.php" style="padding: 10px 20px; font-size: 1rem; background: linear-gradient(45deg, #007bff, #0056b3); color: #fff; text-decoration: none; border-radius: 5px; transition: background 0.3s;">
                Continue Shopping
            </a>
            <button type="submit" style="padding: 10px 20px; font-size: 1rem; background: linear-gradient(45deg, #444, #222); color: #fff; border: none; border-radius: 5px; cursor: pointer; transition: background 0.3s;">
                Update Cart
            </button>
            <a href="checkout.php" style="padding: 10px 20px; font-size: 1rem; background: linear-gradient(45deg, #28a745, #218838); color: #fff; text-decoration: none; border-radius: 5px; transition: background 0.3s;">
                Proceed to Checkout
            </a>
        </div>
    </form>
<?php else: ?>
    <div style="text-align: center; margin-top: 50px;">
        <p style="font-size: 1.5rem; color: #666;">Your cart is empty!</p>
        <a href="makeup.php" style="padding: 10px 20px; font-size: 1rem; background: linear-gradient(45deg, #007bff, #0056b3); color: #fff; text-decoration: none; border-radius: 5px;">Continue Shopping</a>
    </div>
<?php endif; ?>

<script>
    // JavaScript for quantity increase and decrease
    document.querySelectorAll('.decrease').forEach((btn, index) => {
        btn.addEventListener('click', () => {
            const quantityInput = document.querySelectorAll('input[name="quantity[]"]')[index];
            if (quantityInput.value > 1) {
                quantityInput.value--;
            }
        });
    });

    document.querySelectorAll('.increase').forEach((btn, index) => {
        btn.addEventListener('click', () => {
            const quantityInput = document.querySelectorAll('input[name="quantity[]"]')[index];
            quantityInput.value++;
        });
    });

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

.container {
        max-width: 900px;
        margin: 0 auto;
        padding: 20px;
    }

    .cart-title {
        font-size: 28px;
        color: #333;
        margin-bottom: 20px;
        text-align: center;
        font-weight: bold;
    }

    .cart-container {
        display: flex;
        flex-direction: column;
        gap: 20px;
        background-color: #f8f8f8;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .cart-item {
        display: flex;
        align-items: center;
        gap: 20px;
        padding: 15px;
        background-color: #fff;
        border-radius: 10px;
        border: 1px solid #ddd;
    }

    .cart-item-image img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 8px;
        border: 1px solid #ddd;
    }

    .cart-item-details {
        flex: 1;
    }

    .cart-item-details h4 {
        margin: 0 0 8px;
        font-size: 18px;
        color: #333;
    }

    .cart-item-details p {
        margin: 5px 0;
        font-size: 14px;
        color: #555;
    }

    .cart-item-actions {
        text-align: right;
    }

    .quantity-controls {
        display: flex;
        align-items: center;
        gap: 5px;
        margin-bottom: 8px;
    }

    .quantity-controls button {
        background-color: #bb7349;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 5px 10px;
        cursor: pointer;
        font-size: 14px;
        transition: background-color 0.3s;
    }

    .quantity-controls button:hover {
        background-color: #a6633d;
    }

    .quantity-controls input {
        width: 50px;
        text-align: center;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 5px;
    }

    .item-total {
        font-size: 16px;
        color: #333;
        font-weight: bold;
    }

    .remove-btn {
        color: #e63946;
        text-decoration: none;
        font-size: 14px;
        transition: color 0.3s;
    }

    .remove-btn:hover {
        color: #c5303c;
    }

    .cart-summary {
        margin-top: 20px;
        text-align: right;
    }

    .subtotal {
        font-size: 18px;
        font-weight: bold;
        color: #333;
    }

    .subtotal span {
        color: #bb7349;
    }

    .cart-buttons {
        margin-top: 15px;
        display: flex;
        justify-content: flex-end;
        gap: 10px;
    }

    .cart-buttons a {
        padding: 10px 20px;
        font-size: 16px;
        text-decoration: none;
        border-radius: 8px;
        color: #fff;
        transition: background-color 0.3s;
    }

    .continue-shopping {
        background-color: #007bff;
    }

    .continue-shopping:hover {
        background-color: #0056b3;
    }

    .checkout {
        background-color: #28a745;
    }

    .checkout:hover {
        background-color: #218838;
    }

    .empty-cart {
        text-align: center;
        font-size: 16px;
        color: #666;
        margin: 20px 0;
    }
</style>