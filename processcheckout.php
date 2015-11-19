<?php
	require_once 'databaseconnect.php';

	//User must be logged in to see this page
	if(!isset($_SESSION["UserSession"]))
	{
		header("Location: index.php");
		die();
	}
	
	if(isset($_POST['cardtype']) && isset($_POST['cardnumber']) && isset($_POST['expirymonth']) && isset($_POST['expiryyear']) && isset($_POST['cv']))
	{
		
		
		$cardtype = $_POST['cardtype'];
		$cardnumber = $_POST['cardnumber'];
		$expirymonth = $_POST['expirymonth'];
		$expiryyear = $_POST['expiryyear'];
		
		
		$STH = $DBH->prepare(
		"INSERT INTO Payment_Method (User_Id, Card_Type, Card_Number) 
		 VALUES (?,?,?)");
		
		$STH->execute(array($_SESSION['UserSession'], $cardtype, $cardnumber));
		
		$payment_method_id = $DBH->lastInsertId();
		
		$STH = $DBH->prepare(
		"INSERT INTO Sale (User_Id, Payment_Method_Id, Status) 
		 VALUES (?,?,?)");
		
		$STH->execute(array($_SESSION['UserSession'], $payment_method_id, 'Processing'));
		
		$sale_id = $DBH->lastInsertId();
		
		$STH = $DBH->query(
		"SELECT Cart.Product_Id, Quantity, Price 
		FROM Cart 
		INNER JOIN Product ON Cart.Product_Id=Product.Product_Id 
		WHERE User_Id=$_SESSION[UserSession]");
		
		date_default_timezone_set('America/Montreal');
		$timestamp = date('Y-m-d h:i:s a', time());
		
		while($row = $STH->fetch())
		{
			$STH_order = $DBH->prepare(
			"INSERT INTO Order_Detail (Sale_Id, Product_Id, Order_Date, Quantity, Price) 
			 VALUES (?,?,?,?,?)");
			
			$STH_order->execute(
				array(
					$sale_id, 
					$row['Product_Id'],
					$timestamp,
					$row['Quantity'],
					$row['Price'])
				);
		}
		
		$STH = $DBH->prepare(
		"DELETE FROM Cart WHERE User_Id=?");
		
		$STH->execute(array($_SESSION['UserSession']));
		
		$success = true;
	}
	else
	{
		$success = false;
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
	</head>

	<body>
		<div class="wrap">
			<?php include 'header.php';?>
				<div class="main">
					
					<div class="jumbotron" style="text-align: center">
						<h1>Transaction <?= $success ? "Successful" : "Failed" ?>!</h1>
					</div>
					
				</div>
		</div>
		<?php include 'footer.php';?>
	</body>

	</html>