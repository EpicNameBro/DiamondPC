<?php
	include 'databaseconnect.php';
	if(!isset($_SESSION["UserType"]) || $_SESSION["UserType"] != "Admin")
	{
		header("Location: index.php");
		die();
	}

	if(isset($_POST["name"]))
	{
		$STH = $DBH->prepare("INSERT INTO Category(Name) VALUES('$_POST[name]')");
		$STH->execute();
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
		                        <div class="panel-title">Add Category</div>
		                    </div>     
					 		<div style="padding-top:30px" class="panel-body" >
						 		<form class="form-horizontal" role="form" method="POST" data-toggle="validator">
			                                    
		                            <div class="form-group">
	                                    <label for="name" class="col-md-1 control-label">Name</label>
	                                    <div class="col-md-4">
	                                        <input type="text" class="form-control" name="name" placeholder="Name" required>
	                                    </div>
	                                </div>   
		
		                        <?php
		                        	if(isset($_GET["addsuccess"]))
		                        	{
	?>									<div id="alertdiv" class="alert alert-success fade in">
											<a class="close" data-dismiss="alert">×</a> 
											<strong><span>Add Category Success</span></strong>											
										</div>
		<?php                           		
		                        	}
		                        	if(isset($_GET["addfailed"]))
		                        	{
		?>								<div id="alertdiv" class="alert alert-danger fade in">
											<a class="close" data-dismiss="alert">×</a> 
											<strong><span>Add Category Failed.</span></strong>											
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