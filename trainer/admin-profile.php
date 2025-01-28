<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ycrsaid'] == 0)) {
  header('location:logout.php');
} else {
  if (isset($_POST['submit'])) {
    $adminid = $_SESSION['ycrsaid'];
    $TName = $_POST['trainername'];
    $mobno = $_POST['mobilenumber'];
    $email = $_POST['email'];


    $sql = "update tbladmin set Tname=:TName,Tcontact=:mobilenumber,Temail=:email where ID=:aid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':trainername', $TName, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':mobilenumber', $mobno, PDO::PARAM_STR);
    $query->bindParam(':aid', $adminid, PDO::PARAM_STR);
    $query->execute();

    echo '<script>alert("Profile has been updated")</script>';
    echo "<script>window.location.href ='admin-profile.php'</script>";
  }
?>
  <!DOCTYPE html>
  <html>

  <head>

    <title>Yoga Classes Registration System | Profile</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  </head>

  <body class="hold-transition sidebar-mini">
    <div class="wrapper">
      <!-- Navbar -->
      <?php include_once('includes/header.php'); ?>
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <?php include_once('includes/sidebar.php'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Profile</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                  <li class="breadcrumb-item active">Profile</li>
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
                <!-- jquery validation -->
                <?php

                $sql = "SELECT * from  tbltrainer where id = " . $_SESSION['ycrsaid'];
                $query = $dbh->prepare($sql);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);
                if ($query->rowCount() > 0) {
                  foreach ($results as $row) {               ?>
                    <div class="card card-primary">
                      <div class="card-header">
                        <h3 class="card-title">


                          <img src="images/<?php echo $row->Timages; ?>" alt="" style="width:50px;height:50px;" class="rounded-circle mx-2 shadow">
                          Trainer <small>Profile</small>

                        </h3>
                      </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                      <form role="form" id="quickForm" method="post">

                        <div class="card-body">
                         <div class="form-group">
                            <label for="exampleInputPassword1">Trainer Name</label>
                            <input type="text" class="form-control" name="username" value="<?php echo $row->Tname; ?>" readonly="true">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Email</label>
                            <input type="email" class="form-control" name="email" value="<?php echo $row->Temail; ?>" required='true'>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Contact Number</label>
                            <input type="text" class="form-control" name="mobilenumber" value="<?php echo $row->Tcontact; ?>" required='true' maxlength='10'>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Trainer Education</label>
                            <input type="text" class="form-control" id="email2" name="" value="<?php echo $row->Teducation; ?>" readonly="true">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Trainer City</label>
                            <input type="text" class="form-control" id="email2" name="" value="<?php echo $row->Tcity; ?>" readonly="true">
                          </div>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary" name="submit">Update</button>
                        </div>
                      </form>
                    </div>
                <?php }
                } ?>
                <!-- /.card -->
              </div>
              <!--/.col (left) -->
              <!-- right column -->
              <div class="col-md-6">

              </div>
              <!--/.col (right) -->
            </div>
            <!-- /.row -->
          </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      <?php include_once('includes/footer.php'); ?>
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
    <!-- jquery-validation -->
    <script src="plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="plugins/jquery-validation/additional-methods.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>

  </body>

  </html>
<?php }  ?>