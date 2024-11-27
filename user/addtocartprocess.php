<?php
include "connection.php";
session_start();
echo "Product ID is: " . $_POST['productID'];
echo "User ID is:" . $_SESSION['userID'];
echo "Shade ID is: " . $_POST['shadeID'];

$userid = $_SESSION['userID'];
$productid = $_POST['productID'];
$quantity = 0;
$shadeid = $_POST['shadeID'];
$cartname = "";

//sql insert to cart
$addtocart = mysqli_query($conn, "INSERT INTO `cart`(`cartID`, `userID`, `productID`, `quantity`, `shadeID`, `cartName`) VALUES (NULL,'".$userid."','".$productid."','".$quantity."','".$shadeid."','".$cartname."')");
if($addtocart){
    header("location: cart.php");
} else {
    echo "Error occurred when adding to cart";
}