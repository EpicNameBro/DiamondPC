<?php
	require_once 'databaseconnect.php';
	if(!isset($_SESSION["UserType"]) || $_SESSION["UserType"] != "Admin")
	{
		header("Location: index.php");
		die();
	}

	if(isset($_POST['edit']))
	{
		$STH = $DBH->prepare(
			"UPDATE Product 
			 SET Name=?,Description=?, Details=?, Featured=?, Category_Id=?, Price=?
			 WHERE Product_Id=?");

		$STH->bindParam(1, $_POST['name']);
		$STH->bindParam(2, nl2br($_POST['description']));
		$STH->bindParam(3, nl2br($_POST['details']));
		$STH->bindParam(4, isset($_POST['featured']) ? $n = 1 : $n = 0);
		$STH->bindParam(5, $_POST['category']);
		$STH->bindParam(6, $_POST['price']);
		$STH->bindParam(7, $_POST['product_id']);
		$STH->execute();

		$STH = $DBH->prepare(
			"UPDATE Inventory 
			    SET Quantity=?
			  WHERE Product_Id=?");

		$STH->bindParam(1, $_POST['quantity']);
		$STH->bindParam(2, $_POST['product_id']);
		$STH->execute();
	}
	
	$products = [];
	
	$STH = $DBH->query(
		"SELECT Product.Product_Id AS product_id, Product.Name AS product_name, Description, Details, Featured, Category_Id, Price, Quantity, Image_Url 
		   FROM Inventory 
		  INNER JOIN Product  ON Inventory.Product_Id = Product.Product_Id  
		  INNER JOIN Product_Image  ON Product.Product_Id = Product_Image.Product_Id  
	         GROUP BY Product_Id ORDER BY Date_Added DESC");
	
	
	
	while($product = $STH->fetch())
	{
		$products[] = array(
			"product_id" => $product['product_id'],
			"product_name" => $product['product_name'],
			"Price" => $product['Price'],
			"Quantity" => $product['Quantity'],
			"Image_Url" => $product['Image_Url']
		);
	}
	?>
<!DOCTYPE HTML>
<html>
	<head>
		<?php include 'scripts.php' ?>
	</head>
	<body>
		<div class="wrap">
		<?php include 'header.php';?>
		<div class="main">
			</br>
			<div class="col-md-12">
				<a href="inventory.php" class="btn btn-info"><u>Back</u></a>
				</br>
				</br>
				<div class="panel panel-info " >
					<div class="panel-heading">
						<div class="panel-title">Edit Products</div>
					</div>
					<div style="padding-top:30px" class="panel-body" >
						<?php
							for($i = 0 ; $i < count($products) ; $i++)
							{
							?>								
						<div class="panel panel-default">
							<div class="panel-body">
								<div class="col-md-2">
									<img src="<?= $products[$i]['Image_Url'] ?>"/>
								</div>
								<div class="col-md-2">
									<h3><b><?= $products[$i]['product_name'] ?></b></h3>
								</div>
								<div class="col-md-2">
									<h3><b>$<?= $products[$i]['Price'] ?></b></h3>
								</div>
								<div class="productinfo col-md-2">
									<h3><b>Stock: <?= $products[$i]['Quantity'] ?></b></h3>
								</div>
								<div class="col-md-2">
									<button productid="<?= $products[$i]['product_id'] ?>" type="button" class="edit btn btn-info btn-lg btn-block" data-toggle="modal" data-target="#myModal">Edit</button>
								</div>
								<div class="col-md-2">
									<button type="button" class="btn btn-danger btn-lg btn-block">Delete</button>
								</div>
							</div>
						</div>
					<?php	}
							?>
						<script type="text/javascript">
							$( document ).ready(function() {
							    $(".edit").click(function() {
							    	 $.ajax({url: "geteditproduct.php?product_id=" + $(this).attr('productid'), success: function(result){
							    	 	
								        $("#editproduct").html(result);
								    },});
							    							    	
								});
							});
						</script>
					</div>
				</div>
				<!-- Modal -->
				<div id="myModal" class="modal fade in" style="" role="dialog">
					<div class="modal-dialog modal-lg">
						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Edit</h4>
							</div>
							<div class="modal-body">
								<div id="editproduct">

								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php include 'footer.php';?>
	</body>
</html>