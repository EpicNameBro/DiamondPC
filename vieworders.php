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
                FROM user 
                INNER JOIN sale ON sale.user_id = user.user_id
                INNER JOIN order_detail ON order_detail.sale_id = sale.sale_id
                INNER JOIN product ON product.Product_Id = order_detail.Product_Id
                INNER JOIN product_image ON product_image.product_id = product.product_id");
            $i=0;
            
            while($user = $STH_user->fetch())              
            {
                $i=0;
                $STH_order = $DBH->query(
                    "SELECT order_detail.Sale_Id, order_detail.Product_Id, order_detail.Quantity, order_detail.Price, user.User_Id, Username, product.Name 
                    FROM user 
                    INNER JOIN sale ON sale.user_id = user.user_id
                    INNER JOIN order_detail ON order_detail.sale_id = sale.sale_id
                    INNER JOIN product ON product.Product_Id = order_detail.Product_Id
                    INNER JOIN product_image ON product_image.product_id = product.product_id
                    WHERE Sale.User_Id=$user[User_Id]");
        ?>
                <div class="bs-example">
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $i ?>">
                                        Username: <?=$user['Username']?>
                                    </a>
                                </h4>
                            </div>
        <?PHP
                while($order = $STH_order->fetch())
                {
                    $STH_product = $DBH->query(
                        "SELECT order_detail.Product_Id, order_detail.Price, product.Name, Image_Url 
                        FROM user 
                        INNER JOIN sale ON sale.user_id = user.user_id
                        INNER JOIN order_detail ON order_detail.sale_id = sale.sale_id
                        INNER JOIN product ON product.Product_Id = order_detail.Product_Id
                        INNER JOIN product_image ON product_image.product_id = product.product_id");
                ?>
                    <div id="collapse<?= $i ?>" class="panel-collapse collapse">
                                <div class="panel-body">
                <?PHP
                        while($product = $STH_product->fetch())
                        {    
                        
                    ?>      
                            <div class="col-md-12 panel panel-default">
                                <div class="panel-body" style="text-align: center;">
                                    <form method="POST" onsubmit="return validate(this);">
                                        <a href="preview.php?product_id=<?= $product['Product_Id'] ?>">
                                                        <img style="height: auto; width: 125px" class="col-md-3 vcenter" src="<?= $product['Image_Url'] ?>"/>
                                                        <span class="col-md-3 vcenter"><b><h4><?= $product['Name'] ?></h4></b></span>
                                                    </a>
                                        <span class="col-md-3 vcenter"><b class="text-success">$<?= $product['Price'] ?></b></span>


                                        <span class="col-md-3 vcenter">
                                            <b>x<?= $product['Quantity'] ?></b>
                                        </span>

                                    </form>
                                </div>
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