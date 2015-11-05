<?php
	include 'databaseconnect.php';
	if(!isset($_SESSION["UserType"]) || $_SESSION["UserType"] != "Admin")
	{
		header("Location: inventory.php");
		die();
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<?php include 'scripts.php' ?>
	</head>
	<body>
		<div class="wrap">
			<?php include 'header.php'; ?>
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
				</br>
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