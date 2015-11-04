<?php
	include 'databaseconnect.php';
	if(!isset($_SESSION["UserType"]) || $_SESSION["UserType"] != "Admin")
	{
		header("Location: index.php");
		die();
	}

	if(isset($_POST["grant"]))
	{
		if(isset($_POST["username"]))
		{
			$STH = $DBH->prepare("UPDATE User SET User_Type='Admin' WHERE Username=?");
			//echo $_POST['username'];
			$STH->bindParam(1, $_POST['username']);
			
			$STH->execute();
			$rows_affected = $STH->rowCount();
			//echo $rows_affected;
			if($rows_affected == 1)
				header("Location: admingrant.php?grantsuccess");
			else
				header("Location: admingrant.php?grantfailed");
		}
	}

	if(isset($_POST["revoke"]))
	{
		if(isset($_POST["username"]))
		{
			$STH = $DBH->prepare("UPDATE User SET User_Type='Customer' WHERE Username=?");
			//echo $_POST['username'];
			$STH->bindParam(1, $_POST['username']);
			
			$STH->execute();
			$rows_affected = $STH->rowCount();
			//echo $rows_affected;
			if($rows_affected == 1)
				header("Location: admingrant.php?revokesuccess");
			else
				header("Location: admingrant.php?revokefailed");
		}
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
			 		<div class="col-md-6">
				 		<div class="panel panel-info " >
		                    <div class="panel-heading">
		                        <div class="panel-title">Grant Admin</div>
		                    </div>     
					 		<div style="padding-top:30px" class="panel-body" >
						 		<form id="loginform" class="form-horizontal" role="form" method="POST" a>
			                                    
		                        		<div style="margin-bottom: 25px" class="input-group col-xs-6">
		                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
		                                    <input type="text" class="form-control" name="username" value="" placeholder="username">                                        
		                                </div>
		                            
		                        <?php
		                        	if(isset($_GET["grantsuccess"]))
		                        	{
	?>									<div id="alertdiv" class="alert alert-success fade in">
											<a class="close" data-dismiss="alert">×</a> 
											<strong><span>Grant Success</span></strong>											
										</div>
		<?php                           		
		                        	}
		                        	if(isset($_GET["grantfailed"]))
		                        	{
		?>								<div id="alertdiv" class="alert alert-danger fade in">
											<a class="close" data-dismiss="alert">×</a> 
											<strong><span>Grant Failed. User does not exist or is already an Admin.</span></strong>											
										</div>
		<?php						}								
		                        ?>        



		                            <div style="margin-top:10px" class="form-group">
		                                <!-- Button -->

		                                <div class="col-sm-12 controls">
		                                  <input type="submit" class="btn btn-success" name="grant" value="Grant">
		                                </div>
		                            </div>    
		                        </form> 
		                    </div>
	                    </div>
                    </div>



                    <div class="col-md-6">
	                    <div class="panel panel-info " >
		                    <div class="panel-heading">
		                        <div class="panel-title">Revoke Admin</div>
		                    </div>     
					 		<div style="padding-top:30px" class="panel-body" >
						 		<form id="loginform" class="form-horizontal" role="form" method="POST" a>
			                                    
		                        		<div style="margin-bottom: 25px" class="input-group col-xs-6">
		                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
		                                    <input type="text" class="form-control" name="username" value="" placeholder="username">                                        
		                                </div>
		                            
		                        <?php
		                        	if(isset($_GET["revokesuccess"]))
		                        	{
		?>									<div id="alertdiv" class="alert alert-success fade in">
												<a class="close" data-dismiss="alert">×</a> 
												<strong><span>Revoke Success</span></strong>											
										</div>
		<?php                           		
		                        	}
		                        	if(isset($_GET["revokefailed"]))
		                        	{
		?>								<div id="alertdiv" class="alert alert-danger fade in">
											<a class="close" data-dismiss="alert">×</a> 
											<strong><span>Revoke Failed. User does not exist or is not an Admin..</span></strong>											
										</div>
		<?php							}								
		                        ?>        



		                            <div style="margin-top:10px" class="form-group">
		                                <!-- Button -->

		                                <div class="col-sm-12 controls">
		                                  <input type="submit" class="btn btn-success" name="revoke" value="Revoke">
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

