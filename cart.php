<?php
	require_once 'databaseconnect.php';
	if(!isset($_COOKIE['AnonUser']))
	{
		setcookie("AnonUser", uniqid());
	}

	$user_type = isset($_SESSION['UserSession']) ? "User_Id" : "Anon_Id";
	$user_id = isset($_SESSION['UserSession']) ? $_SESSION['UserSession'] : $_COOKIE['AnonUser'];

	//delete from the users cart
	if(isset($_POST['delete']))
	{
		$product_id = $_POST['delete'];
		$STH = $DBH->prepare(
			"DELETE FROM Cart 
			  WHERE Product_Id=? AND $user_type=?");

		$STH->bindParam(1, $product_id);
		$STH->bindParam(2, $user_id);
		$STH->execute();
	}

	//add a product to the users cart
	if(isset($_POST['addcart']))
	{
		try
		{
			$product_id = $_POST['addcart'];
			$STH = $DBH->prepare(
				"INSERT INTO Cart ($user_type, Product_Id, Quantity)
				 VALUES (?,?,?)"
			);

			$STH->bindParam(1, $user_id);
			$STH->bindParam(2, $product_id);
			$STH->bindParam(3, isset($_POST["quantity"]) ? $_POST["quantity"] : 1);
			$STH->execute();
		}
		catch (PDOException $e)
		{
			echo $e->getMessage();
		}
	}

	//modify quantity of a cart item
	if(isset($_POST['quantity']) && isset($_POST['product_id']))
	{
		$product_id = $_POST['product_id'];
		$quantity = $_POST['quantity'];
		$STH = $DBH->prepare(
			"UPDATE Cart SET Quantity=?
			 WHERE Product_Id=? AND $user_type=?");

		$STH->bindParam(1, $quantity);
		$STH->bindParam(2, $product_id);
		$STH->bindParam(3, $user_id);
		$STH->execute();
	}


	$products = [];

	$STH = $DBH->query(
		"SELECT Product.Product_Id AS product_id, Product.Name AS product_name, Price, Image_Url, Quantity, Price * Quantity as total_cost
		   FROM Cart 
		  INNER JOIN Product  ON Cart.Product_Id = Product.Product_Id  
		  INNER JOIN Product_Image  ON Product.Product_Id = Product_Image.Product_Id  
		  WHERE Cart.$user_type = '$user_id'
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
			function validate(form)
			{
				return confirm('Are you certain?');
			}
		</script>
		<style>
			.panel
			{
				text-align: center;
			}
		</style>
	</head>
	<body>
		<div class="wrap">
		<?php include 'header.php';?>
		<div class="main">
			<br/>
			<div class="col-md-12">
				<br/>
				<br/>
				<div class="panel panel-info " >
					<div class="panel-heading">
						<div class="panel-title">Cart</div>
					</div>
					<div style="padding-top:30px" class="panel-body" >
						<div class="col-md-9">
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
											<span class="col-md-2 vcenter"><b>$<?= $products[$i]['Price'] ?></b></span>
											
											
									        <span class="col-md-2 vcenter">
									        	<b>Quantity:</b>
									        	<input type="hidden" name="product_id" value="<?= $products[$i]['product_id'] ?>">
									        	<input type="number" name="quantity" class="form-control input-number vcenter" value="<?= $products[$i]['Quantity'] ?>" min="1" onblur="this.form.submit();">
									        </span>
									            
									            
											<button type="submit" name="delete" value="<?= $products[$i]['product_id'] ?>" class="col-md-2 btn vcenter" style="background-color: rgba(0, 0, 0, 0.0);">												
												<span style="font-size: 1.8em;" class="glyphicon glyphicon-trash"></span>	
											</button>
										</form>
									</div>
								</div>
					<?php	}
							?>
						</div>

						<div class="col-md-3">
							<div class="panel panel-default" >
								<div class="panel-body">
									<div><h3><b>Subtotal:</b></h3></div>
									<div><h3 class="text-success"><b>$<?= $subtotal ?></b></h3></div>
									<br/>
									<a href="checkout.php" class="btn btn-info">Checkout</a>
								</div>
							</div>
						</div>	
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