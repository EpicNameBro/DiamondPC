<?php
	require_once 'databaseconnect.php';
	$id = "";
	$product = [];
	$images = [];
	if(isset($_GET['product_id']))
	{
		$id = $_GET['product_id'];
		$STH = $DBH->prepare(
			"SELECT Product.Name AS product_name, Description, Details, Category.Category_Id AS category_id, Category.Name AS category_name, Price 
			 FROM Product INNER JOIN Category ON Product.Category_Id = Category.Category_Id
			 WHERE Product_Id = ?");
		$STH->bindParam(1, $id);
		$STH->execute();
		$product = $STH->fetch();
	
	
		$STH = $DBH->prepare(
			"SELECT Image_Url
			   FROM Product_Image 
			  WHERE Product_Id=?");
		$STH->bindParam(1, $id);
		$STH->execute();
	
		while($image = $STH->fetch())
		{
			$images[] = $image["Image_Url"];
		}
	}
	else
	{
		header("Location: index.php");
		die();
	}
	?>
<!DOCTYPE HTML>
<html>
	<head>
		<?php include 'scripts.php';?>
		<style>
			#mainimage
			{
				
				width: 100%;
				height: 300px;
			}

			.productboxthumb
			{
				outline: 1px solid grey;
				margin: 10px 0px 10px 0px;
			}

			.previewimage
			{
				cursor: pointer;
			}

			.description
			{
				height: 100%;
			}

			.share
			{
				background-color: black;
				border-radius: 5px;
				margin: 30px 20px 10px 0px;
			}

			.share img
			{
				width: 35px;
				height: 35px;
			}
		</style>
		<script type="text/javascript">
			$( document ).ready(function() {
			    $(".previewimage").click(function() {
				  	$("#mainimage").attr("src", $(this).attr("src")); 
				});
			    $(".previewimage").hover(function() {
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
					<li><a href="index.php"><i class="glyphicon glyphicon-home"></i></a></li>
					<li><a href="category.php?category_id=<?= $product['category_id'] ?>"><?= $product['category_name'] ?></a></li>
					<li><a href="product.html"><?= $product['product_name'] ?></a></li>
				</ol>

				<div class="col-md-9">
					<div class="col-md-12 column productboxmain">
						<div class="row clearfix">
							<div class="col-md-6 column">
								<div class="panel panel-default">
									<div class="panel-body">
										<div class="col-md-3">
											<?php
												for($i = 0 ; $i < count($images) ; $i++)
												{
									?>				<div class="row productboxthumb"> 
														
														<img style="width: 150px; height: 50px;" src="<?= $images[$i] ?>" class="previewimage img-responsive" alt="Alt Text">
														
													</div>
									<?php
												}
											?>
										</div>

										<div class="col-md-9">
											<img id="mainimage"  src="<?= $images[0] ?>" class="img-responsive" alt="Alt Text">
										</div>
									</div>
								</div>
							</div>
							<div class="description panel panel-default col-md-6 column">
								<div class="panel-body">
									<h1><?= $product['product_name'] ?></h1>
									<hr>
									<?= $product['Description'] ?><br>
									<div class="rating"><b>Rating:</b> </div>
									<div class="price"><b>Price: </b>$<?= $product['Price'] ?></div>
									<hr>
									<div class="col-md-6">
										<form role="form">
											<div class="form-group">
												<label>Quantity : </label>
												</br>
												<select class="form-control">
													<?php
													for($i = 1 ; $i <= 10 ; $i++)
													{
								?>			
														<option value="<?= $i ?>"><?= $i ?></option>
								<?php 				}
													?>
												</select>
											</div>
											<button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-shopping-cart"></span> ADD TO CART</button>
											</br></br>								
										</form>
										<form method='post' action='wishlist.php'>
											<button name="wishlistadd" value="<?= $_GET['product_id'] ?>" type="submit" class="btn btn-info"><span class="glyphicon glyphicon-gift"></span> ADD TO WISH LIST</button>
										</form>
									</div>
									<div class="col-md-6">
										<label>Share : </label>
										</br>
										<a class="share" href="#"><img src="images/facebook.png"/></a>
										<a class="share" href="#"><img src="images/twitter.png"/></a>
									</div>
								</div>
							</div>
						</div>
					</div>

					</br></br>
					<div class="col-md-12 column productbox">
						<div class="row clearfix">
							<div class="col-md-12 column">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#details" data-toggle="tab">Details</a></li>
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
										<div class="panel panel-default widget">
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
										echo "<li><a href='category.php?category_id=$row[Category_Id]'>$row[Name]</a></li>";
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
			</div>
		</div>
		<?php include 'footer.php';?>
	</body>
</html>