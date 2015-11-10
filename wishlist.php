<?php
	require_once 'databaseconnect.php';
	if(!isset($_SESSION["UserSession"]))
	{
		header("Location: index.php");
		die();
	}

	if(isset($_POST['delete']))
	{
		$product_id = $_POST['delete'];
		$STH = $DBH->prepare(
			"DELETE FROM Wish_List 
			  WHERE Product_Id=? AND User_Id=?");

		$STH->bindParam(1, $product_id);
		$STH->bindParam(2, $_SESSION['UserSession']);
		$STH->execute();
	}

	if(isset($_POST['wishlistadd']))
	{
		$product_id = $_POST['wishlistadd'];
		$STH = $DBH->prepare(
			"INSERT INTO Wish_List (User_Id, Product_Id)
			 VALUES (?,?)");

		$STH->bindParam(1, $_SESSION['UserSession']);
		$STH->bindParam(2, $product_id);
		$STH->execute();
	}

	
	$products = [];
	
	$STH = $DBH->query(
		"SELECT Product.Product_Id AS product_id, Product.Name AS product_name, Price, Image_Url 
		   FROM Wish_List 
		  INNER JOIN Product  ON Wish_List.Product_Id = Product.Product_Id  
		  INNER JOIN Product_Image  ON Product.Product_Id = Product_Image.Product_Id  
		  WHERE Wish_List.User_Id = $_SESSION[UserSession]
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
			</br>
			<div class="col-md-12">
				</br>
				</br>
				<div class="panel panel-info " >
					<div class="panel-heading">
						<div class="panel-title">Wish List</div>
					</div>
					<div style="padding-top:30px" class="panel-body" >
						<?php
							for($i = 0 ; $i < count($products) ; $i++)
							{
							?>
								<div class="col-md-12 panel panel-default">
									<div class="panel-body" style="text-align: center;">
										<a href="preview.php?product_id=<?= $products[$i]['product_id'] ?>">
											<img style="height: 125px; width: auto" class="col-md-3 vcenter" src="<?= $products[$i]['Image_Url'] ?>"/>
											<span class="col-md-3 vcenter"><b><h4><?= $products[$i]['product_name'] ?></h4></b></span>
										</a>
										<span class="col-md-3 vcenter"><b>$<?= $products[$i]['Price'] ?></b></span>
										<form method="POST" onsubmit="return validate(this);" class="col-md-3 vcenter" style="display: inline-block">
												<button type="submit" name="delete" value="<?= $products[$i]['product_id'] ?>" class="btn btn-danger btn-lg btn-block" >Delete</button>
										</form>
									</div>
								</div>

								<!--<div class="panel panel-default">
									<div class="panel-body">
										<a href="preview.php?product_id=<?= $products[$i]['product_id'] ?>">
											
												<img class="col-md-3 vcenter" style="height: 125px" src="<?= $products[$i]['Image_Url'] ?>"/>
											
											
												<h3 class="col-md-3 vcenter"><b><?= $products[$i]['product_name'] ?></b></h3>
											
										</a>
										
											<h3 class="col-md-3 vcenter"><b>$<?= $products[$i]['Price'] ?></b></h3>
										
											
											<form method="POST" onsubmit="return validate(this);" class="">
												<button type="submit" name="delete" value="<?= $products[$i]['product_id'] ?>" class="col-md-3 btn btn-danger btn-lg btn-block vcenter" >Delete</button>
											</form>
										
									</div>
								</div>-->
							
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