<?php
	require_once 'databaseconnect.php';

	//User must be logged in to see this page
	if(!isset($_SESSION["UserSession"]))
	{
		header("Location: index.php");
		die();
	}

    if(isset($_POST["delete"]))
    {
        $STH = $DBH->prepare("DELETE FROM sale WHERE sale_id = ?");

        $STH->bindParam(1, $_POST["saleID"]);
        $STH->execute();
    }
	
?>
	<!DOCTYPE HTML>
	<html>

	<head>
		<?php include 'scripts.php' ?>
        
        <style type="text/css">
            
            .form-delete {
                    width: 150px;
                    float: right;
                }
        </style>
	</head>

	<body>
		<div class="wrap">
			<?php include 'header.php';?>
				<div class="main">
					
					  	<div class="well">
							<h1>Orders</h1> 
						</div>
					
					<?php
						
						$STH = $DBH->query(
						"SELECT DISTINCT Sale.Sale_Id, Order_Date, Status
						 FROM Sale
						 INNER JOIN Order_Detail ON Sale.Sale_Id=Order_Detail.Sale_Id
						 WHERE User_Id=$_SESSION[UserSession]
						 ORDER BY Order_Date DESC"
						);
						$i = 0;
					
						while($sale = $STH->fetch())
						{
							$i++;
							$STH_product = $DBH->query(
							"SELECT Order_Detail.Product_Id, Name, Order_Detail.Quantity, Order_Detail.Price, Image_Url
							 FROM Sale
							 INNER JOIN Order_Detail ON Sale.Sale_Id=Order_Detail.Sale_Id
							 INNER JOIN Product ON Order_Detail.Product_Id=Product.Product_Id
							 INNER JOIN Product_Image ON Product.Product_Id=Product_Image.Product_Id
							 WHERE Sale.User_Id=$_SESSION[UserSession] AND Sale.Sale_Id=$sale[Sale_Id]
							 GROUP BY Order_Detail.Product_Id"
							);
							
							$total = 0;
					?>
						<div class="panel panel-info">
							<div class="panel-heading">
								<h3 class="panel-title">Order #<?= $i ?> On <?= $sale['Order_Date'] ?></h3>
							</div>
							<div class="panel-body">
								
				<?php		
							while($order = $STH_product->fetch())
							{
								$total += $order['Price'];
					?>
								<div class="col-md-12 panel panel-default">
									<div class="panel-body" style="text-align: center;">
										<form method="POST" onsubmit="return validate(this);">
											<a href="preview.php?product_id=<?= $order['Product_Id'] ?>">
															<img style="height: auto; width: 125px" class="col-md-3 vcenter" src="<?= $order['Image_Url'] ?>"/>
															<span class="col-md-3 vcenter"><b><h4><?= $order['Name'] ?></h4></b></span>
														</a>
											<span class="col-md-3 vcenter"><b class="text-success">$<?= $order['Price'] ?></b></span>


											<span class="col-md-3 vcenter">
												<b>x<?= $order['Quantity'] ?></b>
											</span>

										</form>
									</div>
								</div>
					<?php	
							}
					?>			<div class="col-md-12">
									
									<span><h3>Total: <b class="text-success">$<?= $total ?></b></h3></span>
									<span><h3>Status: <b class="text-success"><?= $sale['Status'] ?></b></h3></span>
								</div>
                                <form method="POST" onsubmit="return validate(this);" class="form-delete">
                                    <input type="hidden" name="saleID" value="<?= $sale['Sale_Id'] ?>"/>
                                    <button type="submit" name="delete" class="btn btn-danger btn-lg btn-block">Cancel Order</button>
                                </form>
							</div>
						</div>
						<?php
					
							
						}	
					    
						if($i == 0)
						{
					?>
							<h2>No Orders</h2>
					<?php
						}
					?>
				</div>
		</div>
		<?php include 'footer.php';?>
	</body>

	</html>