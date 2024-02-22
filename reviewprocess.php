<?php
require "./config.php";
require "./models/db.php"; 
require "models/product.php";
require "./models/product_comment.php";
$product_comment = new ProductComment;
$product = new Product;
if(isset($_GET["username"]))
{
    $arr = $product->getUser($_GET["username"]);
    $username = $arr[0]["user_id"];
    $product_id = $_GET["product_id"];
    $review = $_GET["review"];
    $rating = $_GET["rating"];
    var_dump($username);
    var_dump($product_id);
    var_dump($review);
    var_dump($rating);
    $product_comment->addProductComment($product_id, $username,$review,$rating);
    header("location: ./product?id=$product_id");
}
?>