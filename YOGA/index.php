<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Yoga Classes Registration System | Home Page</title>
	
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/nice-select.css"/>
	<link rel="stylesheet" href="css/magnific-popup.css"/>
	<link rel="stylesheet" href="css/slicknav.min.css"/>
	<link rel="stylesheet" href="css/animate.css"/>

	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="css/style.css"/>
<div class="a2a_kit a2a_kit_size_32 a2a_floating_style a2a_vertical_style" style="left:0px; top:150px;background-color: transparent;">
        <a class="a2a_button_facebook"></a>
        <a class="a2a_button_twitter"></a>
        <a class="a2a_button_google_plus"></a>
        <a class="a2a_button_email"></a>
        <a class="a2a_button_pinterest"></a>
        <a class="a2a_button_linkedin"></a>
        <a class="a2a_button_google_plus_share"></a>
        <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
    </div>

    <script async src="https://static.addtoany.com/menu/page.js"></script>

    	<script type="text/javascript">
		window.$zopim||(function(d,s){var z=$zopim=function(c){
		z._.push(c)},$=z.s=
		d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
		_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute('charset','utf-8');
		$.src='//v2.zopim.com/?3UKrwFWk2yP1r23C7AbNijigBJlWsrTa';z.t=+new Date;$.
		type='text/javascript';e.parentNode.insertBefore($,e)})(document,'script');
		</script>
</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header Section -->
<?php include_once('includes/header.php');?>
	<!-- Header Section end -->
 <div class="" >
      <iframe src="slider.html" height="710" width="100%"></iframe>
  </div>
	<!-- About Section -->
	<section class="about-section spad">
		<div class="container">
			<div class="section-title text-center">
				<img src="img/icons/logo-icon.png" alt="">
				<h2>Welcome to Yoga Classes</h2>
				<p>Yoga is a journey to finding that balance, both on and off the mat. A yoga practice stretches and strengthens our bodies; it teaches us to mindfully move and connect with our breath, which leads us to be mindful and present in our daily tasks. It teaches us the freedom to be still and connects us.!</p>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="about-img">
						<img src="img/about.png" alt="">
					</div>
				</div>
				<div class="col-lg-6">
					<div class="about-item">
						<div class="ai-icon">
							<img src="img/icons/about-1.png" alt="">
						</div>
						<div class="ai-text">
							<h4>Full Rejuvenation</h4>
							<p>Total Rejuvenation Yoga is a discipline that was envisioned as a path to physical, mental and spiritual rejuvenation.</p>
						</div>
					</div>
					<div class="about-item">
						<div class="ai-icon">
							<img src="img/icons/about-2.png" alt="">
						</div>
						<div class="ai-text">
							<h4>Extension of Spring</h4>
							<p>In spring, Ayurvedic practitioners suggest incorporating seasonal kapha-clearing dietary and lifestyle changes to invite lightness and renewal into your life.</p>
						</div>
					</div>
					<div class="about-item">
						<div class="ai-icon">
							<img src="img/icons/about-3.png" alt="">
						</div>
						<div class="ai-text">
							<h4>Against Aging</h4>
							<p>Practicing yoga proves to reverse the natural deterioration of muscles over time, preserving a youthful body.</p>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</section>
	<!-- About Section end -->

	<!-- Classes Section -->
	<section class="classes-section spad" >
		<div class="container">
			<div class="section-title text-center">
				<img src="img/icons/logo-icon.png" alt="">
				<h2>Our Yoga Classes</h2>
				<p>Practice Yoga to perfect physical beauty, take care of your soul and enjoy life more fully!</p>
			</div>
			
			<div class="classes-slider owl-carousel">
<?php
$sql="SELECT * from tblclasses order by rand() limit 3";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
				<div class="classes-item">
					
					<div class="ci-img">
						<img src="admin/images/<?php echo $row->YogaImages;?>" alt="">
					</div>
					<div class="ci-text">
						<h4><a href="classes-details.php?viewid=<?php echo $row->ID;?>"><?php echo $row->TypeofClasses;?></a></h4>
					
							<p>Fees: Rs. <?php echo $row->Fees;?></p>
										<p><?php echo substr($row->Description);?></p>
					</div>
					<div class="ci-bottom">
						<div class="ci-author">
							<img src="admin/images/<?php echo $row->ProfilePics;?>" alt="">
							<div class="author-text">
								<h6><?php echo $row->YogaTrainer;?></h6>
								<p>Duration: <?php echo $row->ClassDuration;?></p>
							</div>
						</div>
						<a href="book-yoga-sesion.php?cid=<?php echo $row->ID;?>" class="site-btn sb-gradient">book now</a>
					</div>
					
				</div>
			<?php $cnt=$cnt+1;}} ?>
			</div>

		</div>
	</section>
	<!-- Classes Section end -->

	<!-- Trainer Section -->
	<section class="trainer-section overflow-hidden spad">
		<div class="container">
			<div class="section-title text-center">
				<img src="img/icons/logo-icon.png" alt="">
				<h2>Our Trainer Yoga</h2>
				<p>Practice Yoga to perfect physical beauty, take care of your soul and enjoy life more fully!</p>
			</div>
			<div class="trainer-slider owl-carousel">
				<?php
$sql="SELECT * from tblclasses order by rand() limit 2";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
				<div class="ts-item">
					<div class="trainer-item">
						<div class="ti-img">
							<img src="admin/images/<?php echo $row->ProfilePics;?>" alt="">
						</div>
						<div class="ti-text">
							<h4><?php echo $row->YogaTrainer;?></h4>
							<h6>Yoga Trainer</h6>
							<p><i class="fa fa-mobile"></i>: <?php echo $row->TrainerContactnumber;?></p>
							<div class="ti-social">
								<a href="#"><i class="fa fa-facebook"></i></a>
								<a href="#"><i class="fa fa-instagram"></i></a>
								<a href="#"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-linkedin"></i></a>
							</div>
						</div>
					</div>
				</div>
			<?php $cnt=$cnt+1;}} ?>
		
			</div>
		</div>
	</section>
	<!-- Trainer Section end -->

	<div class="row">
  <div class="col-md-12" style="display: inline-flex; padding: 0;">
      <iframe src="counter/counter.html" style="background: transparent" frameborder="0" height="351" width="100%"></iframe>
  </div>
</div>
	<div class="row">
  <div class="col-md-12" style="display: inline-flex; padding: 0;">
      <iframe src="addon\videopage.htm" style="background: transparent" frameborder="0" height="600" width="100%"></iframe>
  </div>

</div>

	<div class="row">
  <div class="col-md-12" style="display: inline-flex; padding: 0;">
      <iframe src="addon/prices.html" style="background: transparent" frameborder="0" height="550" width="100%"></iframe>
  </div>
</div>

	<div class="row">
  <div class="col-md-12" style="display: inline-flex; padding: 0;">
      <iframe src="feedback.php" style="background: transparent" frameborder="0" height="550" width="100%" scrolling="no"></iframe>
  </div>
</div>

<div class="row">
  <div class="col-md-12" style="display: inline-flex; padding: 0;">
     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7440.369127255604!2d72.8059230741753!3d21.18482594365584!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04e70a8b209e7%3A0x95f943ff9b175056!2sAthwa%20Gate%2C%20Surat%2C%20Gujarat%20395008!5e0!3m2!1sen!2sin!4v1647005535341!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
  </div>
</div>


	<!-- Footer Section -->
<?php include_once('includes/footer.php');?>
	<!-- Footer Section end -->

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
