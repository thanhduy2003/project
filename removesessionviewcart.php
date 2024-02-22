<?php
session_start();
require "./config.php";
require "./models/db.php";
require "./models/product.php";
require "./models/manufacture.php";
$product = new Product;
$products = $product->getAllProducts();
$id = $_GET['id'];
if (isset($_SESSION['cart'][$id])) {
    $_SESSION['cart'][$id]--;
}
//var_dump($_SESSION['cart']);
header("location:viewcart.php");