<?php
session_start();
include 'connection.php';

// Fetch all orders
$sql = "SELECT o.orderID, u.userName, u.userAddress,u.userPhoneNo, o.orderDate, o.orderStatus, o.qrProofImage 
        FROM orders o 
        JOIN user u ON o.userID = u.userID";
$result = $conn->query($sql);

// Update order status
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['orderID']) && isset($_POST['orderStatus'])) {
    $orderID = $_POST['orderID'];
    $orderStatus = $_POST['orderStatus'];

    $updateQuery = "UPDATE orders SET orderStatus = ? WHERE orderID = ?";
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param("si", $orderStatus, $orderID);

    if ($stmt->execute()) {
        header("Location: orders.php");
        exit;
    }
}

// Delete order
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['deleteOrderID'])) {
    $deleteOrderID = $_POST['deleteOrderID'];

    $deleteQuery = "DELETE FROM orders WHERE orderID = ?";
    $stmt = $conn->prepare($deleteQuery);
    $stmt->bind_param("i", $deleteOrderID);

    if ($stmt->execute()) {
        header("Location: orders.php");
        exit;
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Orders</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f3f4f6;
            color: #333;
            margin: 0;
            padding: 0;
        }
        h2 {
            text-align: center;
            margin-top: 20px;
            color: #1e293b;
        }
        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }
        th, td {
            text-align: left;
            padding: 15px;
            border-bottom: 1px solid #e5e7eb;
        }
        th {
            background: #2563eb;
            color: #fff;
            text-transform: uppercase;
        }
        tr:hover {
            background-color: #f1f5f9;
        }
        td a {
            color: #2563eb;
            text-decoration: none;
        }
        td a:hover {
            text-decoration: underline;
        }
        form {
            display: flex;
            gap: 10px;
            align-items: center;
        }
        select {
            padding: 5px;
            border: 1px solid #d1d5db;
            border-radius: 4px;
        }
        button {
            padding: 5px 10px;
            background-color: #10b981;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #059669;
        }
        .container {
            padding: 20px;
        }
    </style>
</head>
<body>
    <h2>Admin Dashboard - Orders</h2>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>User Name</th>
                    <th>User Address</th>
                    <th>User Contact</th>
                    <th>Order Date</th>
                    <th>Status</th>
                    <th>Proof Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
    <td><?php echo $row['orderID']; ?></td>
    <td><?php echo htmlspecialchars($row['userName']); ?></td>
    <td><?php echo htmlspecialchars($row['userAddress']); ?></td>
    <td><?php echo htmlspecialchars($row['userPhoneNo']); ?></td>
    <td><?php echo $row['orderDate']; ?></td>
    <td><?php echo $row['orderStatus']; ?></td>
    <td>
        <a href="<?php echo $row['qrProofImage']; ?>" target="_blank">View Proof</a>
    </td>
    <td>
        <form method="post" style="display: inline;">
            <input type="hidden" name="orderID" value="<?php echo $row['orderID']; ?>">
            <select name="orderStatus">
                <option value="Pending" <?php if ($row['orderStatus'] == 'Pending') echo 'selected'; ?>>Pending</option>
                <option value="Shipped" <?php if ($row['orderStatus'] == 'Shipped') echo 'selected'; ?>>Shipped</option>
                <option value="Out for Delivery" <?php if ($row['orderStatus'] == 'Out for Delivery') echo 'selected'; ?>>Out for Delivery</option>
            </select>
            <button type="submit">Update</button>
        </form>
        <form method="post" style="display: inline;">
            <input type="hidden" name="deleteOrderID" value="<?php echo $row['orderID']; ?>">
            <button type="submit" onclick="return confirm('Are you sure you want to delete this order?')" style="background-color: #ef4444; color: white; border: none; padding: 5px 10px; border-radius: 4px; cursor: pointer;">
                Delete
            </button>
        </form>
    </td>
</tr>

                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
