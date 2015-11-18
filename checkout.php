<?php
	require_once 'databaseconnect.php';

	//User must be logged in to see this page
	if(!isset($_SESSION["UserSession"]))
	{
		header("Location: index.php");
		die();
	}

	
	$products = [];
	
	$STH = $DBH->query(
		"SELECT Product.Product_Id AS product_id, Product.Name AS product_name, Price, Image_Url, Quantity, Price * Quantity as total_cost
		   FROM Cart 
		  INNER JOIN Product  ON Cart.Product_Id = Product.Product_Id  
		  INNER JOIN Product_Image  ON Product.Product_Id = Product_Image.Product_Id  
		  WHERE Cart.User_Id = $_SESSION[UserSession]
	         GROUP BY Product_Id ORDER BY Date_Added DESC");
	
	
	//get info of all cart products for the user
	while($product = $STH->fetch())
	{
		$products[] = array(
			"product_id" => $product['product_id'],
			"product_name" => $product['product_name'],
			"Price" => $product['Price'],
			"Quantity" => $product['Quantity'],
			"Image_Url" => $product['Image_Url'],
			"total_cost" => $product['total_cost']
		);
	}

	//calculate the subtotal
	$subtotal = 0;
	for($i = 0 ; $i < count($products) ; $i++)
	{
		$subtotal += $products[$i]['total_cost'];
	}

	
	?>
	<!DOCTYPE HTML>
	<html>

	<head>
		<?php include 'scripts.php' ?>
			<script type="text/javascript">
				function validate(form) {
					return confirm('Are you certain?');
				}
			</script>
			<style>
				.panel-title {
					display: inline;
					font-weight: bold;
				}
				
				.checkbox.pull-right {
					margin: 0;
				}
				
				.pl-ziro {
					padding-left: 0px;
				}
			</style>
	</head>

	<body>
		<div class="wrap">
			<?php include 'header.php';?>
				<div class="main">

					<div class="col-md-12" style="margin-top: 20px">

						<div class="row">
							<div class="col-md-4">
								<div class="panel panel-info">
									<div class="panel-heading">
										<h3 class="panel-title">
												Payment Details
											</h3>
									</div>
									<div class="panel-body">
										<form role="form">
											<div class="form-group">
												<div class="form-group">
													<label for="cardtype">Card Type:</label>
													<select default="" class="form-control" id="cardtype" name="cardtype" required>
														<option selected disabled hidden value=''></option>
														<option value="mastercard">MasterCard</option>
														<option value="visa">Visa</option>
													</select>
												</div>
											</div>
											<div class="form-group">
												<label for="cardNumber">
													CARD NUMBER</label>
												<div class="input-group">
													<input type="text" class="form-control" id="cardNumber" placeholder="Valid Card Number" required />
													<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
												</div>
											</div>
											<div class="row">
												<div class="col-xs-7 col-md-7">
													<label for="expityMonth">
														EXPIRY DATE
													</label>
													<div class="form-group">

														<div class="col-xs-6 col-lg-6 pl-ziro">
															<input name="expirymonth" type="text" class="form-control" id="expityMonth" placeholder="MM" required />
														</div>
														<div class="col-xs-6 col-lg-6 pl-ziro">
															<input name="expiryyear" type="text" class="form-control" id="expityYear" placeholder="YY" required />
														</div>
													</div>

												</div>
												<div class="col-xs-5 col-md-5 pull-right">
													<div class="form-group">
														<label for="cvCode">
															CV CODE</label>
														<input type="password" class="form-control" id="cvCode" placeholder="CV" required />
													</div>
												</div>
											</div>
											<ul class="nav nav-pills nav-stacked">
												<li class="active"><a href="#"><span class="badge pull-right">
													<span class="glyphicon glyphicon-usd"></span><?= $subtotal ?></span> Final Payment</a>
												</li>
											</ul>
											<br/>
											<input type="submit" class="btn btn-success btn-lg btn-block" role="button" value="Pay"/>
										</form>
									</div>
								</div>

							</div>

							<div class="col-md-8">
								<div class="panel panel-info ">
									<div class="panel-heading">
										<div class="panel-title">Cart</div>
									</div>
									<div style="padding-top:30px" class="panel-body">
										<div class="col-md-12">
											<?php
									//display all cart items
									for($i = 0 ; $i < count($products) ; $i++)
									{
									?>
												<div class="col-md-12 panel panel-default">
													<div class="panel-body" style="text-align: center;">
														<form method="POST" onsubmit="return validate(this);">
															<a href="preview.php?product_id=<?= $products[$i]['product_id'] ?>">
																<img style="height: auto; width: 125px" class="col-md-3 vcenter" src="<?= $products[$i]['Image_Url'] ?>"/>
																<span class="col-md-3 vcenter"><b><h4><?= $products[$i]['product_name'] ?></h4></b></span>
															</a>
															<span class="col-md-3 vcenter"><b>$<?= $products[$i]['Price'] ?></b></span>


															<span class="col-md-3 vcenter">
																<b>Quantity: <?= $products[$i]['Quantity'] ?></b>
															</span>

														</form>
													</div>
												</div>
												<?php	}
									?>
										</div>


									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
		</div>
		<?php include 'footer.php';?>
	</body>

	</html>