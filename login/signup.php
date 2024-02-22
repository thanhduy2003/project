<?php
session_start();
require "../config.php";
require "../models/db.php";
require "../models/user.php";

if (isset($_POST['submit'])) {   

    $connection =  mysqli_connect("localhost", "id21720351_user", "[Duy]332003@", "id21720351_dpstore03", 3306);
    $username = $_POST['username'];
   

    $password = $_POST['password'];
   $password = md5($password);
    $role_id = $username == 'admin'? $role_id = +1:$role_id+2;    

    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    echo $email;
    $id = null;
    echo $username;
    echo $id;  

    $stmt1 = $connection->prepare("INSERT INTO `users` (`user_id`, `username`,`password`, `role_id`, `email`, `phone`, `address`) VALUES ( ?, ?, ?, ?, ?, ?, ?)");
    $stmt1->bind_param("sssssss", $id, $username, $password , $role_id,$email,$phone,$address);
    $stmt1->execute();
    $_SESSION['user_id'] = $id;
}
header("location:index.php");