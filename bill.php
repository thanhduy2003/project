<!-- header -->
<?php
include "header.php";

?>
<!-- header -->

<!-- body -->
<h1 style="text-align:center;">Your Bill</h1>
<div class="table-style">
    <table>
        <tr>
            <th>Number</th>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Status</th>
            <th>Action</th>
            <?php
            if (isset($_SESSION['user']) && $_SESSION['user'] != "admin") :
                $finalTotal = 0;
                $product = new Product;
                $i = 1;
                $user = $product->getUser($_SESSION['user']);
                $orders = $product->getOrderByUserId($user[0]['user_id']);
                foreach ($orders as $key => $order) {
                    $user_products = $product->getProductsByOrderId($order['order_id']);



            ?>
        </tr>
        <tr>
            <!--  number bills -->
            <td> <?php echo $i; ?> </td>
            <!-- / number bill -->

            <!-- products -->
            <td>
                <?php foreach ($user_products as $user_product) : ?>
                    <a style="font-style:normal; font-weight:bold" href="product.php?id=<?php echo $user_product['id'] ?>">
                        <?php ?><img style="height:50px;margin:0 20px" src='./img/<?php echo $user_product["image"]; ?>'>
                        <?php echo $user_product['name']; ?></a>
                    <br>
                <?php endforeach; ?>
            </td>
            <!-- /products -->

            <!-- peices -->
            <td style="text-align:center">
                <?php foreach ($user_products as $user_product) :
                        $checkSale = true;
                        if ($user_product["feature"] != 1) {
                            $checkSale = true;
                        } else {
                            $checkSale = false;
                        }
                ?>
                    <div style="font-weight:bold">
                        <?php
                        echo $checkSale ? number_format($user_product["price"] * 0.7) : number_format($user_product["price"]);
                        ?>
                    </div>
                    <br>
                <?php endforeach; ?>
            </td>
            <!-- /peices -->

            <!-- quantity -->
            <td style="text-align:center;">
                <?php foreach ($user_products as $user_product) { ?>
                    <div class="qty-label">
                        <?php echo $user_product['amount']; ?>

                    </div><br>
                <?php } ?>
            </td>
            <!-- /quantity -->

            <!-- total -->
            <td style="text-align:center;font-weight:bold">
                <?php
                    $total = 0;
                    foreach ($user_products as $user_product) {
                        $total += $user_product['subtotal'];
                    }
                ?>

                <div class="qty-label">
                    <?php echo  number_format($total); ?>

                </div><br>
            </td>
            <!-- /total -->

            <!-- status -->
            <td style="text-align:center;font-weight:bold">
                <?php echo $order['order_status'] == 0 ?  'Đang chờ xử lý' : "Đang giao hàng"; ?>
            </td>
            <!-- /status -->

            <!-- action -->
            <td style="text-align:center;">
                <?php if ($order['order_status'] == 0) { ?>
                    <a style="color: #00BFFF;font-weight:bold;" href="delbill.php?order_id=<?php echo $order['order_id']; ?>">
                        Delete
                    </a>
                <?php } ?>
            </td>
            <!-- /action -->

    <?php

                    $i++;
                }
            endif;
    ?>

    </table>
</div>

<!-- body -->


<!-- footer -->

<?php
// endif;
include "footer.php" ?>
<!-- footer -->