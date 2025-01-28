<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ycrsaid']==0)) {
  header('location:logout.php');
  } 

?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>Car Rental Portal |Admin Manage testimonials   </title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>

</head>

<body>

<?php require_once('includes/header.php'); ?>

<?php 
              if(isset($_POST['submit'])){
                $email = $_POST['emailto'];
                $subject = $_POST['subject'];
                $message = $_POST['message'];
                if(!empty($email) && !empty($subject) && !empty($message)){
                  include('phpmailer/PHPMailer.php');
                  include('phpmailer/SMTP.php');
                  include('phpmailer/Exception.php');
                  $mail = new phpmailer;
                  $mail->isSMTP();
                  $mail->SMTPDebug = 0;
                  $mail->SMTPAuth = TRUE;
                  $mail->SMTPSecure = "tls";
                  $mail->Port     = 587;  
                  $mail->Username = "riddhi1309gandhi@gmail.com";
                  $mail->Password = "riddhi1309";
                  $mail->Host     = "smtp.gmail.com";
                  $mail->Mailer   = "smtp";
                  
                  $mail->SetFrom($email, "Car Rental");
                  $mail->AddReplyTo($email, "Car Rental");
                  $mail->ReturnPath=$email;	
                  $mail->AddAddress($email);
                  $mail->Subject = $subject;		
                  $mail->MsgHTML($message);
                  $mail->IsHTML(true);
                  
                  if(!$mail->Send()) {
                    $error_message = 'Problem in Sending Password Recovery Email';
                  } else {
                    $success_message = 'Email is sent to your email account';
                    echo "<script>alert('${success_message}');</script>";
                  }
                                
                    // $setFrom = array('email'=>'riddhi1309gandhi@gmail.com','label'=>'Job Info');
                    // $addAddress = array('email'=>$email,'label'=>$email);
                    // echo "<script> alert('".smtp_mail($setFrom,$addAddress,$subject,$message).");</script>";
                }
              }
            ?>
	<div class="ts-main-content">
		<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">
      
				<div class="row">
					<div class="col-md-12">
            <br/>
						<h2 class="page-title">Send Email</h2>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading"> Email</div>
							<div class="panel-body">

<section class="content-header">
	<div class="content-header-left">
              
              <h3 class="box-title"> <i class="fa fa-envelope"></i>Quick Email</h3>
	</div>
	
</section>


<section class="content">
  <div class="row">
  <div class="col-md-12">
  <div class="box box-info">
            <div class="box-body">
              <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                <div class="form-group">
                  <input type="email" class="form-control" name="emailto" pattern="[a-Z0-9._%+-]+@[a-Z0-9.-]+\.[a-Z]{2,}$" placeholder="Email to:" required>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" placeholder="Subject">
                </div>
                <div>
                  <textarea name="message" class="textarea" placeholder="Message" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
                </div>
                <button class="pull-left btn btn-outline-primary" name="submit" value="send" type="submit"><i class="fa fa-paper-plane-o" aria-hidden="true"></i> &nbsp;&nbsp;&nbsp;Send</button>
      
              </form>
            </div>
          </div>  
</div>
</section>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<!-- Loading Scripts -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap-select.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>
<script src="js/Chart.min.js"></script>
<script src="js/fileinput.js"></script>
<script src="js/chartData.js"></script>
<script src="js/main.js"></script>
</body>
</html>


<?php require_once('footer.php'); ?>