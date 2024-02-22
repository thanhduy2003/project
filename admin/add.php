<?php
require "config.php";
require "models/db.php";
require "models/product.php";
$product = new Product;
if(isset($_POST['name'])){
    $id=$_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $sold=$_POST['sold'];
    $instock=$_POST['instock'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    $manu_id = $_POST['manu_id'];
    $type_id = $_POST['type_id'];
    $feature = isset($_POST['feature'])?1:0 ;
    var_dump($id );
    var_dump($name );
    var_dump($price );
    var_dump($sold );
    var_dump($instock );
    var_dump($description);
    var_dump($image);
    var_dump($manu_id);
    var_dump($type_id);
    var_dump($feature);
//xu ly them
$product->addProduct($id,$name,$manu_id,$type_id, $price,$image,$description,$feature,$sold,$instock);
//xu ly upload
$target_dir = "../img/";
$target_file = $target_dir.basename($_FILES["image"]["name"]);
move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
header('location:index.php');
}