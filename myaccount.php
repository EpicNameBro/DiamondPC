<?php
	require_once 'databaseconnect.php';

    if(isset($_SESSION["UserSession"]))
    {
        $STH = $DBH->prepare("SELECT Username FROM User WHERE 'id' = $_SESSION[UserSession];");
        $STH->bindParam(1, $_POST["username"]);
        $STH->execute();

        $STH = $DBH->prepare(
                "SELECT First_Name, Last_Name, Email, Birthdate, Address, City, State_Province, Country, Postal_Code_Zip, Phone_Number FROM User_Info;");
        $STH->bindParam(2, $_POST["firstname"]);
        $STH->bindParam(3, $_POST["lastname"]);
        $STH->bindParam(4, $_POST["email"]);
        $STH->bindParam(5, $_POST["birthdate"]);
        $STH->bindParam(6, $_POST["address"]);
        $STH->bindParam(7, $_POST["city"]);
        $STH->bindParam(8, $_POST["stateprovince"]);
        $STH->bindParam(9, $_POST["country"]);
        $STH->bindParam(10, $_POST["postalcodezip"]);
        $STH->bindParam(11, $_POST["phonenumber"]);
        $STH->execute();
        //die();
    }
?>
<!DOCTYPE HTML>
<head>
	<?php include 'scripts.php' ?>
	
	<style type="text/css">
		
	</style>
</head>
<body>
	<div class="wrap">
  	<!-- HEADER BEGIN -->
	<?php include 'header.php';?>
	<!-- HEADER END -->
		<div class="container">    

        <div id="myinfo" style="margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">My Info</div>
                            <!--<div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="login.php" >Sign In</a></div>-->
                        </div>  
                        <div class="panel-body" >
                            <form id="myinfoform" class="form-horizontal" role="form" action="register.php" method="POST" data-toggle="validator">

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

                                <div class="form-group">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-3 col-md-9">
                                        <input type="submit" id="btn-login" class="btn btn-info" name="submit" value="Submit"> &nbsp
										<input type="submit" id="btn-edit" class="btn btn-info" name="edit" value="Edit"> &nbsp
                                        <input type="submit" id="btn-delete" class="btn btn-info" name="delete" value="Delete">
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