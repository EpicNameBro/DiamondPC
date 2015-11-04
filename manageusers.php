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
		<?php include 'scripts.php' ?>
	</head>
	<body>
		<div class="wrap">
			<?php include 'header.php';?>
			<div class="main">
			 	</br>
			 	<div class="categories">
				  	<ul>
				  	<h3>Manage Users</h3>
				      	<li><a href="admingrant.php">Grant / Revoke Admin Priviliges</a></li>
				      	<li><a href="vieworders.php">View User Orders</a></li>
				      	<li><a href="contactmessages.php">View Contact Messages</a></li>
				  	</ul>
				</div>		
			</div>
		</div>    
	 	<?php include 'footer.php';?>
	</body>
</html>

