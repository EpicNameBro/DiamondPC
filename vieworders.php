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
        
            $STH_user = $DBH->query(
                "SELECT user.User_Id, Username 
                FROM user");
            $i=0;
            
            while($user = $STH_user->fetch())              
            {
                $STH_order = $DBH->query(
                    "SELECT DISTINCT Sale.Sale_Id, Order_Date, Status
                     FROM Sale
                     INNER JOIN Order_Detail ON Sale.Sale_Id=Order_Detail.Sale_Id
                     WHERE User_Id=$user[User_Id]
                     ORDER BY Order_Date DESC");
        ?>
                
                    <div class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#collapse<?= $i ?>">
                                        Username: <?=$user['Username']?>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse<?= $i ?>" class="panel-collapse collapse">
                                <div class="panel-body" style="">
                    <?PHP
                                    $j = 1;
                                    while($order = $STH_order->fetch())
                                    {
                                        
                            ?>
                                        <div class="panel panel-info">
                                            <div class="panel-heading">Order #<?= $j ?></div>
                                            <div class="panel-body">
                            <?php
                                        $j++;
                                        $STH_product = $DBH->query(
                                            "SELECT Order_Detail.Product_Id, Name, Order_Detail.Quantity, Order_Detail.Price, Image_Url
                                             FROM Sale
                                             INNER JOIN Order_Detail ON Sale.Sale_Id=Order_Detail.Sale_Id
                                             INNER JOIN Product ON Order_Detail.Product_Id=Product.Product_Id
                                             INNER JOIN Product_Image ON Product.Product_Id=Product_Image.Product_Id
                                             WHERE Sale.User_Id=$user[User_Id] AND Sale.Sale_Id=$order[Sale_Id]
                                             GROUP BY Order_Detail.Product_Id");
                                            while($product = $STH_product->fetch())
                                            {    

                                        ?>      <div class="row">
                                                    <a href="preview.php?product_id=<?= $product['Product_Id'] ?>">
                                                        <img style="height: auto; width: 125px" class="col-md-3 vcenter" src="<?= $product['Image_Url'] ?>"/>
                                                        <span class="col-md-3 vcenter"><b><h4><?= $product['Name'] ?></h4></b></span>
                                                    </a>
                                                    <span class="col-md-3 vcenter"><b class="text-success">$<?= $product['Price'] ?></b></span>


                                                    <span class="col-md-3 vcenter">
                                                        <b>x<?= $product['Quantity'] ?></b>
                                                    </span>
                                                </div>


                                        <?PHP
                                            }            
                            ?>
                                            </div>    
                                        </div>
                            <?PHP
                                    }
                
        ?>
                                </div>
                            </div>
                        </div>
                    </div>
                
<?PHP
                $i++;
            }
?>              
            
    </div>
    
	<!-- FOOTER BEGIN -->
  <?php include 'footer.php';?>
    <!-- FOOTER END -->
</body>
</html>