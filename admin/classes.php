<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ycrsaid'] == 0)) {
  header('location:logout.php');
} else {
  if (isset($_POST['submit'])) {

    $ycrsaid = $_SESSION['ycrsaid'];
    $toc = $_POST['toc'];
    $daystime = $_POST['daystime'];
    $desc = $_POST['desc'];
    $ytrainer = $_POST['ytrainer'];
    $tcnum = $_POST['tcnum'];
    $fess = $_POST['fess'];
    $cd = $_POST['classduration'];
    $yimg = $_FILES["image"]["name"];
    $timg = $_POST["timage"];
    $extension = substr($yimg, strlen($yimg) - 4, strlen($yimg));
    $extension1 = substr($timg, strlen($timg) - 4, strlen($timg));
    $allowed_extensions = array(".jpg", "jpeg", ".png", ".gif");
    // if (!in_array($extension, $allowed_extensions)) {
    //   echo "<script>alert('Yoga image has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
    // }
    // if (!in_array($extension1, $allowed_extensions)) {
    //   echo "<script>alert('Trainer image has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
    // } else {

      $yimg = md5($yimg) . time() . $extension;
      move_uploaded_file($_FILES["image"]["tmp_name"], "images/" . $yimg);
    //   $timg = md5($timg) . time() . $extension1;
    //   move_uploaded_file($_FILES["timage"]["tmp_name"], "images/" . $timg);
      // print_r($timg);
      // exit;
      $sql = "insert into tblclasses(TypeofClasses,YogaImages,DaysTime,Description,YogaTrainer,TrainerContactnumber,ProfilePics,Fees,ClassDuration)
      values(:toc,:yimg,:daystime,:desc,:ytrainer,:tcnum,:timg,:fess,:cd)";
      $query = $dbh->prepare($sql);
      $query->bindParam(':toc', $toc, PDO::PARAM_STR);
      $query->bindParam(':daystime', $daystime, PDO::PARAM_STR);
      $query->bindParam(':desc', $desc, PDO::PARAM_STR);
      $query->bindParam(':ytrainer', $ytrainer, PDO::PARAM_STR);
      $query->bindParam(':tcnum', $tcnum, PDO::PARAM_STR);
      $query->bindParam(':yimg', $yimg, PDO::PARAM_STR);
      $query->bindParam(':timg', $timg, PDO::PARAM_STR);
      $query->bindParam(':fess', $fess, PDO::PARAM_STR);
      $query->bindParam(':cd', $cd, PDO::PARAM_STR);
      $query->execute();

      $LastInsertId = $dbh->lastInsertId();
      if ($LastInsertId > 0) {
        echo '<script>alert("Class detail has been added.")</script>';
        echo "<script>window.location.href ='classes.php'</script>";
      } else {
        echo '<script>alert("Something Went Wrong. Please try again")</script>';
      }


    // }
  }
?>
<!DOCTYPE html>
<html>

<head>

  <title>Yoga Classes Registration System | Classes</title>

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
              <h1>Add Classes</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item active">Classes</li>
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
                  <h3 class="card-title">Classes</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" method="post" enctype="multipart/form-data">

                  <div class="card-body">
                    <div class="form-group">
                      <?php
  $sql = "SELECT * from tblnclass";
  $query = $dbh->prepare($sql);
  $query->execute();
  $results = $query->fetchAll(PDO::FETCH_OBJ);

                      ?>
                      <label for="exampleInputEmail1">Type of Classes</label>
                      <select class="form-control select2" style="width: 100%;" type="text" name="toc" value=""
                        required='true'>
                        <option value="" selected="">Choose the Classes</option>
                        <?php foreach ($results as $data) { ?>
                        <option value="<?php echo $data->Class_name; ?>">
                          <?php echo $data->Class_name; ?>
                        </option>
                        <?php } ?>

                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Yoga Images</label>
                      <input type="file" class="form-control" name="image" value="" required='true'>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Days & Time</label>
                      <textarea class="form-control" name="daystime" id="exampleInputEmail1" name="pagedes"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Description</label>
                      <textarea class="form-control" name="desc" id="exampleInputEmail1" name="pagedes"></textarea>
                    </div>
                    
                    <div class="form-group">
                    <?php
  $sql = "SELECT * from tbltrainer";
  $query = $dbh->prepare($sql);
  $query->execute();
  $results = $query->fetchAll(PDO::FETCH_OBJ);

                      ?>
                      <label for="exampleInputEmail1">Yoga Trainer</label>
                      <select class="form-control select2 trn" style="width: 100%;" type="text" name="ytrainer" value=""
                        required='true'>
                        <option value="" selected="">Choose the Classes</option>
                        <?php foreach ($results as $datat) { ?>
                        <option value="<?php echo $datat->Tname; ?>">
                          <?php echo $datat->Tname; ?>
                        </option>
                        <?php } ?>

                      </select>
                      <!-- <label for="exampleInputPassword1">Yoga Trainer</label>
                      <select class="form-control select2" style="width: 100%;" type="text" name="ytrainer" value=""
                        required='true'>
                        <option value="" selected="">Choose the Classes</option>
                        <option value="Artist Yoga">Neha</option>
                        <option value="Traditional Hatha">Geeta</option>
                        <option value="Yoga Therapy">Priti</option>
                      </select> -->
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Trainer Contact Number</label>
                      <input type="text" class="form-control tcnum" name="tcnum" value="" required='true' maxlength="10"
                        pattern="[0-9]+">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Trainer Profile Pics</label>
                      <br><img id="timage" height="300" width="300"  value="">  
                    </div>
                    <input type="text" class="form-control timage" id="altms" name="timage" value="" style="display: none;" >

                    <div class="form-group">
                      <label for="exampleInputPassword1">Fees</label>
                      <input type="text" class="form-control" name="fess" value="" required='true'>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Class Duration</label>
                      <input type="text" class="form-control" name="classduration" value="" required='true'>
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <script type="text/javascript">
    $(document).ready(function () {
      bsCustomFileInput.init();
    });
    $('.trn').change(function(){
                //Selected value
                var inputValue = $(this).val();
                // alert("value in js "+inputValue);
                $.ajax({
            url: "data.php?id="+inputValue,
            type: 'GET',
            dataType: 'html',
            success: function (data) {  
              var basurl = "<?php echo $_SERVER['SERVER_NAME'] ?>";
                // $('#container').html(data);
                // console.log(data.);
                var sample_obj = jQuery.parseJSON(data );
                console.log(sample_obj[0]);
                $('.tcnum').val(sample_obj[0].Tcontact);
                $('#timage').val(sample_obj[0].Timages);  
                $('#timage').attr('src','http://localhost/Yoga_Final/admin/images/'+sample_obj[0].Timages);

              console.log(basurl);
            }
        });
                //Ajax for calling php function
               
                });
  </script>
</body>

</html>
<?php
} ?>