
<?php 
//require "product.php";
include "header.php" ;
$product = new Product;
$products = $product->getAllProducts();
$qty = 0;
$totalCost = 0;
if (isset($_SESSION['wishlist'])) {
    foreach ($_SESSION['wishlist'] as $key => $value) {
   
    }
}

?>
<div class="container">


    <div class="row"style=" display: inline">
                    <h3  style= "padding-left:0px ">Your WishList</h3>
                    <?php
                    if (isset($_SESSION['wishlist'])) {
                    foreach ($products as $key => $valueproduct) {
                        if (isset($_SESSION['wishlist'])) {
                            $checkSale = true;
                            
                            foreach ($_SESSION['wishlist'] as $key => $value) {
                                if ($valueproduct['id'] == $key) {
                                    ?> 
                                      
                                    <div class="col-md-3" style="margin-top:40px" >                                         

                <div class="product">        
                <a href="delwl.php?id=<?php echo $valueproduct['id']; ?>"><button
                class="delete"><i class="fa fa-close" style="background-color: white;"></i></button></a>
                    <div class="product-img">                        
                            <img src='./img/<?php echo $valueproduct["image"]; ?>'>
                        <div class="product-label">
                            <?php
                             if ($valueproduct["feature"] != 1) {
                                 echo "<span class=\"sale\">-30%</span>";
                                 $checkSale = true;
                                } else {
                                    echo "<span class=\"new\">NEW</span>";
                                    $checkSale = false;
                                }
                                ?>
                        </div>
                            <div class="product-body">
                                        <p class="product-category"><?php echo $valueproduct["manu_name"] ?></p>
                                 <h3 class="product-name"><a href="product.php?id=<?php echo $valueproduct['id'] ?>"><?php echo $valueproduct["name"] ?></a></h3>
                                 <h4 class="product-price">
                                     <?php echo $checkSale ? number_format($valueproduct["price"] * 0.7) : number_format($valueproduct["price"]) ?>
                                     <del class="product-old-price"><?php echo $checkSale ? number_format($valueproduct["price"]) : "" ?></del>
                                    </h4>
                                    <div class="product-rating">
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                </div>
                                <div class="product-btns" >
                                    <button class="add-to-wishlist" style ="color:red ;"><i class="fa fa-heart" ></i><span class="tooltipp">add to wishlist</span></button>
                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                    <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                   </div>
                               </div>
                            <div class="add-to-cart" >
                                                <a href="addsession.php?id=<?php echo intval($valueproduct['id']); ?>"><button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button></a>
                            </div>
                          
                    </div>            
                </div>
            </div>     
  
    <?php
}
    }
}   
}
}
?>



</div>
    </div>
<?php

include "footer.php";
?>