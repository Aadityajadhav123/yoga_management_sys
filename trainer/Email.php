<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
use phpmailer\PHPMailer\PHPMailer;
?>
<!DOCTYPE html>
<html>
<head>
 
  <title>Yoga Classes Registration System | Eamil</title>
 
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
<script>
function Getmail() {
  alert("Once confirmed, you will receive an email of confirmation with your booking number");
}
</script>
</head>
<body class="hold-transition sidebar-mini">
  <?php 
              if(isset($_POST['submit'])){
                $email = $_POST['emailto'];
                $subject = $_POST['subject'];
                $message = $_POST['message'];
                if(!empty($email) && !empty($subject) && !empty($message)){
                  include('phpmailer/PHPMailer.php');
                  include('phpmailer/SMTP.php');
                  include('phpmailer/Exception.php');
                  $mail = new PHPMailer;
                  // $mail->IsSMTP();
                  $mail->isSMTP();
                  $mail->SMTPDebug = False;
                  $mail->SMTPAuth = TRUE;
                  // $mail->SMTPSecure = "ssl";
                  $mail->Port     = 465;  
                  $mail->Username = "vikas@iihtsrt.com";
                  $mail->Password = "Times2020$";
                  $mail->Host     = "";
                  // $mail->Mailer   = "smtp";
                  $mail->Host ="mail.iihtsrt.com";
                  $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

                  $mail->SetFrom($email, "Yoga Classess");
                  $mail->AddReplyTo($email, "Yoga Classes");
                  $mail->AddAddress($email);
                  $mail->Subject = $subject;    
                  $mail->MsgHTML($message);
                  $mail->IsHTML(true);
                  
                  if(!$mail->Send()) {
                    $error_message = 'Problem in Sending Password Recovery Email';
                  } else {
                    $success_message = 'Email is sent to your email account';
                    echo "<script>alert('".$success_message."');</script>";
                  }
                                
                    // $setFrom = array('email'=>'riddhi1309gandhi@gmail.com','label'=>'Job Info');
                    // $addAddress = array('email'=>$email,'label'=>$email);
                    // echo "<script> alert('".smtp_mail($setFrom,$addAddress,$subject,$message).");</script>";
                }
              }
            ?>
<div class="wrapper">
  <!-- Navbar -->
 <?php include_once('includes/header.php');?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include_once('includes/sidebar.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Send Email</h1>
            <p><?=$error_message??""?></p>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Email </li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Send Email</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
           
              <form role="form" method="post" enctype="multipart/form-data">

                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="user_name" required="true"  class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Your Email</label>
<input type="email" class="form-control" name="emailto" pattern="[a-Z0-9._%+-]+@[a-Z0-9.-]+\.[a-Z]{2,}$" placeholder="Email to:" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Subject</label>
                  <input type="text" class="form-control" name="subject" placeholder="Subject">
                  </div>
<!--                   <div class="form-group">
                    <label for="exampleInputEmail1">Attachment</label>
                    <input type="file" name="attachment"    class="form-control">
                  </div> -->
                  <div class="form-group">
                    <label for="exampleInputPassword1">Any Message to user before join the clasees</label>
                    <textarea class="form-control" name="message"></textarea>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                <button class="pull-left btn btn-outline-primary" name="submit" value="send" type="submit"><i class="fa fa-paper-plane-o" aria-hidden="true"></i> &nbsp;&nbsp;&nbsp;Send</button>
                </div>
              </form>
            </div>
          </div>
          <!--/.col (left) -->
  
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php include_once('includes/footer.php');?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
