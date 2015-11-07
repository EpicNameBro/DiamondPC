<?php
	require_once 'databaseconnect.php';
	if(!isset($_SESSION["UserType"]) || $_SESSION["UserType"] != "Admin")
	{
		header("Location: index.php");
		die();
	}
	$STH = $DBH->query(
		"SELECT Product.Product_Id AS product_id, Product.Name AS product_name, Description, Details, Featured, Category_Id, Price, Quantity, Image_Url 
		   FROM Inventory 
		  INNER JOIN Product  ON Inventory.Product_Id = Product.Product_Id  
		  INNER JOIN Product_Image  ON Product.Product_Id = Product_Image.Product_Id
		  WHERE Product.Product_Id=$_GET[product_id]  
	      GROUP BY Product_Id ORDER BY Date_Added DESC");
	
	$row = $STH->fetch();

	$product = array(
		"product_id" => $row['product_id'],
		"product_name" => $row['product_name'],
		"Description" => str_replace('<br />','', $row['Description']),
		"Details" => str_replace('<br />','', $row['Details']),
		"Featured" => $row['Featured'],
		"Category_Id" => $row['Category_Id'],
		"Price" => $row['Price'],
		"Quantity" => $row['Quantity'],
		"Image_Url" => $row['Image_Url']
	);
	
?>
<div class="row">
	<form enctype="multipart/form-data" class="form-horizontal" role="form" method="POST" data-toggle="validator">
		<div class="col-md-6">

			<!-- Holds the id of the edit item -->
			<input type="hidden" name="product_id" value="<?= $product['product_id']?>">

			<div class="form-group">
				<label for="name" class="col-md-3 control-label">Name</label>
				<div class="col-md-8">
					<input type="text" class="form-control" name="name" placeholder="Name" value="<?= $product['product_name'] ?>" required>
				</div>
			</div>
			<div class="form-group">
				<label for="description" class="col-md-3 control-label">Description</label>
				<div class="col-md-8">
					<textarea rows="5" class="form-control" name="description" placeholder="Description"  required><?= $product['Description'] ?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label for="details" class="col-md-3 control-label">Details</label>
				<div class="col-md-8">
					<textarea rows="5" class="form-control" name="details" placeholder="Details"  required><?= $product['Details'] ?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label for="featured" class="col-md-3 control-label">Featured?</label>
				<div class="checkbox col-md-8" style="position: relative; left: 20px;">
					<input type="checkbox" name="featured" value="" <?= $product['Featured'] == 1 ? 'checked' : '' ?>>
				</div>
			</div>
			<div class="form-group">
				<label for="category" class="col-md-3 control-label">Category</label>
				<div class="col-md-8">
					<select class="form-control" id="sel1" name="category">
					<?php
						$STH = $DBH->query("SELECT Category_Id, Name FROM Category");
						
						while($row = $STH->fetch())
						{
			?>				<option value="<?= $row['Category_Id'] ?>" <?= $row['Category_Id'] == $product['Category_Id'] ? 'selected' : '' ?>> <?= $row['Name'] ?></option>
			<?php			
						}
							
						?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="price" class="col-md-3 control-label">Price</label>
				<div class="col-md-8">
					<input type="text" class="form-control" name="price" placeholder="Price" value="<?= $product['Price'] ?>" required>
				</div>
			</div>
			<div class="form-group">
				<label for="quantity" class="col-md-3 control-label">Quantity</label>
				<div class="col-md-8">
					<input type="text" class="form-control" name="quantity" placeholder="Quantity" value="<?= $product['Quantity'] ?>" required>
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-md-3 control-label"></label>
				<div class="col-md-8">
					<input type="submit" class="btn btn-success btn-block" name="edit" value="Edit">
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<?php
				for($i = 1 ; $i <= 5 ; $i++)
				{
				?>          
			<div class="form-group">
				<label for="image1" class="col-md-2 control-label">Image <?= $i ?></label>
				<div class="col-md-5">
					<input imagenum="<?= $i ?>"  type="file" class="image form-control" id="image<?= $i ?>" name="image<?= $i ?>">
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
	</form>
</div>