<?php
session_start();
require "./config.php";
require "./models/db.php";
require "./models/product.php";
require "./models/manufacture.php";
if (isset($_SESSION['user']) && $_SESSION['user'] != 'admin') {
    if (isset($_SESSION['cart'])) {
        $product = new Product;
        $products = $product->getAllProducts();
        $date = date("Y-m-d");
        $first_name = $_POST['first-name'];
        $last_name = $_POST['last-name'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $country = $_POST['country'];
        $zip_code = $_POST['zip-code'];
        $note = $_POST['note'];
        $tel = $_POST['tel'];
        $user = $product->getUser($_SESSION['user']);
        $order_id  = $product->insertOrder($user[0]['user_id'], $date, $first_name, $address, $tel, $note, $email, $zip_code);

        foreach ($products as $key => $valueproduct) :
            foreach ($_SESSION['cart'] as $id_product => $count) :
                if ($valueproduct['id'] == $id_product) :
                    if ($valueproduct["feature"] != 1) {
                        $sumPrice = $valueproduct['price'] * 0.7;
                        $product->insertOrderDetails($id_product, $order_id[0]['order_id'], $sumPrice, $count);
                        $sold = $valueproduct['sold'] + $count;
                        $product->updateProduct(
                            $valueproduct['id'],
                            $valueproduct['name'],
                            $valueproduct['manu_id'],
                            $valueproduct['type_id'],
                            $valueproduct['price'],
                            $valueproduct['image'],
                            $valueproduct['description'],
                            $valueproduct['feature'],
                            $valueproduct['created_at'],
                            $sold,
                            $valueproduct['in_stock']
                        );
                    } else {
                        $sumPrice = $valueproduct['price'];
                        $product->insertOrderDetails($id_product, $order_id[0]['order_id'], $sumPrice, $count);
                        $sold = $valueproduct['sold'] + $count;
                        $product->updateProduct(
                            $valueproduct['id'],
                            $valueproduct['name'],
                            $valueproduct['manu_id'],
                            $valueproduct['type_id'],
                            $valueproduct['price'],
                            $valueproduct['image'],
                            $valueproduct['description'],
                            $valueproduct['feature'],
                            $valueproduct['created_at'],
                            $sold,
                            $valueproduct['in_stock']
                        );
                    }
                endif;
            endforeach;
        endforeach;
        unset($_SESSION['cart']);

        header("location:index.php");
    }
} else {
    header("location:login/index.php");
}