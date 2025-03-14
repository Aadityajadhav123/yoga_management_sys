<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ycrsaid']==0)) {
  header('location:logout.php');
  } else{
   // Code for deleting product from cart
if(isset($_GET['delid']))
{
$rid=intval($_GET['delid']);
$sql="delete from tbltrainer where ID=:rid";
$query=$dbh->prepare($sql);
$query->bindParam(':rid',$rid,PDO::PARAM_STR);
$query->execute();
 echo "<script>alert('Data deleted');</script>"; 
  echo "<script>window.location.href = 'manage-trainer.php'</script>";     


}
?>
<!DOCTYPE html>
<html>
<head>

  <title>Yoga Classes Registration System | Manage Trainer</title>
  <!-- Tell the browser to be responsive to screen width -->
  
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
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
            <h1>Manage Trainer</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Manage Trainer</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
             <div class="card">
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Tname</th>
                    <th>Timages</th>
                    <th>Taddr</th>
                    <th>Tcity</th>
                    <th>Tcontact</th>
                    <th>Temail</th>
                    <th>Teducation</th>
                    <th>Texpr</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
$sql="SELECT * from tbltrainer";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                  <tr>
                    <td><?php echo htmlentities($cnt);?></td>
                    <td><?php  echo htmlentities($row->Tname);?></td>
                   <td><img src="images/<?php echo $row->Timages;?>" width="100" height="100" style="border-radius: 50%"";">
                    </td>
                    <td> <?php  echo htmlentities($row->Taddr);?></td>
                    <td> <?php  echo htmlentities($row->Tcity);?></td>
                    <td> <?php  echo htmlentities($row->Tcontact);?></td>
                    <td> <?php  echo htmlentities($row->Temail);?></td>
                    <td> <?php  echo htmlentities($row->Teducation);?></td>
                    <td> <?php  echo htmlentities($row->Texpr);?></td>
                    <td><a href="edit-trainer.php?editid=<?php echo ($row->ID);?>"><i class="nav-icon fas fa-edit"></i></a>|| <a href="manage-trainer.php?delid=<?php echo ($row->ID);?>" onclick="return confirm('Do you really want to Delete ?');"><i class="nav-icon fas fa-trash"></i></a></td>
                  </tr>
                  </tbody><?php $cnt=$cnt+1;}} ?> 
                  <tfoot>
                  <tr>
                    <th>S.No</th>
                    <th>Tname</th>
                    <th>Timages</th>
                    <th>Taddr</th>
                    <th>Tcity</th>
                    <th>Tcontact</th>
                    <th>Temail</th>
                    <th>Teducation</th>
                    <th>Texpr</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
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
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
<?php }  ?>