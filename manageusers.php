<?php
	include 'databaseconnect.php';
	if(!isset($_SESSION["UserType"]) || $_SESSION["UserType"] != "Admin")
	{
		header("Location: index.php");
		die();
	}
?>
<!DOCTYPE HTML>
	<head>
		<title>Diamond PC</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
		<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
		<script type="text/javascript" src="js/move-top.js"></script>
		<script type="text/javascript" src="js/easing.js"></script>
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

