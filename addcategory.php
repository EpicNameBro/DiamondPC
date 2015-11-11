<?php
	require_once 'databaseconnect.php';

	//If user is not an admin, then prevent them from accessing the page
	if(!isset($_SESSION["UserType"]) || $_SESSION["UserType"] != "Admin")
	{
		header("Location: index.php");
		die();
	}
	
	//add a category
	if(isset($_POST['add']))
	{
		if(isset($_POST["name"]))
		{
			$STH = $DBH->prepare("INSERT INTO Category(Name) VALUES('$_POST[name]')");
			$STH->execute();
		}
	}

	//remove a category
	if(isset($_POST['remove']))
	{
		if(isset($_POST["name"]))
		{
			$STH = $DBH->prepare("DELETE FROM Category WHERE Category_Id=?");
			$STH->bindParam(1, $_POST["name"]);
			$STH->execute();
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
				<a href="inventory.php" class="btn btn-info"><u>Back</u></a>
				<div class="row">
					<div class="col-md-6">
						</br>
						<div class="panel panel-info " >
							<div class="panel-heading">
								<div class="panel-title">Add Category</div>
							</div>
							<div style="padding-top:30px" class="panel-body" >
								<form class="form-horizontal" role="form" method="POST" data-toggle="validator">
									<div class="form-group">
										<label for="name" class="col-md-1 control-label">Name</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="name" placeholder="Name" required>
										</div>
									</div>



									<?php
										//Display a message displaying if the category was successfully added or not
										if(isset($_GET["addsuccess"]))
										{
			?>									
											<div id="alertdiv" class="alert alert-success fade in">
												<a class="close" data-dismiss="alert">×</a> 
												<strong><span>Add Category Success</span></strong>											
											</div>
											<?php                           		
												}
												if(isset($_GET["addfailed"]))
												{
												?>								
											<div id="alertdiv" class="alert alert-danger fade in">
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
					<div class="col-md-6">
						</br>
						<div class="panel panel-info " >
							<div class="panel-heading">
								<div class="panel-title">Remove Category</div>
							</div>
							<div style="padding-top:30px" class="panel-body" >
								<form class="form-horizontal" role="form" method="POST" data-toggle="validator">
									<div class="form-group">
										<label for="name" class="col-md-1 control-label">Name</label>
										<div class="col-md-6">
											<select class="form-control" id="sel1" name="name">
											<?php

												//Display all categories in a combo box
												$STH = $DBH->query("SELECT Category_Id, Name FROM Category");
												
												while($row = $STH->fetch())
												{
													echo "<option value='$row[Category_Id]'>$row[Name]</option>";
												}
												?>
											</select>
										</div>
									</div>
									<?php

										//Display a message displaying if the category was successfully removed or not
										if(isset($_GET["removesuccess"]))
										{
										?>									
											<div id="alertdiv" class="alert alert-success fade in">
												<a class="close" data-dismiss="alert">×</a> 
												<strong><span>Remove Category Success</span></strong>											
											</div>
									<?php                           		
										}
										if(isset($_GET["removefailed"]))
										{
										?>								
											<div id="alertdiv" class="alert alert-danger fade in">
												<a class="close" data-dismiss="alert">×</a> 
												<strong><span>Removed Category Failed.</span></strong>											
											</div>
								<?php 	}								
										?>        
									<div class="form-group">
										<label for="name" class="col-md-1 control-label"></label>
										<div class="col-md-4">
											<input type="submit" class="btn btn-success" name="remove" value="Remove">
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php include 'footer.php';?>
	</body>
</html>