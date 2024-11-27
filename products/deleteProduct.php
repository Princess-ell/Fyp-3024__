<?php
include 'connection.php';

if (isset($_GET['productID'])) {
    $productID = $_GET['productID'];

    // First, delete related entries in the 'cart' table
    $deleteCartQuery = "DELETE FROM cart WHERE shadeID IN (SELECT shadeID FROM product_shades WHERE productID = ?)";
    $stmt = $conn->prepare($deleteCartQuery);
    $stmt->bind_param("i", $productID);
    $stmt->execute();

    // Delete related entries in 'product_shades'
    $deleteShadesQuery = "DELETE FROM product_shades WHERE productID = ?";
    $stmt = $conn->prepare($deleteShadesQuery);
    $stmt->bind_param("i", $productID);
    $stmt->execute();

    // Finally, delete the product from the 'products' table
    $deleteProductQuery = "DELETE FROM products WHERE productID = ?";
    $stmt = $conn->prepare($deleteProductQuery);
    $stmt->bind_param("i", $productID);
    $stmt->execute();

    // Redirect to the dashboard after deletion
    header("Location: adminDashboard.php");
    exit();
} else {
    echo "Product ID is not set.";
}
?>
