<?php
session_start();
include 'connection.php';

// Check if user is logged in
if (!isset($_SESSION['userID'])) {
    header("Location: userLogin.php");
    exit;
}

$userID = $_SESSION['userID'];

// Fetch all orders for the user
$orderQuery = "
    SELECT o.orderID, o.orderDate, o.orderStatus 
    FROM orders o 
    WHERE o.userID = ?
    ORDER BY o.orderDate DESC";
$orderStmt = $conn->prepare($orderQuery);
$orderStmt->bind_param("i", $userID);
$orderStmt->execute();
$orderResult = $orderStmt->get_result();
?>
<h2>Your Orders</h2>
<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>Order ID</th>
        <th>Order Date</th>
        <th>Status</th>
    </tr>
    <?php while ($orderRow = $orderResult->fetch_assoc()): ?>
    <tr>
        <td><?php echo $orderRow['orderID']; ?></td>
        <td><?php echo $orderRow['orderDate']; ?></td>
        <td><?php echo $orderRow['orderStatus']; ?></td>
    </tr>
    <?php endwhile; ?>
</table>

<?php
// Fetch the latest order details
$latestOrderQuery = "
    SELECT o.orderID, o.orderDate, o.orderStatus 
    FROM orders o 
    WHERE o.userID = ?
    ORDER BY o.orderDate DESC 
    LIMIT 1";
$latestOrderStmt = $conn->prepare($latestOrderQuery);
$latestOrderStmt->bind_param("i", $userID);
$latestOrderStmt->execute();
$latestOrder = $latestOrderStmt->get_result()->fetch_assoc();

if ($latestOrder) {
    $orderID = $latestOrder['orderID'];

    $detailsQuery = "
    SELECT 
        p.productName,
        ps.shadeName,
        oi.quantity,
        (p.productPrice * oi.quantity) AS total
    FROM order_items oi
    JOIN products p ON oi.productID = p.productID
    LEFT JOIN product_shades ps ON oi.shadeID = ps.shadeID
    WHERE oi.orderID = ?";
$detailsStmt = $conn->prepare($detailsQuery);
$detailsStmt->bind_param("i", $orderID);
$detailsStmt->execute();
$detailsResult = $detailsStmt->get_result();
    ?>
    <h3>Order Details for Order ID: <?php echo $orderID; ?></h3>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>Product Name</th>
            <th>Shade Name</th>
            <th>Quantity</th>
            <th>Total (RM)</th>
        </tr>
        <?php 
        $grandTotal = 0;
        while ($detail = $detailsResult->fetch_assoc()): 
            $grandTotal += $detail['total'];
        ?>
        <tr>
            <td><?php echo htmlspecialchars($detail['productName']); ?></td>
            <td><?php echo htmlspecialchars($detail['shadeName'] ?? 'N/A'); ?></td>
            <td><?php echo $detail['quantity']; ?></td>
            <td>RM <?php echo number_format($detail['total'], 2); ?></td>
        </tr>
        <?php endwhile; ?>
        <tr>
            <td colspan="3" style="text-align: right; font-weight: bold;">Grand Total:</td>
            <td>RM <?php echo number_format($grandTotal, 2); ?></td>
        </tr>
    </table>
    <?php
} else {
    echo "<p>No orders found. Please make a purchase first!</p>";
}
?>

<style>

body {
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
    margin: 20px;
    color: #333;
}

h2, h3 {
    color: #444;
    text-align: center;
    margin-bottom: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 30px;
}

table th, table td {
    border: 1px solid #ddd;
    padding: 12px;
    text-align: center;
}

table th {
    background-color: #007bff;
    color: white;
}

table tr:nth-child(even) {
    background-color: #f2f2f2;
}

table tr:hover {
    background-color: #e9ecef;
}

table td {
    font-size: 14px;
}

p {
    text-align: center;
    font-size: 16px;
    color: #666;
}

button {
    display: block;
    margin: 20px auto;
    padding: 10px 20px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

button:hover {
    background-color: #0056b3;
}

</style>