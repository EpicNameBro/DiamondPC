<?php
	require_once 'databaseconnect.php';

?>
<!DOCTYPE HTML>
<head>
	<?php include 'scripts.php' ?>
    
    <script type="text/javascript">
        $(document).ready(function() {
            $(".posts").accordion({ 
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
            background: #2eadd3!important;
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
        <?PHP 
            $STH = $DBH->query(
            "SELECT contact_name, email, subject, message, time_posted, viewed FROM contact_message ORDER BY time_posted DESC");
            $i=0;
            while($contact_user = $STH->fetch())
            {
?>                <div class="bs-example">
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $i ?>">
                                        Subject: <?= $contact_user['subject']?> <br />
                                        By <b><?= $contact_user['contact_name']?></b>
                                        On <b>Date: <?= $contact_user['time_posted'] ?> </b>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse<?= $i ?>" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <b>Sent from: <?=$contact_user['email']?></b>
                                    <br />
                                    <div class="well"><?= $contact_user['message'] ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<?PHP       $i++;
            }
?>              
            
    </div>
    
	<!-- FOOTER BEGIN -->
  <?php include 'footer.php';?>
    <!-- FOOTER END -->
</body>
</html>