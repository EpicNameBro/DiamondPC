<div class="header">
		<div class="headertop_desc">
			<div class="call">
				 <p><span>Need help?</span> call us <span class="number">1-22-3456789</span></span></p>
			</div>
			<div class="account_desc">
				<ul>
					<li><a href="login.php?register">Register</a></li>
					<li><a href="login.php">Login</a></li>
					<li><a href="#">Delivery</a></li>
					<li><a href="#">Checkout</a></li>
					<li><a href="#">My Account</a></li>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
		<div class="header_top">
			<div class="logo">
				<a href="index.php"><img src="images/logo.png" alt="" /></a>
			</div>
			  <div class="cart">
			  	   <p>Welcome to our Online Store! <span>Cart:</span><div id="dd" class="wrapper-dropdown-2"> 0 item(s) - $0.00
			  	   	<ul class="dropdown">
							<li>you have no items in your Shopping cart</li>
					</ul></div></p>
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
		    	<li><a href="delivery.php">Delivery</a></li>
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
     		<form>
     			<input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}"><input type="submit" value="">
     		</form>
     	</div>
     	<div class="clear"></div>
</div>