<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ycrsaid'] == 0)) {
  header('location:logout.php');
} else {
  if (isset($_POST['submit'])) 
  {

    $ycrsaid = $_SESSION['ycrsaid'];
    $tname = $_POST['tname'];
    $taddress = $_POST['taddress'];
    $tcity = $_POST['tcity'];
    $tcnum = $_POST['tcnum'];
    $temail = $_POST['temail'];
    $teducation = $_POST['teducation'];
    $texpr = $_POST['texpr'];
    $timage = $_FILES["timage"]["name"];
    $extension1 = substr($timage, strlen($timage) - 4, strlen($timage));
    $allowed_extensions = array(".jpg", "jpeg", ".png", ".gif");

    if (!in_array($extension1, $allowed_extensions)) {
      echo "<script>alert('Trainer image has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
    } else {

      $timage = md5($timage) . time() . $extension1;
      move_uploaded_file($_FILES["timage"]["tmp_name"], "images/" . $timage);
      
      $sql = "INSERT INTO `tbltrainer`( `Tname`, `Timages`, `Taddr`, `Tcity`, `Tcontact`, `Temail`, `Teducation`, `Texpr`) 
      VALUES ('" . $tname . "','" . $timage . "','" . $taddress . "','" . $tcity . "','" . $tcnum . "','" . $temail . "','" . $teducation . "','" . $texpr . "')";
      // print_r($sql);exit;
      $query = $dbh->prepare($sql);
      // $query->bindParam(':tname', $tname, PDO::PARAM_STR);
      // $query->bindParam(':timage',$timage,PDO::PARAM_STR);
      // $query->bindParam(':taddress', $taddress, PDO::PARAM_STR);
      // $query->bindParam(':tcity', $tcity, PDO::PARAM_STR);
      // $query->bindParam(':tcnum', $tcnum, PDO::PARAM_STR);
      // $query->bindParam(':temail', $temail, PDO::PARAM_STR);
      // $query->bindParam(':teducation', $teducation, PDO::PARAM_STR);
      // $query->bindParam(':texpr', $texpr, PDO::PARAM_STR);
      $query->execute();

      $LastInsertId = $dbh->lastInsertId();
      if ($LastInsertId > 0) {
        echo '<script>alert("Trainer detail has been added.")</script>';
        echo "<script>window.location.href ='trainer_1.php'</script>";
      } else {
        echo '<script>alert("Something Went Wrong. Please try again")</script>';
      }


    }
  }
?>
<!DOCTYPE html>
<html>

<head>

  <title>Yoga Classes Registration System | Trainer</title>

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
              <h1>Add Trainer</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item active">Trainer</li>
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
                  <h3 class="card-title">Trainer's Detail</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" method="post" enctype="multipart/form-data">

                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Trainer Name</label>
                      <input type="text" class="form-control" name="tname" value="" required="true">

                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Trainer Images</label>
                      <input type="file" class="form-control" name="timage" value="" required='true'>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Trainer Address</label>
                      <textarea class="form-control" name="taddress" id="exampleInputEmail1" name="pagedes"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Trainer City</label>
                      <input type="text" class="form-control" name="tcity" value="" required='true'>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Trainer Contact Number</label>
                      <input type="text" class="form-control" name="tcnum" value="" required='true' maxlength="10"
                        pattern="[0-9]+">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Trainer Email id</label>
                      <input type="text" class="form-control" name="temail" value="" required='true'>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Trainer Qualification</label>
                      <input type="text" class="form-control" name="teducation" value="" required='true'>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Trainer Experience</label>
                      <input type="text" class="form-control" name="texpr" value="" required='true'>
                    </div>
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
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

</html>
<?php } ?>