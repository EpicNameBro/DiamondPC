<?php 
	require_once 'databaseconnect.php';
	if(isset($_SESSION["UserSession"]))
	{
		header("Location: index.php");
		die();
	}

?>
<!DOCTYPE HTML>
<html>
<head>
<?php include 'scripts.php' ?>
</head>
<body>
  <div class="wrap">
  	<!-- HEADER BEGIN -->
	<?php include 'header.php';?>
	<!-- HEADER END -->
		<div class="container">    
		<!-- Display the login if there is no get parameter register -->
        <div id="loginbox" style="display:<?php echo isset($_GET["register"]) ? "none" : "block" ?>;margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Sign In</div>
                        <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form id="loginform" class="form-horizontal" role="form" method="POST" action="userlogin.php">
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="username">                                        
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="login-password" type="password" class="form-control" name="password" placeholder="password"
                                        <?php echo isset($_COOKIE["Remember"]) ? "checked" : "";  ?> >
                                    </div>
                            <?php
                            	if(isset($_GET["success"]))
                            	{
 ?>									<div id="alertdiv" class="alert alert-success fade in">
											<a class="close" data-dismiss="alert">×</a> 
											<strong><span>Registration Successful! Please Login.</span></strong>											
									</div>
 <?php                           		
                            	}
                            	if(isset($_GET["loginfailed"]))
                            	{
	?>								<div id="alertdiv" class="alert alert-danger fade in">
										<a class="close" data-dismiss="alert">×</a> 
										<strong><span>Login Failed: Username or Password is incorrect</span></strong>											
									</div>
<?php							}								
                            ?>        



                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="col-sm-12 controls">
                                      <input type="submit" id="btn-login" class="btn btn-success" name="login" value="Login">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-md-12 control">
                                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                            Don't have an account? 
                                        <a href="login.php?register">
                                            Sign Up Here
                                        </a>
                                        </div>
                                    </div>
                                </div>    
                            </form>     



                        </div>                     
                    </div>  
        </div>
        <!-- Display the register if there is get parameter register -->
        <div id="signupbox" style="display:<?php echo isset($_GET["register"]) ? "block" : "none" ?>; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">Sign Up</div>
                            <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="login.php" >Sign In</a></div>
                        </div>  
                        <div class="panel-body" >
                            <form id="signupform" class="form-horizontal" role="form" action="register.php" method="POST" data-toggle="validator">
                                
                                <div id="signupalert" style="display:none" class="alert alert-danger">
                                    <p>Error:</p>
                                    <span></span>
                                </div>

                                <div class="form-group">
                                    <label for="username" class="col-md-3 control-label">Username</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="username" placeholder="Username" data-minlength="6" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="password" placeholder="Password" data-minlength="6" required>
                                    </div>
                                </div>     

                                <div class="form-group">
                                    <label for="firstname" class="col-md-3 control-label">First Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="firstname" placeholder="First Name" required>
                                    </div>
                                </div>   

                                <div class="form-group">
                                    <label for="lastname" class="col-md-3 control-label">Last Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="lastname" placeholder="Last Name" required>
                                    </div>
                                </div>                               
                                
                                  
                                <div class="form-group">
                                    <label for="email" class="col-md-3 control-label">Email</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="email" placeholder="Email Address" required>
                                    </div>
                                </div>
                                    
 								<div class="form-group">
                                    <label for="birthdate" class="col-md-3 control-label">Birthdate</label>
                                    <div class="col-md-9">
                                        <input type="date" class="form-control" name="birthdate" placeholder="Birthdate" required>
                                    </div>
                                </div> 

                                <div class="form-group">
                                    <label for="address" class="col-md-3 control-label">Address</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="address" placeholder="Address" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="city" class="col-md-3 control-label">City</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="city" placeholder="City" required>
                                    </div>
                                </div> 

                                <div class="form-group">
                                    <label for="stateprovince" class="col-md-3 control-label">State / Province</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="stateprovince" placeholder="State / Province" required>
                                    </div>
                                </div> 

                                <div class="form-group">
                                    <label for="country" class="col-md-3 control-label">Country</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="country" placeholder="Country" required>
                                    </div>
                                </div>  

                                <div class="form-group">
                                    <label for="postalcodezip" class="col-md-3 control-label">Postal Code / Zip</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="postalcodezip" placeholder="Postal Code / Zip" required>
                                    </div>
                                </div>  

                                <div class="form-group">
                                    <label for="phonenumber" class="col-md-3 control-label">Phone Number</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="phonenumber" placeholder="Phone Number" required>
                                    </div>
                                </div> 

                                <?php
                                	if(isset($_GET["registerfailed"]))
                                	{
?>
										<div id="alertdiv" class="alert alert-danger fade in">
											<a class="close" data-dismiss="alert">×</a> 
											<strong><span>Registration failed. Please review your info.</span></strong>											
										</div>
<?php                                		
                                	}
	                            ?>
                                    

                                <div class="form-group">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-3 col-md-9">
                                        <input type="submit" id="btn-login" class="btn btn-info" name="register" value="Sign Up">
                                    </div>
                                </div>
                            </form>
                         </div>
                    </div>                            
         </div> 
    </div>
    
	<!-- FOOTER BEGIN -->
  <?php include 'footer.php';?>
    <!-- FOOTER END -->
</body>
</html>

