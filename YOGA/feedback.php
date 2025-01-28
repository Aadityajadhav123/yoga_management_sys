<?php
include('includes/dbconnection.php');
session_start();
error_reporting(0);


 if(isset($_POST['submit']))
  {


 $fname=$_POST['fname'];
 $email=$_POST['email'];
 $remark=$_POST['remark'];

$sql="insert into tblfeedback(FullName,Email,Remark)values(:fname,:email,:remark)";
$query=$dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':remark',$remark,PDO::PARAM_STR);
 $query->execute();

   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
   echo "<script>alert('Your feedback was sent successfully!.');</script>";
echo "<script>window.location.href ='contact.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Yoga Classes Registration System | Feedback Page</title>
	
	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/nice-select.css"/>
	<link rel="stylesheet" href="css/slicknav.min.css"/>

	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="css/style.css"/>

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	
	<!-- Contact Section -->
	<section class="contact-page-section spad overflow-hidden">
		<div class="container">
			<?php
$sql="SELECT * from tblpage where PageType='feedback'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
			<div><h4 style="text-align: center;color: red"><strong><?php  echo htmlentities($row->PageTitle);?></strong></h4></div>
			<br />
			<div class="row">
				<div class="col-lg-3">
					
					<div class="con-info">
						<h3>Visit Our Yoga Classes</h3>
						<ul>
							<li><i class="material-icons">map</i><?php  echo htmlentities($row->PageDescription);?></li>
						</ul>
					</div>
					<div class="con-info">
						<h3>Message Us</h3>
						<ul>
							<li><i class="material-icons">map</i><?php  echo htmlentities($row->MobileNumber);?></li>
							<li><i class="material-icons">map</i><?php  echo htmlentities($row->Email);?></li>
						</ul>
					</div>
					<div class="con-info">
						<h3>Opening Hours</h3>
						<ul>
							<li><i class="material-icons">map</i><?php  echo htmlentities($row->OpenningTime);?></li>
							
						</ul>
					</div>
					
				</div><?php $cnt=$cnt+1;}} ?>
				<div class="col-lg-5">
					<form class="singup-form contact-form" method="post">
						<div class="row">
							<div class="col-md-6">
								<input type="text" placeholder="Full Name"  name="fname" required="true">
							</div>
							
							<div class="col-md-6">
								<input type="email" name="email" required="true" placeholder="Your Email">
							</div>
							
							<div class="col-md-12">
								<textarea placeholder="remark" name="remark" required="true"></textarea>
								 <input type="submit" value="send" name="submit" class="site-btn sb-gradient">
							</div>
						</div>
					</form>
				</div>
				<div class="col-lg-4" >
						<div class="row">
							<div class="col-md-12" style="display: inline-flex; padding: 0;">
								<!-- <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fprofile.php%3Fid%3D100065168934271&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=950785945734306" width="540" height="300" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe> -->
								<iframe width="400" height="345" src="https://www.youtube.com/embed/wBj3KGVAhj4?autoplay=1&mute=1">
								</iframe>
							</div>						
						</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Trainers Section end -->



	
	
	<div class="back-to-top"><img src="img/icons/up-arrow.png" alt=""></div>

	<!--====== Javascripts & Jquery ======-->
	<script src="js/vendor/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/main.js"></script>

	</body>
</html>
