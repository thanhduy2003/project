<!-- header -->
<?php
require "header.php"
?>
<!-- header -->

<!-- body -->
<h1 style="text-align:center;">Your cart</h1>
<div class="table-style">
    <table>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Action</th>
            <?php
            $finalTotal = 0;
            if (isset($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $key => $value) {
                    foreach ($products as $valuePR) {
                        if ($key == $valuePR['id']) {
                            $total = 0;
                            $checkSale = true;
                            if ($valuePR["feature"] != 1) {
                                $checkSale = true;
                            } else {
                                $checkSale = false;
                            }
            ?>
        </tr>
        <tr>
            <td><?php ?> <a style="font-style:normal; font-weight:bold"
                    href="product.php?id=<?php echo $valuePR['id'] ?>"> <?php ?><img style="height:50px;margin:0 20px"
                        src='./img/<?php echo $valuePR["image"]; ?>'> <?php echo $valuePR['name']; ?></a></td>
            <td style="text-align:center"> <del class="product-old-price"><?php ?> <div
                        style="font-weight:bold;color: red;">
                        <?php echo $checkSale ? number_format($valuePR["price"]) : "" ?></div></del>
                <?php ?> <div style="font-weight:bold">
                    <?php echo $checkSale ? number_format($valuePR["price"] * 0.7) : number_format($valuePR["price"]) ?>
                </div>
            </td>
            <td style="text-align:center;">
                <div class="qty-label">
                    <div style="width:80px; display:inline-block;" class="input-number">
                        <a href="removesessionviewcart.php?id=<?php echo $valuePR["id"] ?>" class="qty-down">-</a>
                        <input type="number" value="<?php echo $value ?>">
                        <a href="addsessionviewcart.php?id=<?php echo $valuePR["id"] ?>" class="qty-up">+</a>
                    </div>
                </div>
            </td>
            <td style="text-align:center;font-weight:bold"><?php if ($checkSale == true) {
                                                                $total = ($valuePR["price"] * 0.7) * $value;
                                                                echo number_format($total);
                                                            } else {
                                                                $total = $valuePR["price"] * $value;
                                                                echo number_format($total);
                                                            } ?></td>
            <?php $finalTotal += $total; ?>
            <td style="text-align:center;"><a style="color: #00BFFF;font-weight:bold;"
                    href="delviewcart.php?id=<?php echo $valuePR['id']; ?>">Delete</a></td>
            <?php }
                    }
                }
            } ?>
        <tr>
            <th>Total Cost</th>
            <th colspan="4"><?php echo number_format($finalTotal) ?></th>
        </tr>
    </table>
    <div class="cart-btns" style="width: calc(10% - 0px);
    padding: 12px;
    background-color: #D10024;
    color: #FFF;
    text-align: center;
    font-weight: 700;
    margin: auto;">
        <a href="checkout.php" style="color: #FFF;">Checkout <i class="fa fa-arrow-circle-right"
                style="color: #FFF;"></i></a>
    </div>
    <!-- body -->

    <!-- footer -->
    <?php
    require "footer.php"
    ?>
    <!-- footer -->