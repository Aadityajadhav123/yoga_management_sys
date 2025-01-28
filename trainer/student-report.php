<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ycrsaid']==0)) {
  header('location:logout.php');
  } else{
      
  ?>
<!DOCTYPE html>
<html>
<head>
 
  <title>Yoga Classes Registration System | Between Dates Booking Reports</title>
 
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
</head>
<body class="hold-transition sidebar-mini">
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
            <h1>Student Booking Reports</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Report</li>
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
                <h3 class="card-title">Student Dates Report</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             
                <div class="card-body">
                
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>S.No</th>
                      <th>Booking Number</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Contact Number</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php
                     $aid=$_COOKIE['user_login'];
                     $uname=$_COOKIE['user_login'];
  $sql="SELECT tb.* FROM tblclasses tc LEFT join tblbooking tb on tc.ID = tb.ClassID where tc.YogaTrainer ='$uname' and STATUS ='Approved';";
  $query = $dbh -> prepare($sql);
  $query->execute();
  $results=$query->fetchAll(PDO::FETCH_OBJ);
  
  $cnt=1;
  if($query->rowCount() > 0)
  {
  foreach($results as $row)
  {              
    echo '<script type="text/javascript">' .
    'console.log(' . $results . ');</script>';
       ?>
                    <tr>
                      <td><?php echo htmlentities($cnt);?></td>
                      <td><?php  echo htmlentities($row->BookingNumber);?></td>
                      <td><?php  echo htmlentities($row->FirstName);?> <?php  echo htmlentities($row->LastName);?>
                      </td>
                      <td><?php  echo htmlentities($row->Email);?></td>
                      <td> <?php  echo htmlentities($row->MobileNumber);?></td>
  </tr>
                    </tbody><?php $cnt=$cnt+1;}} ?> 
                    <tfoot>
                    <tr>
                     <th>S.No</th>
                      <th>Booking Number</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Contact Number</th>
                    </tr>
                    </tfoot>
                  </table>
                
                </div>
                <!-- /.card-body -->

             
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
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html><?php }  ?>
