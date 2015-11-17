<?php
	require_once 'databaseconnect.php';

    //User must be logged in to see this page
    if(!isset($_SESSION["UserSession"]))
    {
        header("Location: index.php");
        die();
    }

    if(isset($_SESSION["UserSession"]))
    {
        $id = $DBH->quote($_SESSION["UserSession"]);
        

        if(isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["email"]) && isset($_POST["birthdate"]) &&
           isset($_POST["address"]) && isset($_POST["city"]) && isset($_POST["stateprovince"]) && isset($_POST["country"]) && isset($_POST["postalcodezip"]) &&
           isset($_POST["phonenumber"]) && isset($_POST["submit"]))
        {
            //$username = $_POST["username"];
            $firstname = $_POST["firstname"];
            $lastname = $_POST["lastname"];
            $email = $_POST["email"];
            $birthdate = $_POST["birthdate"];
            $address = $_POST["address"];
            $city = $_POST["city"];
            $stateprovince = $_POST["stateprovince"];
            $country = $_POST["country"];
            $postalcodezip = $_POST["postalcodezip"];
            $phonenumber = $_POST["phonenumber"];

            $STH = $DBH->prepare("UPDATE user_info SET First_Name = ?, Last_Name = ?, Email = ?, Birthdate = ?, Address = ?, City = ?, State_Province = ?, Country = ?, Postal_Code_Zip = ?, Phone_Number = ? 
                                  WHERE user_info.user_id = $id");

            $STH->bindParam(1, $firstname);
            $STH->bindParam(2, $lastname);
            $STH->bindParam(3, $email);
            $STH->bindParam(4, $birthdate);
            $STH->bindParam(5, $address);
            $STH->bindParam(6, $city);
            $STH->bindParam(7, $stateprovince);
            $STH->bindParam(8, $country);
            $STH->bindParam(9, $postalcodezip);
            $STH->bindParam(10, $phonenumber);
            $STH->execute();

        }

        $STH = $DBH->query(
                "SELECT Username, First_Name, Last_Name, Email, Birthdate, Address, City, State_Province, Country, Postal_Code_Zip, Phone_Number 
                 FROM User_Info INNER JOIN User ON user.user_id = user_info.user_id WHERE user.user_id = $id");


        $user = $STH->fetch();
       
        if(isset($_POST["delete"]))
        {
            $STH = $DBH->query("DELETE FROM User_Info WHERE user_info.user_id = $id");
            $STH = $DBH->query("DELETE FROM User WHERE user.user_id = $id");

            header("Location: logout.php");
            die();
        }

        /*$attributes = '';
        if(!isset($_GET["edit"]))
        {
            $attributes ='readonly disabled';
        }
        else
        {

        }*/

        
    }
?>
<!DOCTYPE HTML>
<head>
	<?php include 'scripts.php' ?>
	
	<style type="text/css">
        .form-delete {
            width: 150px;
            float: right;
        }
	</style>

    <script type="text/javascript">
    function enableInputs(){
        var elements = document.getElementsByTagName("input");
        for(i = 0 ; i < elements.length ; i++)
        {
            elements[i].readOnly = false;
            elements[i].disabled = false;
        }
    }
    </script>

    <?php include 'scripts.php' ?>
    <script type="text/javascript">
        function validate(form)
        {
            return confirm('Are you certain?');
        }
    </script>

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
                        <!--<?php
                                //if(isset($_GET["editsuccess"]))
                                {
 ?>                                 <div id="alertdiv" class="alert alert-success fade in">
                                            <a class="close" data-dismiss="alert">×</a> 
                                            <strong><span>Edit Successful!</span></strong>                                            
                                    </div>
 <?php                                  
                                }
                                //if(isset($_GET["editfailed"]))
                                {
    ?>                              <div id="alertdiv" class="alert alert-danger fade in">
                                        <a class="close" data-dismiss="alert">×</a> 
                                        <strong><span>Edit Failed: Please make sure your inputs are correct.</span></strong>                                           
                                    </div>
<?php                           }                               
                            ?>-->        

                            <form id="myinfoform" class="form-horizontal" role="form" action="myaccount.php" method="POST" data-toggle="validator">

                                <div class="form-group">
                                    <label for="username" class="col-md-3 control-label">Username</label>
                                    <div class="col-md-9">
                                        <input value="<?=$user['Username']?>" type="text" class="form-control" name="username" placeholder="Username" data-minlength="6" required readonly disabled>
                                    </div>
                                </div>    

                                <div class="form-group">
                                    <label for="firstname" class="col-md-3 control-label">First Name</label>
                                    <div class="col-md-9">
                                        <input value="<?=$user['First_Name']?>" type="text" class="form-control" name="firstname" placeholder="First Name" required readonly disabled>
                                    </div> 
                                </div>   

                                <div class="form-group">
                                    <label for="lastname" class="col-md-3 control-label">Last Name</label>
                                    <div class="col-md-9">
                                        <input value="<?=$user['Last_Name']?>" type="text" class="form-control" name="lastname" placeholder="Last Name" required readonly disabled>
                                    </div>
                                </div>                               
                                
                                  
                                <div class="form-group">
                                    <label for="email" class="col-md-3 control-label">Email</label>
                                    <div class="col-md-9">
                                        <input value="<?=$user['Email']?>" type="text" class="form-control" name="email" placeholder="Email Address" required readonly disabled>
                                    </div>
                                </div>
                                    
 								<div class="form-group">
                                    <label for="birthdate" class="col-md-3 control-label">Birthdate</label>
                                    <div class="col-md-9">
                                        <input value="<?=$user['Birthdate']?>" type="date" class="form-control" name="birthdate" placeholder="Birthdate" required readonly disabled>
                                    </div>
                                </div> 

                                <div class="form-group">
                                    <label for="address" class="col-md-3 control-label">Address</label>
                                    <div class="col-md-9">
                                        <input value="<?=$user['Address']?>" type="text" class="form-control" name="address" placeholder="Address" required readonly disabled>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="city" class="col-md-3 control-label">City</label>
                                    <div class="col-md-9">
                                        <input value="<?=$user['City']?>" type="text" class="form-control" name="city" placeholder="City" required readonly disabled>
                                    </div>
                                </div> 

                                <div class="form-group">
                                    <label for="stateprovince" class="col-md-3 control-label">State / Province</label>
                                    <div class="col-md-9">
                                        <input value="<?=$user['State_Province']?>" type="text" class="form-control" name="stateprovince" placeholder="State / Province" required readonly disabled>
                                    </div>
                                </div> 

                                <div class="form-group">
                                    <label for="country" class="col-md-3 control-label">Country</label>
                                    <div class="col-md-9">
                                        <input value="<?=$user['Country']?>" type="text" class="form-control" name="country" placeholder="Country" required readonly disabled>
                                    </div>
                                </div>  

                                <div class="form-group">
                                    <label for="postalcodezip" class="col-md-3 control-label">Postal Code / Zip</label>
                                    <div class="col-md-9">
                                        <input value="<?=$user['Postal_Code_Zip']?>" type="text" class="form-control" name="postalcodezip" placeholder="Postal Code / Zip" required readonly disabled>
                                    </div>
                                </div>  

                                <div class="form-group">
                                    <label for="phonenumber" class="col-md-3 control-label">Phone Number</label>
                                    <div class="col-md-9">
                                        <input value="<?=$user['Phone_Number']?>" type="text" class="form-control" name="phonenumber" placeholder="Phone Number" required readonly disabled>
                                    </div>
                                </div> 

                                <div class="form-group">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-3 col-md-9">
                                        <input type="submit" id="btn-login" class="btn btn-info" name="submit" value="Submit"> &nbsp
                                        <a href="javascript:enableInputs()" class="btn btn-info">Edit</a> &nbsp
                                        
                                    </div>
                                </div>
                            </form>
                            <!--<form action="" onsubmit="return validate(this);" method="POST" class="form-delete">
                                <input type="submit" id="btn-delete" class="btn btn-info" name="delete" value="Delete Account">
                            </form>-->
                            <form method="POST" onsubmit="return validate(this);" class="form-delete">
                                <button type="submit" name="delete" class="btn btn-danger btn-lg btn-block" >Delete Account</button>
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