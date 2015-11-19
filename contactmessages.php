<?php
	require_once 'databaseconnect.php';
    
    $STH = $DBH->query(
                "SELECT contact_name, email, message, time_posted, viewed FROM contact_message ORDER BY time_posted");

    $contact_user = $STH->fetch();

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
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">MESSAGE</a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>Date: <?PHP echo $contact_user['time_posted'] ?> </p>
                                <br />
                                <p>Name: <input type="text" value="<?=$contact_user['contact_name']?>" /></p>
                                <br />
                                <p>Email: <input type="text" value="<?=$contact_user['email']?>" /></p>
                                <br />
                                <p>Message: <textarea name="userMessage" > <?PHP echo $contact_user['message'] ?></textarea></p>
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