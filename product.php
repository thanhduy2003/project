	<?php 
	include "header.php";
	// $id = $_GET["id"];
	// $arrReview = $product->getReview($_GET["id"]);
	// $page = isset($_GET["page"]) ? $_GET["page"] : 1;
	// $totalReview = count($arrReview);
	// $itemPerPage = isset($_GET["iPP"]) ? $_GET["iPP"] : 3;
	// if ($page = 1) {
	// 	$prevPage = 1;
	// } else {
	// 	$prevPage = $page - 1;
	// }
	// $nextPage = $page + 1;
	// $countProduct = 0;
	// $review = new ProductComment;
	// $reviewthree = $review->getReview($_GET["id"], $page, $itemPerPage);
	$id = $_GET["id"];
	$arrReview = $product->getReview($id);
	$page = isset($_GET["page"]) ? $_GET["page"] : 1;
	$itemPerPage = isset($_GET["iPP"]) ? $_GET["iPP"] : 3;
	// $category = isset($_GET["category"]) ? $_GET["category"] : "AllProducts";
	// if ($category == "AllProducts") {
	// 	$products = $product->getStoreProducts($page, $itemPerPage);
	// 	$totalProduct = $product->getAllProducts();
	// } else {
	// 	$products = $product->getProductByProtypes($_GET["category"]);
	// 	$totalProduct = $product->getProductByProtypes($_GET["category"]);
	// }
	$review = new ProductComment;
	$totalReivew = $product->getReview($id);
	$threereview = $review->getReview($_GET["id"], $page, $itemPerPage);
	if ($page = 1) {
		$prevPage = 1;
	} else {
		$prevPage = $page - 1;
	}
	$nextPage = $page + 1;
	$countProduct = 0;
	?>
	<!-- /Header -->

	<!-- BREADCRUMB -->
	<div id="breadcrumb" class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12">
					<ul class="breadcrumb-tree">
						<li><a href="#">Home</a></li>
						<li><a href="#">All Categories</a></li>
						<li><a href="#">Accessories</a></li>
						<li><a href="#">Headphones</a></li>
						<li class="active">Product name goes here</li>
					</ul>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /BREADCRUMB -->
	<!-- ============================================================================================================ -->
	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<?php
		$products = $product->getAllProducts();
		$manu_id;
		if (isset($_GET['id'])) {
			$gid = $_GET['id'];
		}
		foreach ($products as $key => $value) {
			if ($gid == $value['id']) {
				$manu_id = $value["manu_id"];
		?>
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- Product main img -->
						<div class="col-md-5 col-md-push-2">
							<div id="product-main-img">
								<div class="product-preview">
									<img src="./img/<?php echo $value["image"]; ?>" alt="">
								</div>

								<div class="product-preview">
									<img src="./img/<?php echo $value["image2"]; ?>" alt="">
								</div>

								<div class="product-preview">
									<img src="./img/<?php echo $value["image3"]; ?>" alt="">
								</div>

								<div class="product-preview">
									<img src="./img/<?php echo $value["image4"]; ?>" alt="">
								</div>
							</div>
						</div>
						<!-- /Product main img -->

						<!-- Product thumb imgs -->
						<div class="col-md-2  col-md-pull-5">
							<div id="product-imgs">
								<div class="product-preview">
									<img src="./img/<?php echo $value["image"]; ?>" alt="">
								</div>

								<div class="product-preview">
									<img src="./img/<?php echo $value["image2"]; ?>" alt="">
								</div>

								<div class="product-preview">
									<img src="./img/<?php echo $value["image3"]; ?>" alt="">
								</div>

								<div class="product-preview">
									<img src="./img/<?php echo $value["image4"]; ?>" alt="">
								</div>
							</div>
						</div>
						<!-- /Product thumb imgs -->

						<!-- Product details -->
						<div class="col-md-5">
							<div class="product-details">
								<h2 class="product-name"><?php echo $value['name'] ?></h2>
								<div>
									<div class="product-rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-o"></i>
									</div>
									<a class="review-link" href="#"><?php echo count($arrReview); ?> Review(s) | Add your review</a>
								</div>
								<div>
									<?php
									if ($value["feature"] != 1) {
									?>
										<h3 class="product-price"><?php echo number_format($value["price"] * 0.7) ?> <del class="product-old-price"><?php echo number_format($value["price"]) ?></del></h3>
									<?php
									} else {
									?>
										<h3 class="product-price"><?php echo number_format($value["price"]) ?></h3>
									<?php
									}
									?>
									<span class="product-available">In Stock</span>
								</div>
								<p><?php echo $value['description'] ?></p>

								<div class="product-options">
									<label>
										Size
										<select class="input-select">
											<option value="0">X</option>
										</select>
									</label>
									<label>
										Color
										<select class="input-select">
											<option value="0">Red</option>
										</select>
									</label>
								</div>

								<div class="add-to-cart">
									<div class="qty-label">
										Qty
										<div class="input-number">
											<input type="number" value="1">
											<span class="qty-up">+</span>
											<span class="qty-down">-</span>
										</div>
									</div>
									<a href="addsession.php?id=<?php echo intval($value['id']); ?>"><button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button></a>
								</div>

								<ul class="product-btns">
									<li><a href="#"><i class="fa fa-heart-o"></i> add to wishlist</a></li>
									<li><a href="#"><i class="fa fa-exchange"></i> add to compare</a></li>
								</ul>

								<ul class="product-links">
									<li>Category:</li>
									<li><a href="#"><?php echo $value['type_name'] ?></a></li>
									<li><a href="#"><?php echo $value['manu_name'] ?></a></li>
								</ul>

								<ul class="product-links">
									<li>Share:</li>
									<li><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
									<li><a href="#"><i class="fa fa-envelope"></i></a></li>
								</ul>

							</div>
						</div>
						<!-- /Product details -->

						<!-- Product tab -->
						<div class="col-md-12">
							<div id="product-tab">
								<!-- product tab nav -->
								<ul class="tab-nav">
									<li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
									<li><a data-toggle="tab" href="#tab2">Details</a></li>
									<li><a data-toggle="tab" href="#tab3">Reviews (<?php echo count($arrReview); ?>)</a></li>
								</ul>
								<!-- /product tab nav -->

								<!-- product tab content -->
								<div class="tab-content">
									<!-- tab1  -->
									<div id="tab1" class="tab-pane fade in active">
										<div class="row">
											<div class="col-md-12">
												<p><?php echo $value['description'] ?></p>
											</div>
										</div>
									</div>
									<!-- /tab1  -->

									<!-- tab2  -->
									<div id="tab2" class="tab-pane fade in">
										<div class="row">
											<div class="col-md-12">
												<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
											</div>
										</div>
									</div>
									<!-- /tab2  -->

									<!-- tab3  -->
									<div id="tab3" class="tab-pane fade in">
										<div class="row">
											<!-- Rating -->
											<div class="col-md-3">
												<div id="rating">
													<div class="rating-avg">
														<?php
														$star = array();
														$star[1] = 0;
														$star[2] = 0;
														$star[3] = 0;
														$star[4] = 0;
														$star[5] = 0;
														foreach ($arrReview as $review) {
															switch ($review["rate"]) {
																case '1':
																	$star[1]++;
																	break;
																case '2':
																	$star[2]++;
																	break;
																case '3':
																	$star[3]++;
																	break;
																case '4':
																	$star[4]++;
																	break;
																case '5':
																	$star[5]++;
																	break;

																default:
																	# code...
																	break;
															}
														}
														$avg_star = 0;
														foreach ($arrReview as $value) {
															$avg_star += $value["rate"];
														}
														$avg_star = count($arrReview) > 0 ? $avg_star / count($arrReview) : 0;
														?>
														<span><?php echo $avg_star ?></span>
														<div class="rating-stars">
															<?php
															for ($i = 0; $i < $avg_star; $i++) {
																echo "<i class=\"fa fa-star\"></i>";
															}
															for ($i = 0; $i < 5 - $avg_star; $i++) {
																echo "<i class=\"fa fa-star-o\"></i>";
															}
															?>
														</div>
													</div>
													<ul class="rating">
														<li>
															<div class="rating-stars">
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
															</div>
															<div class="rating-progress">
																<div style="width: <?php echo (count($arrReview)) * 100 > 0 ? $star[5] / (count($arrReview)) * 100 : 0 ?>%;"></div>
															</div>
															<span class="sum"><?php echo $star[5]; ?></span>
														</li>
														<li>
															<div class="rating-stars">
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star-o"></i>
															</div>
															<div class="rating-progress">
																<div style="width: <?php echo (count($arrReview)) * 100 > 0 ? $star[4] / (count($arrReview)) * 100 : 0 ?>%;"></div>
															</div>
															<span class="sum"><?php echo $star[4]; ?></span>
														</li>
														<li>
															<div class="rating-stars">
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
															</div>
															<div class="rating-progress">
																<div style="width: <?php echo (count($arrReview)) * 100 > 0 ? $star[3] / (count($arrReview)) * 100 : 0 ?>%;"></div>
															</div>
															<span class="sum"><?php echo $star[3]; ?></span>
														</li>
														<li>
															<div class="rating-stars">
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
															</div>
															<div class="rating-progress">
																<div style="width: <?php echo (count($arrReview) > 0 ? $star[2] / count($arrReview) : 0) * 100 ?>%;"></div>
															</div>
															<span class="sum"><?php echo $star[2]; ?></span>
														</li>
														<li>
															<div class="rating-stars">
																<i class="fa fa-star"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
															</div>
															<div class="rating-progress">
																<div style="width: <?php echo (count($arrReview) > 0 ? $star[1] / count($arrReview) : 0) * 100 ?>%;"></div>
															</div>
															<span class="sum"><?php echo $star[1]; ?></span>
														</li>
													</ul>
												</div>
											</div>
											<!-- /Rating -->

											<!-- Reviews -->
											<div class="col-md-6">
												<div id="reviews">
													<ul class="reviews">
														<?php
														foreach ($threereview as $review) :
														?>
															<li>
																<div class="review-heading">
																	<h5 class="name"><?php echo $review["username"] ?></h5>
																	<p class="date"><?php echo $review["created_at"] ?></p>

																	<div class="review-rating">
																		<?php
																		for ($i = 0; $i < $review["rate"]; $i++) {
																			echo "<i class=\"fa fa-star\"></i>";
																		}
																		for ($i = 0; $i < 5 - $review["rate"]; $i++) {
																			echo "<i class=\"fa fa-star-o empty\"></i>";
																		}
																		?>
																	</div>
																</div>
																<div class="review-body">
																	<p><?php echo $review["review"]; ?></p>
																</div>
															</li>
														<?php endforeach; ?>
													</ul>
													<ul class="reviews-pagination">
														<li><a href="<?php echo "?page=$prevPage&id=$id" ?>"><i class="fa fa-angle-left"></i></a></li>
														<?php
														if (isset($_GET["page"])) {
															$page = $_GET["page"];
														} else {
															$page = 1;
														}
														for ($i = 1; $i <= ceil(count($arrReview) / $itemPerPage); $i++) {
															if ($i == $page) {
																echo "<li class=\"active\">$i</li>";
															} else {
																echo "<li><a href=\"?page=$i&id=$id\">$i</a></li>";
															}
														}
														?>
														<li><a href="<?php echo "?page=$nextPage&keyword=$id" ?>"><i class="fa fa-angle-right"></i></a></li>
												</div>
											</div>
											<!-- /Reviews -->

											<!-- Review Form -->
											<?php
											if ($user == "Guest") {
											?>
												<div class="col-md-3">
													<a href="./login/index" class="primary-btn">Đăng nhập để bình luận</a>
												</div>
											<?php
											} else {
												$userArr = $product->getUser($user);
											?>
												<div class="col-md-3">
													<div id="review-form">
														<form class="review-form" action="reviewprocess.php" method="GET">
															<input class="input" type="text" name="username" value="<?php echo $userArr[0]["username"]; ?>" readonly>
															<!-- <input class="input" type="email" name="email" value="<?php echo $userArr[0]["email"]; ?>"> -->
															<textarea class="input" name="review" placeholder="Your Review"></textarea>
															<div class="input-rating">
																<span>Your Rating:</span>
																<div class="stars">
																	<input id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
																	<input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
																	<input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
																	<input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
																	<input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
																</div>
															</div>
															<input type="text" name="product_id" value="<?php echo $_GET["id"] ?>" hidden>
															<button class="primary-btn">Submit</button>
														</form>
													</div>
												</div>
											<?php }
											?>
											<!-- /Review Form -->
										</div>
									</div>
									<!-- /tab3  -->
								</div>
								<!-- /product tab content  -->
							</div>
						</div>
						<!-- /product tab -->
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
	</div>
	<?php }
		} ?>
	<!-- /SECTION -->

	<!-- Section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">

				<div class="col-md-12">
					<div class="section-title text-center">
						<h3 class="title">Related Products</h3>
					</div>
				</div>
				<!-- product -->
				<?php
				$checkSale = true;
				$products = $product->getRelatedProducts($manu_id, $_GET["id"]);
				foreach ($products as $value) :
				?>
					<div class="col-md-3 col-xs-6">
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
										<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
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
				<?php endforeach; ?>
				<!-- /product -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /Section -->

	<!-- FOOTER -->
	<?php include "footer.php"; ?>
	<!-- /FOOTER -->