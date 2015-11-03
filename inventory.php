<?php
	include 'databaseconnect.php';
	if(!isset($_SESSION["UserType"]) || $_SESSION["UserType"] != "Admin")
	{
		header("Location: index.php");
		die();
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>DiamondPC</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
		<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
		<script type="text/javascript" src="js/move-top.js"></script>
		<script type="text/javascript" src="js/easing.js"></script>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<style>
			.menu ul
			{
				margin-bottom: 0px;
			}
			.main
			{
				overflow: hidden;
			}
		</style>
	</head>
	<body>
		<div class="wrap">
			<?php include 'header.php';?>
			<div class="main">
				<?php
					if(isset($_GET['nocat']))
					{
		?>				<div id="alertdiv" class="alert alert-danger fade in">
							<a class="close" data-dismiss="alert">×</a> 
							<strong><span>You must add a category before adding products.</span></strong>											
						</div>
		<?php		}
				?>
			 	<div class="categories">
				  	<ul>
				  		<h3>Inventory</h3>
				  		<li><a href="addcategory.php">Add Category</a></li>
				      	<li><a href="addproduct.php">Add Product</a></li>
				      	<li><a href="editproduct.php">Edit Product</a></li>
				  	</ul>
				</div>		
			</div>
		</div>
		<?php include 'footer.php';?>
	</body>
</html>