<?php 
	require_once 'databaseconnect.php';
	if(isset($_SESSION['UserSession']))
	{
		$STH = $DBH->query("SELECT first_name FROM user_info WHERE user_id=" . $_SESSION['UserSession']);
	
		# setting the fetch mode
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		$row = $STH->fetch();
		$name = $row["first_name"];
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
				<li><a href="wishlist.php">Wish List</a></li>
			<?php	}
					else
					{
					?>							
				<li><a href="login.php?register">Register</a></li>
				<li><a href="login.php">Login</a></li>
				<?php					}
					if(isset($_SESSION["UserType"]) && $_SESSION["UserType"] == "Admin")
					{
					?>							
				<li><a href="inventory.php">Inventory</a></li>
				<li><a href="manageusers.php">Manage Users</a></li>
				<?php					}
					?>
				<li><a href="cart.php">Cart</a></li>
				<li><a href="#">Checkout</a></li>
				
				<li><a href="myaccount.php">My Account</a></li>
			</ul>
		</div>
		<div class="clear"></div>
	</div>
	<div class="header_top">
		<div class="logo">
			<a href="index.php" ><img src="images/logo.png" alt="" width="200px"/></a>
		</div>
		<div class="cart" style="position: relative; top: 20px;">
			<p>
			<div id="dd" class="wrapper-dropdown-2">
				<img src="images/cart.png" style="width:40px; position: relative; bottom: 8px;"/>
				<span style="font-size: 30px">0 item(s) - $0.00</span>
				<ul class="dropdown" style="width: 300px;">
					<li>you have no items in your Shopping cart</li>
				</ul>
			</div>
			</p>
		</div>
		<script type="text/javascript">
			function DropDown(el) {
				this.dd = el;
				this.initEvents();
			}
			DropDown.prototype = {
				initEvents : function() {
					var obj = this;
			
					obj.dd.on('click', function(event){
						$(this).toggleClass('active');
						event.stopPropagation();
					});	
				}
			}
			
			$(function() {
			
				var dd = new DropDown( $('#dd') );
			
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
				<li><a href="about.php">About</a></li>
				<li><a href="delivery.php">FAQ</a></li>
				<li><a href="news.php">News</a></li>
				<li><a href="contact.php">Contact</a></li>
				<div class="clear"></div>
			</ul>
			<script type="text/javascript">
				var path = location.pathname.substring(location.pathname.lastIndexOf("/") + 1);
				var list = document.getElementsByClassName("menu")[0].getElementsByTagName("li");
				if(path.indexOf("index.php") >= 0)
					list[0].setAttribute("class", "active");
				else if(path.indexOf("about.php") >= 0)
					list[1].setAttribute("class", "active");
				else if(path.indexOf("delivery.php") >= 0)
					list[2].setAttribute("class", "active");
				else if(path.indexOf("news.php") >= 0)
					list[3].setAttribute("class", "active");
				else if(path.indexOf("contact.php") >= 0)
					list[4].setAttribute("class", "active");
			</script>
		</div>
		<div class="search_box">
			<form method="GET" action="search.php">
				<input type="text" name="query" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
				<input type="submit" value="">
			</form>
		</div>
		<div class="clear"></div>
	</div>
</div>