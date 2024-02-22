<?php 
require "config.php";
require "models/db.php";
require "models/product.php";
require "models/manufacture.php";
require "models/protype.php";
require "models/user.php";
    $id;
    $product = new Product();
    $protype = new Protype();
    $manu = new Manufacture();
    $user = new User();
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        if($id == 2){
            if (isset($_POST['name'])) {
                $name = $_POST['name'];
                $protype->add($name);
            }
            header('location:models.php?id=2');
        }elseif($id == 3){
            if (isset($_POST['name'])) {
                $name = $_POST['name'];
                $manu->add($name);
            }
            header('location:models.php?id=3');
        }else {
            if (isset($_POST['username'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $role_id = $_POST['role_id'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];
                $password1 = md5($password1);
                $user->add($username, $password1 , $role_id,$email,$phone,$address);
            }
            header('location:models.php?id=4');
        }
    }
?>