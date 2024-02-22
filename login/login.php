<?php
session_start();
require "../config.php";
require "../models/db.php";
require "../models/user.php";
$user = new User;
if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $a = $user->checkLogin($username, $password);

    if ($username != "" && $password != "" && $a == true) {
        $_SESSION['user'] = $username;
        if ($username == "admin") {
            header('location:../admin/index.php');
        } else {
            header("location:../index.php");
        }
    } else {
        header("location:index.php");
    }
}
// if (isset($_POST['submit'])) {
//     $username = $_POST['username'];
//     $password = $_POST['password'];
//     if ($user -> checkLogin($username,$password)) {
//         $_SESSION['user'] = $username;
//         //$_SESSION['password'] = $password;
//         header("location:../index.php");
//     }else {
//         header('location:../admin/index.php');
//     }
// }