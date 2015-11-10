<?php
	require_once 'databaseconnect.php';
	$products = [];
	if(isset($_GET['query']))
	{
		$query = $_GET['query'];
		$STH = $DBH->query(
			"SELECT Product.Product_Id AS product_id, Product.Name AS product_name, Price, Image_Url 
			   FROM Product_Image 
			  INNER JOIN Product  ON Product_Image.Product_Id = Product.Product_Id  
			  INNER JOIN Category ON Product.Category_Id = Category.Category_Id
			  WHERE Product.Name LIKE '%$query%' OR Product.Description LIKE '%$query%'
              GROUP BY Product_Id ORDER BY Date_Added DESC");
		
		

		while($product = $STH->fetch())
		{
			$products[] = array(
				"product_id" => $product['product_id'],
				"product_name" => $product['product_name'],
				"Price" => $product['Price'],
				"Image_Url" => $product['Image_Url']
			);
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
	</head>
	<body>
		<div class="wrap">
			<?php include 'header.php';?>
			<div class="main">
				</br>

				<!-- Results -->
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-body">
							<div class="row">
								<div class="col-md-3">
									<select class="form-control">

									</select>
								</div>
							</div>
							</br>
							<?php
								for($i = 0 ; $i < count($products) ; $i++)
								{
					?>				<div class="col-md-12 panel panel-default">
										<div class="panel-body" style="text-align: center;">
											<form role="form" method="POST" action="cart.php">
												<a href="preview.php?product_id=<?= $products[$i]['product_id'] ?>">
													<img style="height: 125px; width: auto" class="col-md-3 vcenter" src="<?= $products[$i]['Image_Url'] ?>"/>
													<span class="col-md-3 vcenter"><b><h4><?= $products[$i]['product_name'] ?></h4></b></span>
												</a>
												<span class="col-md-3 vcenter"><b>$<?= $products[$i]['Price'] ?></b></span>
												
												<button name="addcart" value="<?= $products[$i]['product_id'] ?>" type="submit" class="addcart btn btn-info"><span class="glyphicon glyphicon-shopping-cart"></span> ADD TO CART</button>
											</form>
										</div>
									</div>
					<?php		}
							?>

						</div>
					</div>
				</div>
				
			</div>
		</div>
		<?php include 'footer.php';?>
	</body>
</html>