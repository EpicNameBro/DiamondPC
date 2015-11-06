<?php
	require_once 'databaseconnect.php';
	$id = "";
	$product = [];
	$images = [];
	if(isset($_GET['product_id']))
	{
		$id = $_GET['product_id'];
		$STH = $DBH->query(
			"SELECT Product.Name AS product_name, Description, Details, Category.Name AS category_name, Price 
			 FROM Product INNER JOIN Category ON Product.Category_Id = Category.Category_Id
			 WHERE Product_Id = $id");
		$product = $STH->fetch();
	
	
		$STH = $DBH->query(
			"SELECT Image_Url
			   FROM Product_Image 
			  WHERE Product_Id=$id");
	
		while($image = $STH->fetch())
		{
			$images[] = $image["Image_Url"];
		}
	}
	?>
<!DOCTYPE HTML>
<html>
	<head>
		<?php include 'scripts.php';?>
		<style>
			#mainimage
			{
				outline: 10px solid grey;
				width: 100%;
				height: 270px;
			}

			.productboxthumb
			{
				

				margin: 10px 0px 10px 0px;
			}

			.previewimage
			{
				cursor: pointer;
			}
		</style>
		<script type="text/javascript">
			$( document ).ready(function() {
			    $(".previewimage").click(function() {
				  	$("#mainimage").attr("src", $(this).attr("src")); 
				});
			});
		</script>
	</head>
	<body>
		<div class="wrap">
			<?php include 'header.php';?>
			<div class="main">
				</br>

				<ol class="breadcrumb">
					<li><a href="index.html"><i class="glyphicon glyphicon-home"></i></a></li>
					<li><a href="categories.html">Category</a></li>
					<li><a href="product.html">Product</a></li>
				</ol>

				<div class="col-md-9">
					<div class="col-md-12 column productboxmain">
						<div class="row clearfix">
							<div class="col-md-6 column">
								<img id="mainimage"  src="<?= $images[0] ?>" class="img-responsive" alt="Alt Text">
								<?php
									for($i = 0 ; $i < count($images) ; $i++)
									{
						?>				<div class="col-md-3 column productboxthumb"> 
											
											<img style="width: 150px; height: 100px;" src="<?= $images[$i] ?>" class="previewimage img-responsive" alt="Alt Text">
											
										</div>
						<?php
									}
								?>
							</div>
							<div class="panel panel-default col-md-6 column">
								<div class="panel-body">
									<h1><?= $product['product_name'] ?></h1>
									<?= $product['Description'] ?><br>
									<b>Rating:</b> <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
									<div class="price"><b>Price: </b>$<?= $product['Price'] ?></div>
									<form role="form">
										<div class="form-group">
											<label>Quantity</label>
											<select>
												<?php
												for($i = 1 ; $i <= 10 ; $i++)
												{
										?>			
													<option value="<?= $i ?>"><?= $i ?></option>
										<?php 	}
												?>
											</select>
										</div>
										<button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-shopping-cart"></span> ADD TO CART</button>
									</form>
								</div>
							</div>
						</div>
					</div>

						</br></br>
					<div class="col-md-12 column productbox">
						<div class="row clearfix">
							<div class="col-md-12 column">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#details" data-toggle="tab">Detail</a></li>
									<li><a href="#reviews" data-toggle="tab"><span class="glyphicon glyphicon-comment"></span> Reviews</a></li>
								</ul>
								<!-- Tab panes -->
								<div class="tab-content">
									<div class="tab-pane active" id="details">
										<div class="tabcontent">
											<div class="panel panel-default">
												<div class="panel-body">
													<?= $product['Details'] ?>
												</div>
											</div>
										</div>
									</div>
									
									<div class="tab-pane" id="reviews">
										<div class="panel widget">
											<div class="panel-body">
												<ul class="list-group">
													<li class="list-group-item">
														<div class="row">
															<div class="col-xs-2 col-md-2"> <img src="http://placehold.it/80" class="img-circle img-responsive" alt=""></div>
															<div class="col-xs-10 col-md-10">
																<div>
																	<a href=""> Lorem ipsum dolor sit amet, consectetuer adipiscing elit</a>
																	<div class="mic-info"> By: <a href="#">Jon Harding</a> on 19 Oct 2013 </div>
																</div>
																<div class="comment-text"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit </div>
																<div class="action"> <b>Rating:</b> <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i> </div>
															</div>
														</div>
													</li>
													<li class="list-group-item">
														<div class="row">
															<div class="col-xs-2 col-md-2"> <img src="http://placehold.it/80" class="img-circle img-responsive" alt=""></div>
															<div class="col-xs-10 col-md-10">
																<div>
																	<a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</a>
																	<div class="mic-info"> By: <a href="#">Jon Harding</a> on 19 Oct 2013 </div>
																</div>
																<div class="comment-text"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
																	euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim 
																</div>
																<div class="action"> <b>Rating:</b> <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i> </div>
															</div>
														</div>
													</li>
													<li class="list-group-item">
														<div class="row">
															<div class="col-xs-2 col-md-2"> <img src="http://placehold.it/80" class="img-circle img-responsive" alt=""></div>
															<div class="col-xs-10 col-md-10">
																<div>
																	<a href="">Lorem ipsum dolor sit amet</a>
																	<div class="mic-info"> By: <a href="#">Jon Harding</a> on 19 Oct 2013 </div>
																</div>
																<div class="comment-text"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
																	euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim 
																</div>
																<div class="action"> <b>Rating:</b> <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i> </div>
															</div>
														</div>
													</li>
												</ul>
												<a href="#" class="btn btn-primary btn-sm btn-block" role="button"><span class="glyphicon glyphicon-refresh"></span> More</a> 
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-3">
					<div class="row">
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
					</br>
					
					<div class="row">
						<div class="categories">
							<ul>

								<h3>Related Products</h3>
								<li><a href='#'>See all</a></li>
								
							</ul>
						</div>	
						<div class="panel panel-default">
							<div class="panel-body">

							</div>
						</div>	
					</div>
				</div>
				
				<!--<div id="myCarousel" class="carousel slide" data-ride="carousel" style="width: 100%">
					<ol class="carousel-indicators">
					<?php
						for($i = 0 ; $i < count($images) ; $i++)
						{
						?>		
							<li data-target="#myCarousel" data-slide-to="<?= $i ?>" class="item <?= $i == 0 ? 'active' : '' ?>"></li>
					<?php
						}
						?>	
					</ol>
					
					<div class="carousel-inner" role="listbox">
						<?php
						for($i = 0 ; $i < count($images) ; $i++)
						{
						?>				
								<div class="item <?= $i == 0 ? 'active' : '' ?>">
									<img style="width: 100%; height: 100%;" src="<?= $images[$i] ?>" alt=" "/>
								</div>
					<?php
						}
						?>
						
						<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
						</a>
						<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
						</a>
					</div>-->
				<!--Quantity:
					<select>
						<?php
						for($i = 1 ; $i <= 10 ; $i++)
						{
						?>			
						<option value="<?= $i ?>"><?= $i ?></option>
						<?php 	}
						?>
					</select>-->
			</div>
		</div>
		<?php include 'footer.php';?>
	</body>
</html>