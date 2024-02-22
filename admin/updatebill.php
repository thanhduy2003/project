<?php
$order_id = $_GET['order_id'];
require "./config.php";
require "./models/db.php";
require "./models/product.php";
$product = new Product;
$order = $product->updateStatusBill($order_id);
header("location:models.php?id=5");