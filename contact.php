<?PHP
    require_once 'databaseconnect.php';

    date_default_timezone_set('America/Montreal');
    $timestamp = date('Y-m-d h:i:s a', time());
    if(isset($_POST["submitMessage"]))
    {
         $contactdata = array(	@$_POST["contact_name"],
                            @$_POST["email"],
                            @$_POST["subject"],
                            @$_POST["message"], 
                            $timestamp);

        $valid = true;

        for($i = 0 ; $i < count($contactdata) ; $i++)
        {
            if(!isset($contactdata[$i]))
            {
                $valid = false;
            }
        }



        if($valid)
        {
            $STH = $DBH->prepare(
                "INSERT INTO contact_message (contact_name, email, subject, message, time_posted) 
                 VALUES (?, ?, ?, ?, ?)");

            $STH->bindParam(1, $_POST["contact_name"]);
            $STH->bindParam(2, $_POST["email"]);
            $STH->bindParam(3, $_POST["subject"]);
            $STH->bindParam(4, $_POST["message"]);
            $STH->bindParam(5, $_POST["time_posted"]);
            $STH->execute();
        }
    }
  
    
?>

<!DOCTYPE HTML>
<html>

<head>
    <?php include 'scripts.php' ?>

    <style type="text/css">
        .company_address {
            font-size: 120%;
        }
        label[for=date]{
            color: black;
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
                                        <span><label for="time_posted">Date: <?PHP echo $timestamp ?></label></span>
                                    </div>
                                    <div>
                                        <span><label>Name (First, Last)</label></span>
                                        <span><input name="contact_name" type="text" class="textbox" ></span>
                                    </div>
                                    <div>
                                        <span><label>E-mail</label></span>
                                        <span><input name="email" type="text" class="textbox"></span>
                                    </div>
                                    <div>
                                        <span><label>Subject</label></span>
                                        <span><input name="subject" type="text" class="textbox" ></span>
                                    </div>
                                    <div>
                                        <span><label>Message:</label></span>
                                        <span><textarea name="message"> </textarea></span>
                                    </div>
                                    <div>
                                        <span><input type="submit" value="Submit"  class="myButton" name="submitMessage"></span>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col span_1_of_3">
                            <div class="contact_info">
                                <h3>Find Us Here</h3>
                                <div class="map">
                                    <!--<iframe width="100%" height="175" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Lighthouse+Point,+FL,+United+States&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Lighthouse+Point,+Broward,+Florida,+United+States&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265&amp;output=embed"></iframe>
							   	    <br>
							   	    <small><a href="https://maps.google.co.in/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Lighthouse+Point,+FL,+United+States&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Lighthouse+Point,+Broward,+Florida,+United+States&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265" style="color:#666;text-align:left;font-size:12px">View Larger Map</a></small>-->
                                    <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" width="100%" height="175" src="https://maps.google.com/maps?hl=en&q=vanier college&ie=UTF8&t=roadmap&z=12&iwloc=B&output=embed">
                                        <div>
                                            <small>
							   	    			<a href="http://embedgooglemaps.com">embedgooglemaps.com</a></small></div>
                                        <div><small><a href="http://premiumlinkgenerator.com/nitroflare-org">nitroflare premium link generator</a>
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
                                <p>Follow on: <span><a href="https://www.facebook.com/futurediamondpc" target="_blank"/>Facebook</span>, <span><a href="https://twitter.com/futurediamondpc" target="_blank"/>Twitter</span>, <span><a href="https://instagram.com/futurediamondpc/" target="_blank"/>Instagram</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <?php include 'footer.php';?>
</body>

</html>