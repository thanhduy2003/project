<?php
session_start();
require "./config.php";
require "./models/db.php";
require "./models/product.php";
require "./models/manufacture.php";
require "./models/user.php";
$product = new Product;
$products = $product->getAllProducts();
$id = $_GET['id'];
if (isset($_SESSION['wishlist'][$id])) {
    header("location:index.php");       
} else {
    $_SESSION['wishlist'][$id] = 1;


    $user = new User;
    $username =  $_SESSION['user'];

    $user_id =  $user -> getUserId($_SESSION['user']);

    $id_product = $user->getIdProduct($user_id);

    $id_product =  $id;


    $id_ = null;
    if (isset($_SESSION['wishlist'])) {
        
        $connection =  mysqli_connect("localhost", "root", "", "nhom9", 3306);
        $stmt1 = $connection->prepare("INSERT INTO `wishlist` (`id`,`id_user`,`id_product`) VALUES ( ?,?, ?)");
        $stmt1->bind_param("iis", $id_,$user_id,$id_product);
        $stmt1->execute();
    }
//var_dump($_SESSION['cart']);
}
 header("location:index.php");