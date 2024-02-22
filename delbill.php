<?php
$order_id = $_GET['order_id'];
require "./config.php";
require "./models/db.php";
require "./models/product.php";
$product = new Product;
$order = $product->delBill($order_id);
header("location:bill.php");