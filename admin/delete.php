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
        $id1 = $_GET['id1'];
        if($id1 == 2){
            $check = $protype->checkExist($id);
            if($check){
                $protype->DeleteProtype($id);
                header('location:models.php?id=2');
            }else{
                ?>
                <script>
                    if(!alert("Van con san pham"))document.location = "models.php?id=2";
                </script>
                <?php
            }
        }elseif($id1 == 3){
            $check = $manu->checkExist($id);
            if($check){
                $manu->DeleteManufacture($id);
                header('location:models.php?id=3');
            }else{
                ?>
                <script>
                    if(!alert("Van con san pham"))document.location = "models.php?id=3";
                </script>
                <?php
            }
        }elseif($id1 == 4){
            $user->DeleteUser($id);
            header('location:models.php?id=4');
        }
    }
?>