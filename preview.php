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
				#mainimage {
					width: auto;
					height: 300px;
				}
				
				.productboxthumb {
					outline: 1px solid grey;
					margin: 10px 0px 10px 0px;
				}
				
				.previewimage {
					cursor: pointer;
				}
				
				.description {
					height: 100%;
				}
				
				.share {
					background-color: black;
					border-radius: 5px;
					margin: 30px 20px 10px 0px;
				}
				
				.share img {
					width: 35px;
					height: 35px;
				}
				
				.producttitle h2 {
					font-size: 1.1em;
					text-align: center;
				}
				
				.price-number p {
					font-size: 1.0em;
					vertical-align: middle;
					text-align: center;
				}
				
				.well {
					background: white;
				}
				
				.details {
					margin-top: 40px;
				}
				
				.related {
					text-align: center;
				}
				
				.comment {
					height: 50px;
				}
                
                .form-delete {
                    width: 150px;
                    float: right;
                }

			</style>
			<script type="text/javascript">
				$(document).ready(function() {
					$(".previewimage").click(function() {
						$("#mainimage").attr("src", $(this).attr("src"));
					});
					$(".previewimage").hover(function() {
						$("#mainimage").attr("src", $(this).attr("src"));
					});

				});
			</script>
               
        <script type="text/javascript">
            function validate(form)
            {
                return confirm('Are you certain?');
            }
        </script>
	</head>

	<body>
		<div class="wrap">
			<?php include 'header.php';?>
				<div class="main">
					<br/>

					<ol class="breadcrumb">
						<li><a href="index.php"><i class="glyphicon glyphicon-home"></i></a></li>
						<li>
							<a href="category.php?category_id=<?= $product['category_id'] ?>">
								<?= $product['category_name'] ?>
							</a>
						</li>
						<li>
							<a href="product.html">
								<?= $product['product_name'] ?>
							</a>
						</li>
					</ol>

					<div class="col-md-10">
						<div class="col-md-12">
							<div class="row">
								<div class="row clearfix">
									<div class="col-md-6 column">
										<div class="row">
											<div class="panel panel-default">
												<div class="panel-body">
													<div class="col-md-3">
														<?php
														for($i = 0 ; $i < count($images) ; $i++)
														{
											?>
															<img style="width: 50px; height: 50px;" src="<?= $images[$i] ?>" class="productboxthumb previewimage img-responsive" alt="Alt Text">
											<?php		}
													?>
													</div>

													<div class="col-md-9">
														<img id="mainimage" src="<?= $images[0] ?>" class="img-responsive" alt="Alt Text">
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="well">
												<b>Description:</b>
												<br/>
												<?= $product['Description'] ?>
													<br>
											</div>
										</div>
									</div>
									<div class="description col-md-6 column">
										<div class="">
											<h1><?= $product['product_name'] ?></h1>
											<hr>

											<div class="rating">
												<h3><b>Rating:</b></h3></div>
											<div class="price">
												<h3 class="text-success"><b>Price: </b>$<?= $product['Price'] ?></h3></div>
											<hr>
											<div class="col-md-6">
												<form role="form" method="POST" action="cart.php">
													<div class="form-group">

														<label>Quantity : </label>
														<br/>.
														<select class="form-control" name="quantity">
															<?php
														for($i = 1 ; $i <= 10 ; $i++)
														{
									?>
																<option value="<?= $i ?>">
																	<?= $i ?>
																</option>
									<?php 				}
														?>
														</select>

													</div>

													<button name="addcart" value="<?= $id ?>" type="submit" class="btn btn-info"><span class="glyphicon glyphicon-shopping-cart"></span> ADD TO CART</button>
													<br/>
													<br/>
												</form>
												<form method='post' action='wishlist.php'>
													<button name="wishlistadd" value="<?= $_GET['product_id'] ?>" type="submit" class="btn btn-info"><span class="glyphicon glyphicon-gift"></span> ADD TO WISH LIST</button>
												</form>
											</div>
											<div class="col-md-6">
												<label>Share : </label>
												<br/>
												<a class="share" href="#"><img src="images/facebook.png" /></a>
												<a class="share" href="#"><img src="images/twitter.png" /></a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<br/>
						<br/>
						<div class="row">
							<div class="row clearfix">
								<div class="col-md-12 details">
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
											<div class="panel panel-default">
												<div class="panel-body">
													<?php

														$userid = "";
                                                        if(isset($_SESSION["UserSession"]))
                                                        {
                                                            $userid = $_SESSION["UserSession"];

                                                            if(isset($_POST["title"]) && isset($_POST["reviewMessage"]) && isset($_POST["review"]))
                                                            {
                                                                $title = $_POST["title"];
                                                                $review = $_POST["review"];
                                                                
                                                                $STH = $DBH->prepare("INSERT INTO product_review (title, review, user_id, product_id) VALUES (?, ?, ?, ?)");

                                                                $STH->bindParam(1, $_POST["title"]);
                                                                $STH->bindParam(2, $_POST["reviewMessage"]);
                                                                $STH->bindParam(3, $userid);
                                                                $STH->bindParam(4, $id);
                                                                $STH->execute();
                                                                
                                                            }

                                                        }
                                                            
                                                        if(isset($_POST["delete"]))
                                                        {
                                                            $STH = $DBH->prepare("DELETE FROM product_review WHERE product_review_id = ? ");
                                                            
                                                            $STH->bindParam(1, $_POST["reviewID"]);
                                                            $STH->execute();
                                                        }

                                                    ?>

														<?php
														if(isset($_SESSION['UserSession']))
														{
														?>
															<form method="post">
																<div class="form-group">
																	<label for="usr">Title:</label>
																	<input name="title" type="text" class="form-control" id="usr">
																</div>
																<div class="form-group">
																	<label for="comment">Review:</label>
																	<textarea name="reviewMessage" class="form-control" rows="5" id="comment"></textarea>
																</div>
																<div class="form-group">
																	<input class="btn btn-info" name="review" type="submit">
																</div>
															</form>
                                                            
												        <?php
														}
													?>
														
													<?php
                                                    

                                                        $STH = $DBH->query("SELECT title, review, username, product_review_id, product_review.user_id FROM product_review INNER JOIN user ON user.user_id = product_review.user_id;");
                                                    
                                                        $i=0;
                                                    
                                                        while($user_review = $STH->fetch())
                                                        {
                                                            
                                                           
                                            ?>              <div class="well">
                                                                <div class="row">
                                                                    <div class="col-md-2" style="border-right: 1px solid #333;">
                                                                        Username: <?= $user_review['username'] ?>
                                                                        <br/>
                                                                        Star Rating
                                                                    </div>

                                                                    <div class="col-md-8">
                                                                        <div><b>Title</b> <?= $user_review['title']?></div>
                                                                        <div><?= $user_review['review']?></div>
																	</div>
																	<div class="col-md-2">
														<?php           if($user_review['user_id'] == $userid)
                                                                        {
                                                                   ?>
                                                                            <form method="POST" onsubmit="return validate(this);" class="form-delete">
																				
                                                                                <input type="hidden" name="reviewID" value="<?= $user_review['product_review_id'] ?>"/>
                                                                                <!--ton type="submit" name="delete" class="btn btn-danger btn-lg btn-block">Delete Review</button>-->
																				<button type="submit" name="delete" class="col-md-2 btn vcenter" style="background-color: rgba(0, 0, 0, 0.0);">												
																					<span style="font-size: 1.8em;" class="glyphicon glyphicon-trash"></span>	
																				</button>
                                                                            </form>
                                                                  <?php           

                                                                      	}
                                                        			?>         
																	</div>
                                                                </div>
                                                            </div>
                                                    
                                            <?php           $i++; 
                                                        }
                                                ?>    
                                                    
													     
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-2 right">

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

						<br/>


						<div class="categories">
							<ul>

								<h3>Related Products</h3>
								<!-- <li><a href='#'>See all</a></li> -->

							</ul>
						</div>
						<div class="panel panel-default">
							<div class="panel-body">
								<?php
										$related_products = [];

										$STH = $DBH->query(
											"SELECT Product_Id, Name, Price 
											   FROM Product
											  WHERE Category_Id=$product[category_id]
											  ORDER BY RAND() DESC LIMIT 4");
										while($row = $STH->fetch())
										{
											$STH_image = $DBH->query(
											"SELECT Image_Url 
											   FROM Product_Image
											  WHERE Product_Id=$row[Product_Id] LIMIT 1");
											$image = $STH_image->fetch()['Image_Url'];
											$related_products[] = array(
												'Product_Id' =>  $row['Product_Id'],
												'Name' =>  $row['Name'],
												'Price' =>  $row['Price'],
												'Image_Url' => $image);
										}
										for($i = 0 ; $i < count($related_products) ; $i++)
										{
									?>
									<div class="well">
										<div class="producttitle">
											<a href="preview.php?product_id=<?= $related_products[$i]['Product_Id'] ?>">
												<img style="width: 212px; height: auto;" src="<?= $related_products[$i]['Image_Url'] ?>" alt="" />
												<h2 class=""><?= $related_products[$i]['Name'] ?></h2>
											</a>
											<div class="price-details">
												<div style="margin-top: 10px">
													<div class="price-number">
														<p><span class="rupees">$<?= $related_products[$i]['Price'] ?></span></p>
													</div>

													<a class="addcart btn btn-info btn-sm" href="preview.php" style="float: right"><span class="glyphicon glyphicon-shopping-cart"></span></a>
												</div>		
												<div class="clear"></div>
											</div>
										</div>
									</div>
									<hr>
									<?php
										}
									?>
							</div>
						</div>

					</div>
				</div>
		</div>
		<?php include 'footer.php';?>
	</body>

	</html>