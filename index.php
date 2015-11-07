<?php
	require_once 'databaseconnect.php';
	?>
<!DOCTYPE HTML>
<html>
<head>
	<?php include 'scripts.php' ?>
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
								echo "<li><a href='category.php?category_id=$row[Category_Id]'>$row[Name]</a></li>";
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
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="heading">
							<h3>New Products</h3>
						</div>
						<div class="see">
							<p><a href="#">See all Products</a></p>
						</div>
						<div class="clear"></div>
					</div>
				</div>

				<div class="section group newest">
					<?php
						$STH = $DBH->query(
							"SELECT Product_Id, Name, Price 
							   FROM Product
							  ORDER BY Date_Added DESC LIMIT 4");
						while($row = $STH->fetch())
						{
							$STH_image = $DBH->query(
							"SELECT Image_Url 
							   FROM Product_Image
							  WHERE Product_Id=$row[Product_Id] LIMIT 1");
							$image = $STH_image->fetch()['Image_Url'];
?>
							<div class="grid_1_of_4 images_1_of_4">
								<a href="preview.php?product_id=<?= $row['Product_Id'] ?>"><img style="width: 212px; height: 212px;" src="<?= $image ?>" alt="" /></a>
								<h2><?= $row['Name'] ?></h2>
								<div class="price-details">
									<div class="price-number">
										<p><span class="rupees">$<?= $row['Price'] ?></span></p>
									</div>
									<div class="add-cart">
										<h4><a href="preview.php">Add to Cart</a></h4>
									</div>
									<div class="clear"></div>
								</div>
							</div>

<?php
						}


					?>
					
				</div>

				</br>

				<div class="panel panel-default">
					<div class="panel-body">
						<div class="heading">
							<h3>Featured Products</h3>
						</div>
						<div class="see">
							<p><a href="#">See all Products</a></p>
						</div>
						<div class="clear"></div>
					</div>
				</div>
				
				<div class="section group featured">
				<?php
						$STH = $DBH->query(
							"SELECT Product_Id, Name, Price 
							   FROM Product
							  WHERE Featured=1 ORDER BY Date_Added DESC LIMIT 4");
						while($row = $STH->fetch())
						{
							$STH_image = $DBH->query(
							"SELECT Image_Url 
							   FROM Product_Image
							  WHERE Product_Id=$row[Product_Id] LIMIT 1");
							$image = $STH_image->fetch()['Image_Url'];
?>
							<div class="grid_1_of_4 images_1_of_4">
								<a href="preview.php?product_id=<?= $row['Product_Id'] ?>"><img style="width: 212px; height: 212px;" src="<?= $image ?>" alt="" /></a>
								<h2><?= $row['Name'] ?></h2>
								<div class="price-details">
									<div class="price-number">
										<p><span class="rupees">$<?= $row['Price'] ?></span></p>
									</div>
									<div class="add-cart">
										<h4><a href="preview.php">Add to Cart</a></h4>
									</div>
									<div class="clear"></div>
								</div>
							</div>
<?php
						}
					?>
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