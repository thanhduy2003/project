<?php
session_start();
$id=$_GET['id'];



if(isset($_SESSION['wishlist'])){
    unset($_SESSION['wishlist'][$id]);
    header("location:wishlist.php");
}