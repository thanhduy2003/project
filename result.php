<?php
$keyword = isset($_GET["keyword"]) && !empty($_GET["keyword"]) ? $keyword = $_GET["keyword"] : "";
include "header.php";
$page = isset($_GET["page"]) ? $_GET["page"] : 1;
$itemPerPage = isset($_GET["iPP"]) ? $_GET["iPP"] : 20;
// $category = isset($_GET["category"]) ? $_GET["category"] : "AllProducts";
// if ($category == "AllProducts") {
// 	$products = $product->getStoreProducts($page, $itemPerPage);
// 	$totalProduct = $product->getAllProducts();
// } else {
// 	$products = $product->getProductByProtypes($_GET["category"]);
// 	$totalProduct = $product->getProductByProtypes($_GET["category"]);
// }
$totalProduct = $product->totalSearch($keyword);
$products = $product->search($keyword, $page, $itemPerPage);
if ($page = 1) {
	$prevPage = 1;
} else {
	$prevPage = $page - 1;
}
$nextPage = $page + 1;
$countProduct = 0;
?>

<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb-tree">
					<li><a href="#">Home</a></li>
					<li class="active">Tìm thấy <span><?php echo count($totalProduct); ?></span> cho từ khóa "<span><?php echo $_GET["keyword"]; ?></span>"</li>
					<!-- <li><a href="#">Accessories</a></li> -->
				</ul>
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /BREADCRUMB -->

<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<!-- ASIDE -->
			<div id="aside" class="col-md-3">
				<!-- aside Widget -->
				<div class="aside">
					<h3 class="aside-title">Categories</h3>
					<div class="checkbox-filter">
						<?php

						?>
						<div class="input-checkbox">
							<input type="checkbox" id="category-1">
							<label for="category-1">
								<span></span>
								Laptops
								<small>(120)</small>
							</label>
						</div>

						<div class="input-checkbox">
							<input type="checkbox" id="category-2">
							<label for="category-2">
								<span></span>
								Smartphones
								<small>(740)</small>
							</label>
						</div>

						<div class="input-checkbox">
							<input type="checkbox" id="category-3">
							<label for="category-3">
								<span></span>
								Cameras
								<small>(1450)</small>
							</label>
						</div>

						<div class="input-checkbox">
							<input type="checkbox" id="category-4">
							<label for="category-4">
								<span></span>
								Accessories
								<small>(578)</small>
							</label>
						</div>

						<div class="input-checkbox">
							<input type="checkbox" id="category-5">
							<label for="category-5">
								<span></span>
								Laptops
								<small>(120)</small>
							</label>
						</div>

						<div class="input-checkbox">
							<input type="checkbox" id="category-6">
							<label for="category-6">
								<span></span>
								Smartphones
								<small>(740)</small>
							</label>
						</div>
					</div>
				</div>
				<!-- /aside Widget -->

				<!-- aside Widget -->
				<div class="aside">
					<h3 class="aside-title">Price</h3>
					<div class="price-filter">
						<div id="price-slider"></div>
						<div class="input-number price-min">
							<input id="price-min" type="number">
							<span class="qty-up">+</span>
							<span class="qty-down">-</span>
						</div>
						<span>-</span>
						<div class="input-number price-max">
							<input id="price-max" type="number">
							<span class="qty-up">+</span>
							<span class="qty-down">-</span>
						</div>
					</div>
				</div>
				<!-- /aside Widget -->

				<!-- aside Widget -->
				<div class="aside">
					<h3 class="aside-title">Brand</h3>
					<div class="checkbox-filter">
						<div class="input-checkbox">
							<input type="checkbox" id="brand-1">
							<label for="brand-1">
								<span></span>
								SAMSUNG
								<small>(578)</small>
							</label>
						</div>
						<div class="input-checkbox">
							<input type="checkbox" id="brand-2">
							<label for="brand-2">
								<span></span>
								LG
								<small>(125)</small>
							</label>
						</div>
						<div class="input-checkbox">
							<input type="checkbox" id="brand-3">
							<label for="brand-3">
								<span></span>
								SONY
								<small>(755)</small>
							</label>
						</div>
						<div class="input-checkbox">
							<input type="checkbox" id="brand-4">
							<label for="brand-4">
								<span></span>
								SAMSUNG
								<small>(578)</small>
							</label>
						</div>
						<div class="input-checkbox">
							<input type="checkbox" id="brand-5">
							<label for="brand-5">
								<span></span>
								LG
								<small>(125)</small>
							</label>
						</div>
						<div class="input-checkbox">
							<input type="checkbox" id="brand-6">
							<label for="brand-6">
								<span></span>
								SONY
								<small>(755)</small>
							</label>
						</div>
					</div>
				</div>
				<!-- /aside Widget -->

				
			</div>
			<!-- /ASIDE -->

			<!-- STORE -->
			<div id="store" class="col-md-9">
				<!-- store top filter -->
				<div class="store-filter clearfix">
					<div class="store-sort">
						<label>
							Sort By:
							<select class="input-select">
								<option value="0">Popular</option>
								<option value="1">Position</option>
							</select>
						</label>

						<label>
							Show:
							<select class="input-select">
								<option value="0">20</option>
								<option value="1">50</option>
							</select>
						</label>
					</div>
					<ul class="store-grid">
						<li class="active"><i class="fa fa-th"></i></li>
						<li><a href="#"><i class="fa fa-th-list"></i></a></li>
					</ul>
				</div>
				<!-- /store top filter -->

				<!-- store products -->
				<div class="row">
					<!-- product -->
					<!-- product -->
					<?php
					$checkSale = true;
					// $products = $product->getStoreProducts($page,$itemPerPage);
					foreach ($products as $value) :
						$countProduct++;
					?>
						<div class="product-store col-md-4 col-xs-6">
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
										<button class="add-to-wishlist"><a
                                                        href="wishlistsession.php?id=<?php echo $value['id'] ?>"><i
                                                            class="fa fa-heart-o"></i><span class="tooltipp">add to
                                                            wishlist</span></a></button>
											<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
											<button class="quick-view">
												<a href="product.php?id=<?php echo $value['id'] ?>">
													<i= class="fa fa-eye"></i>
												</a>
												<span class="tooltipp">quick view</span>
											</button>
										</div>
									</div>
									<div class="add-to-cart">
										<a href="addsession.php?id=<?php echo intval($value['id']); ?>"><button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button></a>
									</div>
								</div>
							</div>
						</div>

					<?php
					endforeach; ?>
					<!-- /product -->
				</div>
				<!-- /store products -->

				<!-- store bottom filter -->
				<div class="store-filter clearfix">
					<span class="store-qty">Showing <?php echo $countProduct; ?> Products</span>
					<ul class="store-pagination">
						<li><a href="<?php echo "?page=$prevPage&keyword=$keyword" ?>"><i class="fa fa-angle-left"></i></a></li>
						<?php
						if (isset($_GET["page"])) {
							$page = $_GET["page"];
						} else {
							$page = 1;
						}
						for ($i = 1; $i <= ceil(count($totalProduct) / $itemPerPage); $i++) {
							if ($i == $page) {
								echo "<li class=\"active\">$i</li>";
							} else {
								echo "<li><a href=\"?page=$i&keyword=$keyword\">$i</a></li>";
							}
						}
						?>
						<li><a href="<?php echo "?page=$nextPage&keyword=$keyword" ?>"><i class="fa fa-angle-right"></i></a></li>
					</ul>
				</div>
				<!-- /store bottom filter -->
			</div>
			<!-- /STORE -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->

<?php include "footer.php"; ?>