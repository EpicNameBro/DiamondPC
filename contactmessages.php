<?php
	require_once 'databaseconnect.php';
    
    $STH = $DBH->query(
                "SELECT contact_name, email, message, time_posted, viewed FROM contact_message");

?>
<!DOCTYPE HTML>
<head>
	<?php include 'scripts.php' ?>
    
    <script type="text/javascript">
        $(document).ready(function() {
            $("#posts").accordion({ 
                header: "div.tab", 
                alwaysOpen: false,
                autoheight: false
            });
        });
    </script>

    <scipt type="text/javascript" src="jquery.accordion.js" />

    <style type="text/css">
        .bs-example{
            margin: 20px;
        }
        .panel-body p{
            color: black;
            font-size: 160%;
        }
        .panel-heading{
            background: #333!important;
        }
        .panel-title{
            color: white;
        }
    </style>
	
</head>
<body>
	<div class="wrap">
  	<!-- HEADER BEGIN -->
	<?php include 'header.php';?>
	<!-- HEADER END -->   
            <div class="bs-example">
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">1. What is DIAMONDPC?</a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>For information about the company go to <a href="about.php" target="_blank">DIAMONDPC</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">2. How do I register?</a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>To register please click on "Register" on the top of the page and follow the steps.</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">3. How do I log in?</a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>To log in please click on "Login" on the top of the page and put in your username and password.</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">4. How do I buy on DIAMONDPC?</a>
                            </h4>
                        </div>
                        <div id="collapseFour" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>You don't have to be registered to buy a product. Chose your product and go through the checkout process.</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    
	<!-- FOOTER BEGIN -->
  <?php include 'footer.php';?>
    <!-- FOOTER END -->
</body>
</html>