<?php
	include 'databaseconnect.php';

	//If the user is not an admin, they shouldnt be on this page
	if(!isset($_SESSION["UserType"]) || $_SESSION["UserType"] != "Admin")
	{
		header("Location: index.php");
		die();
	}
	

	//check if there are any  categories
	$STH = $DBH->query("SELECT Count(*) as NumCategory FROM Category");
	# setting the fetch mode
	$STH->setFetchMode(PDO::FETCH_ASSOC);
	$row = $STH->fetch();
	
	//If there are no categories, inform the user that they must add a category before they can add products
	if($row['NumCategory'] == "0")
	{
		header("Location: inventory.php?nocat");
	}

	//the timezone for inserting timesttamps
	date_default_timezone_set('America/Montreal');


	//add a product
	if(isset($_POST['add']))
	{
		//All product information
		$product = array(
			'name' 			=>  @$_POST['name'],
			'description'	=>  nl2br(@$_POST['description']),
			'details' 		=>  nl2br(@$_POST['details']),
			'date_added' 	=>  date('Y-m-d h:i:s a', time()),
			'featured' 		=>  isset($_POST['featured']) ? 1 : 0,
			'category' 		=>  @$_POST['category'],
			'price' 		=>  @$_POST['price']
		);

		
		$STH = $DBH->prepare(
			"INSERT INTO Product (Name, Description, Details, Date_Added, Featured, Category_Id, Price)
			 VALUES (:name, :description, :details, :date_added, :featured, :category, :price)");
		$STH->execute($product);

		//get the id of the product that was just inserted
		$product_id = $DBH->lastInsertId();

		$STH = $DBH->prepare(
			"INSERT INTO Inventory(Product_Id, Quantity)
			 VALUES(?,?)");
		$STH->bindParam(1,  $product_id);
		$STH->bindParam(2,  $_POST['quantity']);
		$STH->execute();

		
		foreach($_FILES['addimage']['name'] as $name) 
		{
        	$input = "addimage";
			require_once 'imageupload.php';
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
				<div class="col-md-12">
					<a href="inventory.php" class="btn btn-info"><u>Back</u></a>
					</br>
					</br>
					<div class="panel panel-info " >
						<div class="panel-heading">
							<div class="panel-title">Add Product</div>
						</div>
						<div style="padding-top:30px" class="panel-body" >
							<form enctype="multipart/form-data" class="form-horizontal" role="form" method="POST" data-toggle="validator">
								<div class="col-md-6">
									<div class="form-group">
										<label for="name" class="col-md-2 control-label">Name</label>
										<div class="col-md-8">
											<input type="text" class="form-control" name="name" placeholder="Name" required>
										</div>
									</div>
									<div class="form-group">
										<label for="description" class="col-md-2 control-label">Description</label>
										<div class="col-md-8">
											<textarea rows="5" class="form-control" name="description" placeholder="Description" required></textarea>
										</div>
									</div>
									<div class="form-group">
										<label for="details" class="col-md-2 control-label">Details</label>
										<div class="col-md-8">
											<textarea rows="5" class="form-control" name="details" placeholder="Details" required></textarea>
										</div>
									</div>
									<div class="form-group">
										<label for="featured" class="col-md-2 control-label">Featured?</label>
										<div class="checkbox col-md-8" style="position: relative; left: 20px;">
											<input type="checkbox" name="featured" value="">
										</div>
									</div>
									<div class="form-group">
										<label for="category" class="col-md-2 control-label">Category</label>
										<div class="col-md-8">
											<select class="form-control" id="sel1" name="category">
											<?php
												//Show all categories in a combo box
												$STH = $DBH->query("SELECT Category_Id, Name FROM Category");
												
												while($row = $STH->fetch())
												{
													echo "<option value='$row[Category_Id]'>$row[Name]</option>";
												}
												?>
											</select>
										</div>
									</div>

									<div class="form-group">
										<label for="price" class="col-md-2 control-label">Price</label>
										<div class="col-md-8">
											<input type="text" class="form-control" name="price" placeholder="Price" required>
										</div>
									</div>

									<div class="form-group">
										<label for="quantity" class="col-md-2 control-label">Quantity</label>
										<div class="col-md-8">
											<input type="text" class="form-control" name="quantity" placeholder="Quantity" value="0" required>
										</div>
									</div>

									<div class="form-group">
										<label for="name" class="col-md-2 control-label"></label>
										<div class="col-md-8">
											<input type="submit" class="btn btn-success btn-block" name="add" value="Add">
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<?php
										//inputs for uploading and previewing images (Up to 5)
										for($i = 1 ; $i <= 5 ; $i++)
										{
									?>          
											<div class="form-group">
												<label for="image1" class="col-md-2 control-label">Image <?= $i ?></label>
												<div class="col-md-5">
													<input imagenum="<?= $i ?>"  type="file" class="image form-control" id="image<?= $i ?>" name="addimage[]">
												</div>
												<div class="col-md-5">
													<div class="panel-group" >
														<div class="panel panel-default">
															<div class="panel-heading">
																<h4 class="panel-title">
																	<a data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $i ?>">Image preview</a>
																</h4>
															</div>
															<div id="collapse<?= $i ?>" class="panel-collapse collapse">
																<div class="panel-body">
																	<img id="imagedisplay<?= $i ?>" src="#" alt="your image" />
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
								<?php       
										}
								?>
								<script type="text/javascript">
									function readURL(input) {
									    if (input.files && input.files[0]) {
									
									        var reader = new FileReader();
									        var inputNum = input.getAttribute("imagenum");
									        
									        reader.onload = function (e) {
									            $('#imagedisplay' + inputNum).attr('src', e.target.result);
									        }
									        reader.readAsDataURL(input.files[0]);
									    }
									}
									
									$(".image").change(function(){
									    readURL(this);
									});
								</script>
						</div>
						<?php
							//display a message if the product was added successfully or not
							if(isset($_GET["addsuccess"]))
							{
						?>
							<div id="alertdiv" class="alert alert-success fade in">
								<a class="close" data-dismiss="alert">×</a> 
								<strong><span>Add Product Success</span></strong>											
							</div>
					<?php                           		
							}
							if(isset($_GET["addfailed"]))
							{
						?>								
							<div id="alertdiv" class="alert alert-danger fade in">
								<a class="close" data-dismiss="alert">×</a> 
								<strong><span>Add Product Failed.</span></strong>											
							</div>
						<?php						}								
							?>        
						</form> 
					</div>
				</div>
			</div>
		</div>
		<?php include 'footer.php';?>
	</body>
</html>