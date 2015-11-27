<!DOCTYPE HTML>
<html>
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
                background: #2eadd3!important;
            }
            .panel-title{
                color: white;
            }
        </style>
    </head>
    <body>
        <div class="wrap">
            <?php include 'header.php';?>
            <div class="main">
                <div class="content">
                    <div class="section group">
                        <div class="grid_1_of_3 images_1_of_3">
                            <img src="images/delivery-img1.jpg" alt="" />
                            <h3>FAST DELIVERY</h3>
                            <p>We promise the fastest possible delivery for anyone in the area with our team working hard every day.</p>
                        </div>
                        <div class="grid_1_of_3 images_1_of_3">
                            <img src="images/delivery-img2.jpg" alt="" />
                            <h3>ALWAYS POSITIVE</h3>
                            <p>We make sure to always be positive and never let our customers down. We make sure our customers always
                                get the best service possible.
                            </p>
                        </div>
                        <div class="grid_1_of_3 images_1_of_3">
                            <img src="images/delivery-img3.jpg" alt="" />
                            <h3>ON TIME AT YOUR DOOR</h3>
                            <p>Your packet will be delivered on time at your door.</p>
                        </div>
                    </div>
                    <div class="faqs">
                        <h2>Frequently Asked Questions</h2>
                        
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
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">5. How can I contact Customer Support?</a>
                                        </h4>
                                    </div>
                                    <div id="collapseFive" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <p>To contact us go to our <a href="contact.php"> Contact </a> page. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'footer.php';?>
    </body>
</html>