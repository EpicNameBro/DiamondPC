<!DOCTYPE HTML>
<html>
<head>
	<?php include 'scripts.php' ?>

	<style type="text/css">
		.company_address{
			font-size: 120%;
		}
	</style>
</head>
<body>
  <div class="wrap">
 <?php include 'header.php';?>
 <div class="main">
    <div class="content">
    	<div class="section group">
				<div class="col span_2_of_3">
				  <div class="contact-form">
				  	<h2>Contact Us</h2>
					    <form method="post" action="contact.php">
					    	<div>
						    	<span><label>Name (First, Last)</label></span>
						    	<span><input name="userName" type="text" class="textbox" ></span>
						    </div>
						    <div>
						    	<span><label>E-mail</label></span>
						    	<span><input name="userEmail" type="text" class="textbox"></span>
						    </div>
						    <div>
						     	<span><label>Company Name</label></span>
						    	<span><input name="userCompany" type="text" class="textbox"></span>
						    </div>
						    <div>
						    	<span><label>Subject</label></span>
						    	<span><textarea name="userMsg"> </textarea></span>
						    </div>
						   <div>
						   		<span><input type="submit" value="Submit"  class="myButton"></span>
						  </div>
					    </form>

					    <?php
					    	if(isset($_POST["userName"]) && isset($_POST["userEmail"]) && isset($_POST["userMsg"]) || isset($_POST["userCompany"]))
					    	{
					    		//$userName = $_POST["userName"];
					    		$userEmail = $_POST["userEmail"];
					    		$companyName = $_POST["userCompany"];
					    		$userMessage = $_POST["userMsg"];

					    		$to = "futurediamondpc@gmail.com"; // this is your Email address
							    $from = $_POST["userEmail"]; // this is the sender's Email address
							    $userName = $_POST["userName"];
							    $subject = "Form submission";
							    $subject2 = "Copy of your form submission";
							    $message = $userName . " wrote the following:" . "\n\n" . $_POST["userMsg"];
							    $message2 = "Here is a copy of your message " . $userName . "\n\n" . $_POST["userMsg"];

							    $headers = "From:" . $from;
							    $headers2 = "From:" . $to;
							    mail($to, $subject, $message, $headers);
							    mail($from, $subject2, $message2, $headers2); // sends a copy of the message to the sender
							    echo "Mail Sent. Thank you " . $userName . ", we will contact you shortly.";
							    // You can also use header('Location: thank_you.php'); to redirect to another page.
					    	}
					    ?>
				  </div>
  				</div>
				<div class="col span_1_of_3">
					<div class="contact_info">
    	 				<h3>Find Us Here</h3>
					    	  <div class="map">
							   	    <!--<iframe width="100%" height="175" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Lighthouse+Point,+FL,+United+States&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Lighthouse+Point,+Broward,+Florida,+United+States&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265&amp;output=embed"></iframe>
							   	    <br>
							   	    <small><a href="https://maps.google.co.in/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Lighthouse+Point,+FL,+United+States&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Lighthouse+Point,+Broward,+Florida,+United+States&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265" style="color:#666;text-align:left;font-size:12px">View Larger Map</a></small>-->
							   	    <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0"width="100%" height="175" src="https://maps.google.com/maps?hl=en&q=vanier college&ie=UTF8&t=roadmap&z=12&iwloc=B&output=embed">
							   	    	<div>
							   	    		<small>
							   	    			<a href="http://embedgooglemaps.com">embedgooglemaps.com</a></small></div><div><small><a href="http://premiumlinkgenerator.com/nitroflare-org">nitroflare premium link generator</a>
							   	    		</small>
							   	    	</div>
							   	    </iframe>
							  </div>
      				</div>
      			<div class="company_address">
				     	<h3>Company Information :</h3>
						    	<p>821 Sainte-Croix, Saint Laurent</p>
						   		<p>H4L 3X9, QC</p>
						   		<p>Canada</p>
				   		<p>Phone: 514 965 9925</p>
				 	 	<p>Email: <span>futurediamondpc@gmail.com</span></p>
				   		<p>Follow on: <span>Facebook</span>, <span>Twitter</span>, <span>Instagram</span></p>
				   </div>
				 </div>
			  </div>		
         </div> 
    </div>
 </div>
 <?php include 'footer.php';?>
</body>
</html>

