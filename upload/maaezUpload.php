
<?php
// Database connection
include 'connection.php';

// Set brandID to 1 by default if not set in the form
$brandID = isset($_POST['brandID']) ? $_POST['brandID'] : 1;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $productName = $_POST['productName'];
    $categoryID = $_POST['categoryID'];
    $productDesc = $_POST['productDesc'];
    $productPrice = $_POST['productPrice'];
    $productQuan = $_POST['productQuan'];

    // Handle image upload for the main product image
    $productImage = $_FILES['productImage']['name'];
    $target_directory = "upload/";
    $target_file = $target_directory . basename($productImage);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    if (getimagesize($_FILES['productImage']['tmp_name']) !== false) {
        if (in_array($imageFileType, ["jpg", "jpeg", "png", "gif"])) {
            if (move_uploaded_file($_FILES['productImage']['tmp_name'], $target_file)) {
                // Insert product data into the database
                $query = "INSERT INTO products (productName, categoryID, brandID, productDesc, productPrice, productQuan, productImage)
                          VALUES ('$productName', '$categoryID', '$brandID', '$productDesc', '$productPrice', '$productQuan', '$productImage')";

                if (mysqli_query($conn, $query)) {
                    // Get the productID of the newly inserted product
                    $productID = mysqli_insert_id($conn);

                    // Handle multiple image uploads for the product
                    if (isset($_FILES['productImages'])) {
                        foreach ($_FILES['productImages']['tmp_name'] as $index => $tmpName) {
                            $filePath = 'upload/' . $_FILES['productImages']['name'][$index];
                            move_uploaded_file($tmpName, $filePath);

                            // Insert the image paths into the product_images table
                            $imageQuery = "INSERT INTO product_images (productID, imagePath) VALUES ('$productID', '$filePath')";
                            mysqli_query($conn, $imageQuery);
                        }
                    }

                    // Get the shades entered by the admin
                    $shades = $_POST['shade'];

                    // Insert the shades into the 'product_shades' table
                    foreach ($shades as $shadeName) {
                        $insertShadeQuery = "INSERT INTO product_shades (shadeName, productID) VALUES ('$shadeName', '$productID')";
                        mysqli_query($conn, $insertShadeQuery);
                    }
                    $message = "Product, images, and shades uploaded successfully!";
                } else {
                    $message = "Database error: " . mysqli_error($conn);
                }
            } else {
                $message = "Failed to upload the main product image.";
            }
        } else {
            $message = "Only JPG, JPEG, PNG, and GIF files are allowed for the main product image.";
        }
    } else {
        $message = "File is not an image.";
    }
}

// Redirect to sobella.php and category page (e.g., foundation.php, powder.php)
if (isset($message) && $message === "Product, images, and shades uploaded successfully!") {
    header("Location: sobella.php?category=$categoryID");
    exit;
}

// Display products for the "sobella" brand
$query = "SELECT * FROM products WHERE brandID = '$brandID'";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Maaez Product</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Resetting default styles */
       /* Resetting default styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Poppins', sans-serif;
    background-color: #f3f4f6;
    color: #333;
    line-height: 1.6;
    margin: 0;
    padding: 0;
}

/* Header Styling */
header {
    background-color: #1e293b;
    color: #fff;
    text-align: center;
    padding: 1.5rem 0;
    font-size: 2rem;
    font-weight: bold;
    text-transform: uppercase;
}

