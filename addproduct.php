<?php
	include 'databaseconnect.php';
	if(!isset($_SESSION["UserType"]) || $_SESSION["UserType"] != "Admin")
	{
		header("Location: index.php");
		die();
	}

	$STH = $DBH->query("SELECT Count(*) as NumCategory FROM Category");
	# setting the fetch mode
	$STH->setFetchMode(PDO::FETCH_ASSOC);
	$row = $STH->fetch();

	if($row['NumCategory'] == "0")
	{
		header("Location: inventory.php?nocat");
	}

?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Diamond PC</title>
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
				</br>

			 	<div class="col-md-12">
			 			<a href="inventory.php" class="btn btn-info"><u>Back</u></a>
			 			</br>
			 			</br>
				 		<div class="panel panel-info " >
		                    <div class="panel-heading">
		                        <div class="panel-title">Add Product</div>
		                    </div>     
					 		<div style="padding-top:30px" class="panel-body" >
						 		<form class="form-horizontal" role="form" method="POST" data-toggle="validator">
			                                    
		                            <div class="form-group">
	                                    <label for="name" class="col-md-1 control-label">Name</label>
	                                    <div class="col-md-4">
	                                        <input type="text" class="form-control" name="name" placeholder="Name" required>
	                                    </div>
	                                </div>   

	                                <div class="form-group">
	                                    <label for="description" class="col-md-1 control-label">Description</label>
	                                    <div class="col-md-4">
	                                        <input type="text" class="form-control" name="description" placeholder="Description" required>
	                                    </div>
	                                </div> 

	                                <div class="form-group">
	                                    <label for="details" class="col-md-1 control-label">Details</label>
	                                    <div class="col-md-4">
	                                        <input type="text" class="form-control" name="details" placeholder="Details" required>
	                                    </div>
	                                </div>          
		                        	
		                        	<div class="form-group">
		                        		<label for="featured" class="col-md-1 control-label">Featured?</label>
	                                    <div class="checkbox col-md-4" style="position: relative; left: 20px;">
	                                        <input type="checkbox" name="featured" value="">
	                                    </div>
	                                </div>
	                               

	                                <div class="form-group">
									  	<label for="category" class="col-md-1 control-label">Category</label>
									  	<div class="col-md-4">
										  	<select class="form-control" id="sel1" name="category">
										  		<?php
										  			$STH = $DBH->query("SELECT Category_Id, Name FROM Category");

													while($row = $STH->fetch())
													{
											?>			<option value="<?= $row['Category_Id'] ?>"><?= $row["Name"] ?></option>
											<?php	}
										  		?>
										  	</select>
									  	</div>
									</div>

									<div class="form-group">
	                                    <label for="price" class="col-md-1 control-label">Price</label>
	                                    <div class="col-md-4">
	                                        <input type="text" class="form-control" name="price" placeholder="Price" required>
	                                    </div>
	                                </div>  		
		                            
		                        <?php
		                        	if(isset($_GET["addsuccess"]))
		                        	{
	?>									<div id="alertdiv" class="alert alert-success fade in">
											<a class="close" data-dismiss="alert">×</a> 
											<strong><span>Add Product Success</span></strong>											
										</div>
		<?php                           		
		                        	}
		                        	if(isset($_GET["addfailed"]))
		                        	{
		?>								<div id="alertdiv" class="alert alert-danger fade in">
											<a class="close" data-dismiss="alert">×</a> 
											<strong><span>Add Product Failed.</span></strong>											
										</div>
		<?php						}								
		                        ?>        


		                        	<div class="form-group">
	                                    <label for="name" class="col-md-1 control-label"></label>
	                                    <div class="col-md-4">
	                                        <input type="submit" class="btn btn-success" name="add" value="Add">
	                                    </div>
		                            </div> 
		                              
		                        </form> 
		                    </div>
	                    </div>
                    </div>

			</div>
		</div>
		<?php include 'footer.php';?>
	</body>
</html>