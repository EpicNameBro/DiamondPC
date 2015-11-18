<?php 
	require_once 'databaseconnect.php';

	//only get some user specific if the user is logged in
	if(isset($_SESSION['UserSession']))
	{
		$STH = $DBH->query("SELECT first_name FROM user_info WHERE user_id=" . $_SESSION['UserSession']);
	
		# setting the fetch mode
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		$row = $STH->fetch();
		$name = $row["first_name"];


	
		$STH = $DBH->query(
			"SELECT Price * Quantity as total_cost, Quantity
			   FROM Cart 
			  INNER JOIN Product  ON Cart.Product_Id = Product.Product_Id   
			  WHERE Cart.User_Id = $_SESSION[UserSession]
		      GROUP BY Product.Product_Id ORDER BY Date_Added DESC");
		
		
		$subtotal = 0;
		$totalquantity = 0;
		while($row = $STH->fetch())
		{
			$subtotal += $row['total_cost'];
			$totalquantity += $row['Quantity'];
		}

	}
?>
	<div class="header">
		<div class="headertop_desc">
			<div class="call">
				<p><span>Need help? Call us:</span> <span class="number">514 965 9925</span></p>
			</div>
			<div class="account_desc">
				<ul>
					<?php
					if(isset($_SESSION['UserSession']))
					{
						echo "<li><a>Welcome $name!</a></li>";
					}
					else
					{
						echo "<li><a>Welcome to our Online Store!</a></li>";
					}
					
					
					if(isset($_SESSION["UserSession"]))
					{
					?>
						<li><a href="logout.php">Logout</a></li>
						<li><a href="myaccount.php">My Account</a></li>
						<li><a href="wishlist.php">Wish List</a></li>
						<?php	}
					else
					{
					?>
							<li><a href="login.php?register">Register</a></li>
							<li><a href="login.php">Login</a></li>								
<?php				}
					if(isset($_SESSION["UserType"]) && $_SESSION["UserType"] == "Admin")
					{
					?>
								<li><a href="inventory.php">Inventory</a></li>
								<li><a href="manageusers.php">Manage Users</a></li>
									
<?php				}
					?>
									<li><a href="cart.php">Cart</a></li>
									<li><a href="#">Checkout</a></li>

									
				</ul>
			</div>
			<div class="clear"></div>
		</div>
		<div class="header_top">
			<div class="logo">
				<a href="index.php"><img src="images/logo.png" alt="" width="200px" /></a>
			</div>
			<div class="cart" style="position: relative; top: 20px;">

				<div id="dd" class="wrapper-dropdown-2">
					<img src="images/cart.png" style="width:40px; position: relative; bottom: 8px;" />
					<span style="font-size: 30px"><?= isset($totalquantity) ? $totalquantity : 0 ?> item(s) - $<?= isset($subtotal) ? $subtotal : 0 ?></span>
					<ul class="dropdown" style="width: 350px; height: 250px; overflow-y: scroll; overflow-x: hidden; border-style: solid">
						<li>
							<a class="btn btn-info btn-block" href="cart.php">View Cart</a>
						</li>
						<li>
							<span><h4><b>Total: <span class="text-success">$<?= isset($subtotal) ? $subtotal : 0 ?></span></b>
							</h4>
							</span>
						</li>
						<?php
						//diplay cart items in dropdown
						if(isset($_SESSION['UserSession']))
						{
							$STH = $DBH->query(
							  "SELECT Product.Product_Id AS product_id, Product.Name AS product_name, Price, Image_Url, Quantity, Price * Quantity as total_cost
							     FROM Cart 
							    INNER JOIN Product  ON Cart.Product_Id = Product.Product_Id  
							    INNER JOIN Product_Image  ON Product.Product_Id = Product_Image.Product_Id  
							    WHERE Cart.User_Id = $_SESSION[UserSession]
						        GROUP BY Product_Id ORDER BY Date_Added DESC");
		
							while($row = $STH->fetch())
							{
	?>
							<li>
								<div class="row">
									<div class="panel panel-default">
										<div class="producttitle panel-body">
											<div class="row">
												<a href="preview.php?product_id=<?= $row['product_id'] ?>">
													<div class="col-md-4">
														<img class="" style="width: 100px; height: 100px;" src="<?= $row['Image_Url'] ?>" alt="" />
													</div>

													<div class="col-md-8">
														<h2 style="font-size: 1.3em"><b><?= $row['product_name'] ?></b></h2>
													</div>
												</a>

											</div>

											<div class="price-details">
												<div class="price-number">
													<p><span class="rupees">$<?= $row['Price'] ?></span></p>
												</div>

												<div class="quantity">
													<h4 style="float: right"><b>Quantity:</b><?= $row['Quantity'] ?></h4>
												</div>
												<div class="clear"></div>
											</div>
										</div>
									</div>
								</div>
							</li>
							<?php					
							}
						}	
					?>

					</ul>
				</div>

			</div>
			<script type="text/javascript">
				function DropDown(el) {
					this.dd = el;
					this.initEvents();
				}
				DropDown.prototype = {
					initEvents: function() {
						var obj = this;

						obj.dd.on('click', function(event) {
							$(this).toggleClass('active');
							event.stopPropagation();
						});
					}
				}

				$(function() {

					var dd = new DropDown($('#dd'));

					$(document).click(function() {
						// all dropdowns
						$('.wrapper-dropdown-2').removeClass('active');
					});

				});
			</script>
			<div class="clear"></div>
		</div>

		<div class="header_bottom">
			<div class="menu">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li class="noselect">
						<div class="dropdown">
							<a style="cursor: pointer" class="dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown">
								Categories
								<span class="caret"></span>	
							</a>
							<ul class="dropdown-menu">
								<?php
									$STH = $DBH->query("SELECT Category_Id, Name FROM Category");
									while($row = $STH->fetch())
									{
								?>
									<li>
										<a href="category.php?category_id=<?= $row['Category_Id'] ?>">
											<?= $row['Name'] ?>
										</a>
									</li>
									<?php
									}
								?>
							</ul>
						</div>
					</li>
					<li><a href="about.php">About</a></li>
					<li><a href="delivery.php">FAQ</a></li>
					<li><a href="news.php">News</a></li>
					<li><a href="contact.php">Contact</a></li>
					<div class="clear"></div>
				</ul>
				<script type="text/javascript">
					/*var path = location.pathname.substring(location.pathname.lastIndexOf("/") + 1);
																				var list = document.getElementsByClassName("menu")[0].getElementsByTagName("li");
																				if (path.indexOf("index.php") >= 0)
																					list[0].setAttribute("class", "active");
																				
																				else if(path.indexOf("category.php") >= 0)
																					list[1].setAttribute("class", "active");
																				
																				else if (path.indexOf("about.php") >= 0)
																					list[2].setAttribute("class", "active");
																				
																				else if (path.indexOf("delivery.php") >= 0)
																					list[3].setAttribute("class", "active");
																				
																				else if (path.indexOf("news.php") >= 0)
																					list[4].setAttribute("class", "active");
																				
																				else if (path.indexOf("contact.php") >= 0)
																					list[5].setAttribute("class", "active");*/
				</script>
			</div>
			<div class="search_box">
				<form method="GET" action="search.php">
					<?php
						if(isset($_GET['category_id']))
						{
							$category_id = $DBH->quote($_GET['category_id']);
							$STH = $DBH->query("SELECT Category_Id, Name FROM Category WHERE Category_Id=$category_id");
							$category = $STH->fetch();
							$category_name = $category['Name'];
							$category_id_no_quote = $category['Category_Id'];
							
					?>
							<input type="hidden" name="category_id" value="<?= $category_id_no_quote ?>">
					<?php
						}
					?>
					
					<input type="text" name="query" value="Search <?= isset($category_name) ? $category_name : '' ?>" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search <?= isset($category_name) ? $category_name : '' ?>';}">
					<input type="submit" value="">
				</form>
			</div>
			<div class="clear"></div>
		</div>