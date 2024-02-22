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

    if (isset($_GET['id1'])) {
        $id1 = $_GET['id1'];
       if($id1 == 2){
            if (isset($_POST['type_name'])) {
                $id = $_GET['id'];
                $name = $_POST['type_name'];
                $protype->update($id,$name);
            }
            header('location:models.php?id=2');
        }elseif($id1 == 3){
            if (isset($_POST['manu_name'])) {
                $id = $_GET['id'];
                $name = $_POST['manu_name'];
                $manu->update($id,$name);
            }
            header('location:models.php?id=3');
        }else{
            if (isset($_POST['username'])) {
                $id = $_GET['id'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $role_id = $_POST['role_id'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];
                $password1 = md5($password);
                $role_id = $_POST['role_id'];
                $user->update($username, $password1 , $role_id,$email,$phone,$address,$id);
            }
            header('location:models.php?id=4');
        }
    }
?>