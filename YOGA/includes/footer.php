
<?php
include('includes/dbconnection.php');
session_start();
error_reporting(0);

 if(isset($_POST['submit']))
  {
  
    $Email_id=$_POST['Email_id'];
    

$sql="insert into tblsubscribe(Email_id)values(:Email_id)";
$query=$dbh->prepare($sql);
$query->bindParam(':Email_id',$Email_id,PDO::PARAM_STR);

 $query->execute();

   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
   echo "<script>alert('You successfully subscribe !.');</script>";
 echo "<script>window.location.href ='index.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}
?>
<style>
    /* footer start */
    
    .footer-top {
        background: #222222 none repeat scroll 0 0;
        color: #9d9d9d;
        padding: 20px 0;
    }
    
    .footer-top h6 {
        color: #ffffff;
        font-size: 15px;
        text-transform: uppercase;
        margin-bottom: 40px;
    }
    
    .footer-top ul {
        overflow: hidden;
        padding: 0;
    }
    
    .footer-top ul li {
        font-size: 14px;
        line-height: 23px;
        list-style: outside none none;
        margin-bottom: 16px;
        padding-left: 12px;
        position: relative;
    }
    
    .footer-top ul li a::after {
        content: "";
        font-family: fontawesome;
        left: 0;
        position: absolute;
        vertical-align: middle;
    }
    
    .footer-top ul li a {
        color: #fff;
    }
    
    input.newsletter-input {
        background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 3px;
        font-size: 13px;
        text-align: left;
    }
    
    .subscribed-text {
        color: #606060;
        font-size: 12px;
        line-height: 18px;
        padding-top: 10px;
    }
    
    .footer-bottom {
        background: #191919 none repeat scroll 0 0;
    }
    
    .footer_widget {
        color: #ffffff;
        display: inline-block;
        margin: 6px 0 0 30px;
    }
    
    .footer_widget p {
        display: inline-block;
        vertical-align: middle;
        margin: 0px;
    }
    
    .footer_widget ul {
        display: inline-block;
        padding: 0px;
        vertical-align: middle;
        margin: 0px 0 0 8px;
    }
    
    .footer_widget ul li {
        display: inline-block;
        vertical-align: middle;
        list-style: none;
        margin: 0 auto;
    }
    
    .footer_widget ul li a {
        color: #fff;
        display: block;
        font-size: 18px;
        margin: 0 4px;
    }
    
    .footer_widget ul li a i {
        margin: 0px;
    }
    
    .copy-right {
        color: #ffffff;
        font-size: 15px;
        line-height: 40px;
        margin: 0 auto;
    }
    
    .back-top {
        bottom: 35px;
        position: fixed;
        right: 33px;
        z-index: 1;
    }
    
    .back-top a {
        border-radius: 50%;
        color: #ffffff;
        display: block;
        font-size: 19px;
        height: 40px;
        line-height: 36px;
        text-align: center;
        vertical-align: top;
        width: 40px;
    }
    
    .back-top a:hover,
    .back-top a:focus {
        color: #fff;
    }
    /* footer ends */
</style>
<footer>
    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-md-3">
                    <h6>About Us</h6>
                    <ul>
                        <li onclick='window.location.href="about.php"'>About</li>
                        <li onclick='window.location.href="privacy.php"'>Privacy</li>
                        <li onclick='window.location.href="FAQ.php"'>FAQs</li>
                        <li onclick='window.location.href="packages.php"'>Coming Soon</li>
                        <li onclick='window.location.href="Package/blog.html"'>Blogs</li>
                        
                    </ul>

                </div>
                <style type="text/css" media="screen">
                    .payment {
                        margin: 0px;
                        padding: 0px;
                        list-style-type: none;
                    }
                    
                    .payment li {
                        list-style-type: none;
                    }
                    
                    .payment li a {
                        text-decoration: none;
                        display: inline-block;
                        color: #fff;
                        float: left;
                        font-size: 25px;
                        padding: 10px 10px;
                    }
                </style>
                <div class="col-md-3">
                    <h6>Upcomming Classes &nbsp;<img src="img/new.gif"></h6>
                    <marquee style="height:200px; color:white; font-weight: bold" direction="up" scrolldelay="20">
                        <hr/> 1. Meditation
                        <hr/> 2. GYM
                        <hr/> 3. Dance
                        <hr/> 4. Women's GYM
                        <hr/> 5. Zumba Classes

                    </marquee>
                </div>
                <div class="col-md-3 col-sm-3">
                    <h6>Subscribe News letter</h6>
                    <div class="newsletter-form">
                        <form method="post">
                            <div class="form-group">
                                <input type="email" name="Email_id" class="form-control newsletter-input" required placeholder="Enter Email Address" />
                            </div>
                            <button type="submit" name="submit" class="btn btn-danger btn-lg">Subscribe <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>

                        </form>
                        <p class="subscribed-text">*We send great deals and latest auto news to our subscribed users very week.</p>
                    </div>
                    <ul class="footer_widget">
                        <li><i class="fa fa-google-wallet" aria-hidden="true"> Google Wallet</i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <i class="fa fa-cc-mastercard" aria-hidden="true"> MasterCard</i></li>
                        <li><i class="fa fa-cc-paypal" aria-hidden="true"> Paypal</i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <i class="fa fa-cc-visa" aria-hidden="true"> Visa Card</i></li>
                    </ul>
                </div>
                <div class="col-md-3 co-sm-3"> 
               <div class="row">
                <div class="col-lg-12" style="display: inline-flex;">
                <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FBhagwanMahavirUniversity&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="500" height="300" style="border:none;overflow:hidden" scrolling="yes" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                </div>
               </div>
                    
                </div>
                
            </div>
        </div>
    </div>
</footer>
<!--- /copy-right ---->