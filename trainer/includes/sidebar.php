  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard.php" class="brand-link">
      <img src="dist/img/logo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">YCRS Trainer</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/images.png" class="img-circle elevation-2" alt="User Image">
          
        </div>
        <div class="info">
          <?php
$aid=$_SESSION['ycrsaid'];
$sql="SELECT TName,Temail from tblTrainer where ID=:aid";
$query = $dbh -> prepare($sql);
$query->bindParam(':aid',$aid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
          <a href="admin-profile.php" class="d-block" id="Tusername"><?php  echo $row->TName;?></a>
          <p style="color: white"><?php  echo $row->Temail;?><?php $cnt=$cnt+1;}} ?></p>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Trainer
                <i class="right fas fa-angle-left right "></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="change-password.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Change Password</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="logout.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="dashboard.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
            
          </li>
               
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-bar"></i>
              <p>
                 Report
                 <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                 <a href="between-dates-report.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Date Report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="student-report.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Student Report</p>
                </a>
              </li>
            </ul>
          </li>
       
          <li class="nav-item has-treeview">
            <a href="search.php" class="nav-link">
              <i class="nav-icon fas fa-search "></i>
              <p>
              Search
              </p>
            </a>
         
          </li>
          <li class="nav-item">
                <a href="TimeTable.htm" class="nav-link">
                  <i class="far fa-calendar nav-icon"></i>
                  <p>Yoga Schedule</p>
                </a>
              </li>
            
         
        </ul>

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>