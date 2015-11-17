<?php
	require_once 'databaseconnect.php';
?>
<!DOCTYPE HTML>
<html>
<head>
	<?php include 'scripts.php' ?>
	<style>
		.producttitle h2
		{
			font-size: 1.1em;
			text-align: center;
		}

		.price-number p
		{
			font-size:1.0em;
			vertical-align: middle;
		}

		.addcart
		{
			float: right;
		}

		.previewimage
		{
			display: block;
		    margin-left: auto;
		    margin-right: auto;
		}

		
	</style>

	<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="js/jssor.slider.mini.js"></script>

	<script>
        jQuery(document).ready(function ($) {
            
            var jssor_1_SlideoTransitions = [
              [{b:5500.0,d:3000.0,o:-1.0,r:240.0,e:{r:2.0}}],
              [{b:-1.0,d:1.0,o:-1.0,c:{x:51.0,t:-51.0}},{b:0.0,d:1000.0,o:1.0,c:{x:-51.0,t:51.0},e:{o:7.0,c:{x:7.0,t:7.0}}}],
              [{b:-1.0,d:1.0,o:-1.0,sX:9.0,sY:9.0},{b:1000.0,d:1000.0,o:1.0,sX:-9.0,sY:-9.0,e:{sX:2.0,sY:2.0}}],
              [{b:-1.0,d:1.0,o:-1.0,r:-180.0,sX:9.0,sY:9.0},{b:2000.0,d:1000.0,o:1.0,r:180.0,sX:-9.0,sY:-9.0,e:{r:2.0,sX:2.0,sY:2.0}}],
              [{b:-1.0,d:1.0,o:-1.0},{b:3000.0,d:2000.0,y:180.0,o:1.0,e:{y:16.0}}],
              [{b:-1.0,d:1.0,o:-1.0,r:-150.0},{b:7500.0,d:1600.0,o:1.0,r:150.0,e:{r:3.0}}],
              [{b:10000.0,d:2000.0,x:-379.0,e:{x:7.0}}],
              [{b:10000.0,d:2000.0,x:-379.0,e:{x:7.0}}],
              [{b:-1.0,d:1.0,o:-1.0,r:288.0,sX:9.0,sY:9.0},{b:9100.0,d:900.0,x:-1400.0,y:-660.0,o:1.0,r:-288.0,sX:-9.0,sY:-9.0,e:{r:6.0}},{b:10000.0,d:1600.0,x:-200.0,o:-1.0,e:{x:16.0}}]
            ];
            
            var jssor_1_options = {
              $AutoPlay: true,
              $SlideDuration: 800,
              $SlideEasing: $Jease$.$OutQuint,
              $CaptionSliderOptions: {
                $Class: $JssorCaptionSlideo$,
                $Transitions: jssor_1_SlideoTransitions
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
              }
            };
            
            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
            
            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizes
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 1920);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            //responsive code end
        });
    </script>
</head>
<body>
	<div class="wrap">
		<!-- HEADER BEGIN -->
		<?php include 'header.php';?>
		<!-- HEADER END -->
		<div class="header_slide">
			<div class="col-md-2 header_bottom_left">
				<div class="categories">
					<ul>
						<h3>Categories</h3>
						<?php
							//display a list of all categories
							$STH = $DBH->query("SELECT Category_Id, Name FROM Category");
							while($row = $STH->fetch())
							{
								echo "<li><a href='category.php?category_id=$row[Category_Id]'>$row[Name]</a></li>";
							}
						?>
						
					</ul>
				</div>
			</div>
			<div class="col-md-10 header_bottom_right">
				<div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 1300px; height: 500px; overflow: hidden; visibility: hidden;">
			        <!-- Loading Screen -->
			        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
			            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
			            <div style="position:absolute;display:block;background:url('img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
			        </div>
			        <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 1300px; height: 500px; overflow: hidden;">
			            <div data-p="225.00" style="display: none;">
			                <!--<img data-u="image" src="img/red.jpg" />-->
			                <div class="slider-img">
								<a href="preview.php"><img src="images/slide-1-image.png" alt="learn more" /></a>									    
							</div>
			                <h1>Clearance<br><span>SALE</span></h1>
								<h2>UPTo 20% OFF</h2>
								<div class="features_list">
									<h4>Get to Know More About Our Memorable Services Lorem Ipsum is simply dummy text</h4>
								</div>
								<a href="preview.php" class="button">Shop Now</a>
			            </div>
			            <div data-p="225.00" style="display: none;">
			                <!--<img data-u="image" src="img/purple.jpg" />-->
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
			            </div>
			            <div data-p="225.00" style="display: none;">
			                <!--<img data-u="image" src="img/blue.jpg" />-->
			                <div class="slider-img">
								<a href="preview.php"><img src="images/slide-3-image.jpg" alt="learn more" /></a>
							</div>
			                <div class="slider-text">
								<h1>Clearance<br><span>SALE</span></h1>
								<h2>UPTo 40% OFF</h2>
								<div class="features_list">
									<h4>Get to Know More About Our Memorable Services</h4>
								</div>
								<a href="preview.php" class="button">Shop Now</a>
							</div>
			            </div>
			        </div>
			        <!-- Bullet Navigator -->
			        <div data-u="navigator" class="jssorb05" style="bottom:16px;right:6px;" data-autocenter="1">
			            <!-- bullet navigator item prototype -->
			            <div data-u="prototype" style="width:16px;height:16px;"></div>
			        </div>
			        <!-- Arrow Navigator -->
			        <span data-u="arrowleft" class="jssora22l" style="top:123px;left:12px;width:40px;height:58px;" data-autocenter="2"></span>
			        <span data-u="arrowright" class="jssora22r" style="top:123px;right:12px;width:40px;height:58px;" data-autocenter="2"></span>
			        <a href="http://www.jssor.com" style="display:none">Jssor Slider</a>
			    </div>

			    <!-- #endregion Jssor Slider End -->
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
						//display the newest products
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
							<div class="col-md-3">
								<div class="panel panel-default">
									<div class="producttitle panel-body">
										<a href="preview.php?product_id=<?= $row['Product_Id'] ?>">
											<img class="previewimage" style="width: 212px; height: 212px;" src="<?= $image ?>" alt="" />
											<h2 class=""><?= $row['Name'] ?></h2>
										</a>
										

										<div class="price-details" >
											</br>
											<div class="price-number">
												<p><span class="rupees">$<?= $row['Price'] ?></span></p>
											</div>
											<form role="form" method="POST" action="cart.php">
												<button name="addcart" value="<?= $row['Product_Id'] ?>" type="submit" class="addcart btn btn-info"><span class="glyphicon glyphicon-shopping-cart"></span></button>
											</form>
											<div class="clear"></div>
										</div>
									</div>
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
						//display the featured products
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
							<div class="col-md-3">
								<div class="panel panel-default">
									<div class="producttitle panel-body">
										<a href="preview.php?product_id=<?= $row['Product_Id'] ?>">
											<img class="previewimage" style="width: 212px; height: 212px;" src="<?= $image ?>" alt="" />
											<h2 class=""><?= $row['Name'] ?></h2>
										</a>
										
										<div class="price-details" >
											</br>
											<div class="price-number">
												<p><span class="rupees">$<?= $row['Price'] ?></span></p>
											</div>
											<form role="form" method="POST" action="cart.php">
												<button name="addcart" value="<?= $row['Product_Id'] ?>" type="submit" class="addcart btn btn-info"><span class="glyphicon glyphicon-shopping-cart"></span></button>
											</form>
											<div class="clear"></div>
										</div>
									</div>
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