<?php include "header.php"; ?>
<!-- SECTION TOP SELLING -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">Top selling</h3>
                    <div class="section-nav">
                        <ul class="section-tab-nav tab-nav">
                            <li><a href="topselling.php?category=laptop">Laptops</a></li>
                            <li><a href="topselling.php?category=phone">Smartphones</a></li>
                            <li><a href="topselling.php?category=watch">Watches</a></li>
                            <li><a href="topselling.php?category=earphones">Earphones</a></li>
                            <li><a href="topselling.php?category=tablet">Tablets</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /section title -->

            <!-- Products tab & slick -->
            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
                        <!-- tab -->
                        <div id="tab1" style="padding-bottom:0px" class="tab-pane active">
                            <div class="products-slick" data-nav="#slick-nav-1">
                                <!-- product -->
                                <?php
                                if (isset($_GET["category"])) {
                                    $category = $_GET["category"];
                                }
                                $product = new Product;
                                $products = $product->getTopSellingProtype($category);
                                // var_dump($search);
                                $checkSale = true;
                                foreach ($products as $value) :
                                ?>
                                    <div class="product">
                                        <div class="product-img">
                                            <img src='./img/<?php echo $value["image"]; ?>'>
                                            <div class="product-label">
                                                <?php
                                                if ($value["feature"] != 1) {
                                                    echo "<span class=\"sale\">-30%</span>";
                                                    $checkSale = true;
                                                } else {
                                                    echo "<span class=\"new\">NEW</span>";
                                                    $checkSale = false;
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category"><?php echo $value["manu_name"] ?></p>
                                            <h3 class="product-name"><a href="product.php?id=<?php echo $value['id'] ?>"><?php echo $value["name"] ?></a></h3>
                                            <h4 class="product-price">
                                                <?php echo $checkSale ? number_format($value["price"] * 0.7) : number_format($value["price"]) ?>
                                                <del class="product-old-price"><?php echo $checkSale ? number_format($value["price"]) : "" ?></del>
                                            </h4>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="product-btns">
                                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp"><a href="wishlistsession.php?id=<?php echo $value['id'] ?>"></a>add to wishlist</span></button>
                                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                                <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                        <a href="addsession.php?id=<?php echo intval($value['id']);?>"><button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button></a>
                                        </div>
                                    </div>
                                <?php
                                endforeach;
                                ?>
                                <!-- /product -->
                            </div>
                            <!-- /Products tab & slick -->
                        </div>
                        <!-- /row -->
                    </div>
                    <!-- /container -->
                </div>
            </div>
        </div>
    </div>
</div>




<?php include "footer.php"; ?>