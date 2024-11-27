<?php
// Fetch orders from the database
include("connection.php");

$query = "SELECT * FROM orders";
$result = mysqli_query($conn, $query);

while ($order = mysqli_fetch_assoc($result)) {
    // Display order details
    echo "Order ID: " . $order['orderID'] . "<br>";
    echo "User: " . $order['userName'] . "<br>";
    echo "Email: " . $order['userEmail'] . "<br>";
    echo "Phone: " . $order['userPhoneNo'] . "<br>";
    echo "Address: " . $order['userAddress'] . "<br>";
    echo "Order Date: " . $order['orderDate'] . "<br>";

    // You can also fetch and display ordered products from the order_details table
    $orderID = $order['orderID'];
    $orderDetailsQuery = "SELECT * FROM order_details WHERE orderID = '$orderID'";
    $orderDetailsResult = mysqli_query($conn, $orderDetailsQuery);
    while ($orderDetail = mysqli_fetch_assoc($orderDetailsResult)) {
        echo "Product ID: " . $orderDetail['productID'] . ", Quantity: " . $orderDetail['quantity'] . "<br>";
    }
}
?>
