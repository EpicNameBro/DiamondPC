<?php
	require_once 'databaseconnect.php';
	$id = "";
	$categoryname = "";
	$products = [];
	if(isset($_GET['category_id']))
	{
		$id = $DBH->quote($_GET['category_id']);

		$STH = $DBH->query(
			"SELECT Name
			   FROM Category 
			  WHERE Category_Id = $id");

		$STH->setFetchMode(PDO::FETCH_ASSOC);

		$categoryname = $STH->fetch()['Name'];


		$STH = $DBH->query(
			"SELECT Product.Product_Id AS product_id, Product.Name AS product_name, Price, Image_Url 
			   FROM Product_Image 
			  INNER JOIN Product  ON Product_Image.Product_Id = Product.Product_Id  
			  INNER JOIN Category ON Product.Category_Id = Category.Category_Id
			  WHERE Product.Category_Id = $id
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

				<ol class="breadcrumb">
					<li><a href="index.php"><i class="glyphicon glyphicon-home"></i></a></li>
					<li><a href="category.php?category_id=<?= $_GET['category_id'] ?>"><?= $categoryname ?></a></li>
				</ol>

				<!-- Filters -->
				<div class="col-md-2">
					<div class="panel panel-default">
						<div class="panel-body">

						</div>
					</div>
				</div>

				<!-- Results -->
				<div class="col-md-10">
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
					?>				<div class="col-md-3 panel panel-default">
										<div class="panel-body" style="text-align: center;">
											<a href="preview.php?product_id=<?= $products[$i]['product_id'] ?>"><img src="<?= $products[$i]['Image_Url'] ?>"/></a>
											<span ><b><h4><?= $products[$i]['product_name'] ?></h4></b></span>
											<hr>
											<span><b>$<?= $products[$i]['Price'] ?></b></span>
											</br></br>
											<button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-shopping-cart"></span> ADD TO CART</button>
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