/* Form container */
.container {
    width: 90%;
    max-width: 900px;
    margin: 2rem auto;
    background: #fff;
    padding: 2rem;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Form title */
.container h2 {
    text-align: center;
    margin-bottom: 1.5rem;
    font-size: 1.8rem;
    color: #1e293b;
}

/* Success/Error messages */
.message {
    padding: 1rem;
    margin-bottom: 1.5rem;
    border-radius: 5px;
    text-align: center;
    font-size: 1rem;
}

.success {
    background-color: #d1fae5;
    color: #065f46;
}

.error {
    background-color: #fee2e2;
    color: #b91c1c;
}

/* Form Elements */
.form-group {
    margin-bottom: 1.5rem;
}

label {
    display: block;
    font-weight: 600;
    margin-bottom: 0.5rem;
    color: #1e293b;
}

input, select, textarea {
    width: 100%;
    padding: 0.75rem;
    font-size: 1rem;
    border: 1px solid #d1d5db;
    border-radius: 5px;
    background: #f9fafb;
    transition: border-color 0.3s ease;
}

input:focus, select:focus, textarea:focus {
    border-color: #2563eb;
    outline: none;
    background: #fff;
}

/* File Inputs */
input[type="file"] {
    padding: 0.4rem;
}

/* Shade Inputs */
.shade-container input {
    margin-bottom: 0.75rem;
}

/* Buttons */
.button-group {
    display: flex;
    gap: 10px;
    justify-content: flex-end;
}

button {
    padding: 0.75rem 1.5rem;
    font-size: 1rem;
    color: #fff;
    background: #2563eb;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #1e40af;
}

/* Add Shade Button */
.add-shade-button {
    background-color: #10b981;
    margin-top: 0.5rem;
}

.add-shade-button:hover {
    background-color: #059669;
}

/* Image Preview */
.product-image-preview img {
    width: 100px;
    height: auto;
    margin-top: 1rem;
    border-radius: 5px;
    border: 1px solid #ddd;
}

/* Smooth hover effects for form inputs */
input:hover, select:hover, textarea:hover {
    border-color: #2563eb;
}

/* Responsive Layout */
@media (max-width: 768px) {
    .container {
        padding: 1.5rem;
    }

    header {
        font-size: 1.5rem;
    }

    .button-group {
        flex-direction: column;
        align-items: stretch;
    }
}

    </style>
</head>
<body>

<header>
    <h1>Upload Maaez Product</h1>
</header>

<div class="container">
    <?php if (isset($message)): ?>
        <div class="message <?= $message === "Product, images, and shades uploaded successfully!" ? 'success' : 'error' ?>">
            <?= $message ?>
        </div>
    <?php endif; ?>

    <form action="MaaezUpload.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="productName">Product Name:</label>
            <input type="text" name="productName" id="productName" required>
        </div>

        <div class="form-group">
            <label for="categoryID">Category:</label>
            <select name="categoryID" id="categoryID" required>
                <option value="1">Foundation</option>
                <option value="2">Powder</option>
                <option value="3">Setting Spray</option>
                <option value="4">Blusher</option>
                <option value="5">Contour</option>
                <option value="6">Highlighter</option>
                <option value="7">Lipmatte</option>
                <option value="8">Concealer</option>
                <option value="9">Mascara</option>
                <option value="10">Lipgloss</option>
                <option value="11">Eyeliner</option>
                <option value="12">Eyeshadow</option>
            </select>
        </div>

        <div class="form-group">
            <label for="productDesc">Product Description:</label>
            <textarea name="productDesc" id="productDesc" rows="5" required></textarea>
        </div>

        <div class="form-group">
            <label for="productPrice">Product Price:</label>
            <input type="number" name="productPrice" id="productPrice" required>
        </div>

        <div class="form-group">
            <label for="productQuan">Product Quantity:</label>
            <input type="number" name="productQuan" id="productQuan" required>
        </div>

        <div class="form-group">
            <label for="productImage">Product Image:</label>
            <input type="file" name="productImage" id="productImage" accept="image/*" required>
            <div class="product-image-preview" id="imagePreview"></div>
        </div>

        <div class="form-group">
            <label for="shade">Shade:</label>
            <div class="shade-container">
                <input type="text" name="shade[]" placeholder="Enter shade" required>
                <button type="button" class="add-shade-button" onclick="addShadeInput()">Add Shade</button>
            </div>
        </div>

        <div class="button-group">
            <button type="submit">Upload Product</button>
        </div>
    </form>
</div>

<script>
    // Function to preview image
    document.getElementById('productImage').addEventListener('change', function(e) {
        const imagePreview = document.getElementById('imagePreview');
        imagePreview.innerHTML = '';
        const file = e.target.files[0];
        const reader = new FileReader();

        reader.onload = function(event) {
            const img = document.createElement('img');
            img.src = event.target.result;
            imagePreview.appendChild(img);
        }

        if (file) {
            reader.readAsDataURL(file);
        }
    });

    // Function to add more shade inputs
    function addShadeInput() {
        const shadeContainer = document.querySelector('.shade-container');
        const newInput = document.createElement('input');
        newInput.type = 'text';
        newInput.name = 'shade[]';
        newInput.placeholder = 'Enter shade';
        shadeContainer.appendChild(newInput);
    }
</script>

</body>
</html>
