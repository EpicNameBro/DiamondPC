<?php
	require_once 'databaseconnect.php';
	?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Diamond PC</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
	<link href="css/slider.css" rel="stylesheet" type="text/css" media="all"/>
	<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript" src="js/startstop-slider.js"></script>
</head>
<body>
	<div class="wrap">
		<!-- HEADER BEGIN -->
		<?php include 'header.php';?>
		<!-- HEADER END -->
		<div class="header_slide">
			<div class="header_bottom_left">
				<div class="categories">
					<ul>
						<h3>Categories</h3>
						<?php
							$STH = $DBH->query("SELECT Category_Id, Name FROM Category");
							while($row = $STH->fetch())
							{
								echo "<li><a href='$row[Category_Id]'>$row[Name]</a></li>";
							}
						?>
						
					</ul>
				</div>
			</div>
			<div class="header_bottom_right">
				<div class="slider">
					<div id="slider">
						<div id="mover">
							<div id="slide-1" class="slide">
								<div class="slider-img">
									<a href="preview.php"><img src="images/slide-1-image.png" alt="learn more" /></a>									    
								</div>
								<div class="slider-text">
									<h1>Clearance<br><span>SALE</span></h1>
									<h2>UPTo 20% OFF</h2>
									<div class="features_list">
										<h4>Get to Know More About Our Memorable Services Lorem Ipsum is simply dummy text</h4>
									</div>
									<a href="preview.php" class="button">Shop Now</a>
								</div>
								<div class="clear"></div>
							</div>
							<div class="slide">
								<div class="slider-text">
									<h1>Clearance<br><span>SALE</span></h1>
									<h2>UPTo 40% OFF</h2>
									<div class="features_list">
										<h4>Get to Know More About Our Memorable Services</h4>
									</div>
									<a href="preview.php" class="button">Shop Now</a>
								</div>
								<div class="slider-img">
									<a href="preview.php"><img src="images/slide-3-image.jpg" alt="learn more" /></a>
								</div>
								<div class="clear"></div>
							</div>
							<div class="slide">
								<div class="slider-img">
									<a href="preview.php"><img src="images/slide-2-image.jpg" alt="learn more" /></a>
								</div>
								<div class="slider-text">
									<h1>Clearance<br><span>SALE</span></h1>
									<h2>UPTo 10% OFF</h2>
									<div class="features_list">
										<h4>Get to Know More About Our Memorable Services Lorem Ipsum is simply dummy text</h4>
									</div>
									<a href="preview.php" class="button">Shop Now</a>
								</div>
								<div class="clear"></div>
							</div>
						</div>
					</div>
					<div class="clear"></div>
				</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="main">
			<div class="content">
				<div class="content_top">
					<div class="heading">
						<h3>New Products</h3>
					</div>
					<div class="see">
						<p><a href="#">See all Products</a></p>
					</div>
					<div class="clear"></div>
				</div>
				<div class="section group">
					<div class="grid_1_of_4 images_1_of_4">
						<a href="preview.php"><img src="images/feature-pic1.jpg" alt="" /></a>
						<h2>Lorem Ipsum is simply </h2>
						<div class="price-details">
							<div class="price-number">
								<p><span class="rupees">$620.87</span></p>
							</div>
							<div class="add-cart">
								<h4><a href="preview.php">Add to Cart</a></h4>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<div class="grid_1_of_4 images_1_of_4">
						<a href="preview.php"><img src="images/feature-pic2.jpg" alt="" /></a>
						<h2>Lorem Ipsum is simply </h2>
						<div class="price-details">
							<div class="price-number">
								<p><span class="rupees">$899.75</span></p>
							</div>
							<div class="add-cart">
								<h4><a href="preview.php">Add to Cart</a></h4>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<div class="grid_1_of_4 images_1_of_4">
						<a href="preview.php"><img src="images/feature-pic3.jpg" alt="" /></a>
						<h2>Lorem Ipsum is simply </h2>
						<div class="price-details">
							<div class="price-number">
								<p><span class="rupees">$599.00</span></p>
							</div>
							<div class="add-cart">
								<h4><a href="preview.php">Add to Cart</a></h4>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<div class="grid_1_of_4 images_1_of_4">
						<a href="preview.php"><img src="images/feature-pic4.jpg" alt="" /></a>
						<h2>Lorem Ipsum is simply </h2>
						<div class="price-details">
							<div class="price-number">
								<p><span class="rupees">$679.87</span></p>
							</div>
							<div class="add-cart">
								<h4><a href="preview.php">Add to Cart</a></h4>
							</div>
							<div class="clear"></div>
						</div>
					</div>
				</div>
				<div class="content_bottom">
					<div class="heading">
						<h3>Feature Products</h3>
					</div>
					<div class="see">
						<p><a href="#">See all Products</a></p>
					</div>
					<div class="clear"></div>
				</div>
				<div class="section group">
					<div class="grid_1_of_4 images_1_of_4">
						<a href="preview.php"><img src="images/new-pic1.jpg" alt="" /></a>					
						<h2>Lorem Ipsum is simply </h2>
						<div class="price-details">
							<div class="price-number">
								<p><span class="rupees">$849.99</span></p>
							</div>
							<div class="add-cart">
								<h4><a href="preview.php">Add to Cart</a></h4>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<div class="grid_1_of_4 images_1_of_4">
						<a href="preview.php"><img src="images/new-pic2.jpg" alt="" /></a>
						<h2>Lorem Ipsum is simply </h2>
						<div class="price-details">
							<div class="price-number">
								<p><span class="rupees">$599.99</span></p>
							</div>
							<div class="add-cart">
								<h4><a href="preview.php">Add to Cart</a></h4>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<div class="grid_1_of_4 images_1_of_4">
						<a href="preview.php"><img src="images/new-pic4.jpg" alt="" /></a>
						<h2>Lorem Ipsum is simply </h2>
						<div class="price-details">
							<div class="price-number">
								<p><span class="rupees">$799.99</span></p>
							</div>
							<div class="add-cart">
								<h4><a href="preview.php">Add to Cart</a></h4>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<div class="grid_1_of_4 images_1_of_4">
						<a href="preview.php"><img src="images/new-pic3.jpg" alt="" /></a>
						<h2>Lorem Ipsum is simply </h2>
						<div class="price-details">
							<div class="price-number">
								<p><span class="rupees">$899.99</span></p>
							</div>
							<div class="add-cart">
								<h4><a href="preview.php">Add to Cart</a></h4>
							</div>
							<div class="clear"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	<!-- FOOTER BEGIN -->
	<?php include 'footer.php';?>
	<!-- FOOTER END -->
</body>
</html>