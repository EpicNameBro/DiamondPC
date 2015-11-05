<?php
	require_once 'databaseconnect.php';
?>
<!DOCTYPE HTML>
<head>
	<?php include 'scripts.php' ?>
</head>
<body>
	<div class="wrap">
		<!-- HEADER BEGIN -->
		<?php include 'header.php';?>
		<!-- HEADER END -->
	</div>
	<br />
	<br />
	<div class="wrap">
		<div class="panel panel-info " >
		                    <div class="panel-heading">
		                    <div class="panel-title">My Orders</div>
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
	<!-- FOOTER BEGIN -->
	<?php include 'footer.php';?>
	<!-- FOOTER END -->
</body>
</html>