<?php
session_start();
error_reporting(0);
include('../connect.php');
if(strlen($_SESSION['admin-username'])=="" || !isset($_SESSION['admin-username']))
    {   
    header("Location: login.php"); 
    }
    else{
	}
	$username = $_SESSION["admin-username"];
 date_default_timezone_set('Africa/Lagos');
 $current_date = date('Y-m-d');

 $sql = "select * from admin where username ='$username'"; 
$result = $conn->query($sql);
$row = mysqli_fetch_array($result);
      ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard |Online Student Admission system</title>
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon" />
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Home</a>      </li>
      
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
 
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
 

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../upload/no_image.jpg" alt="User Image" width="220" height="192" class="img-circle elevation-2">        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $row['username'];  ?></a>
        </div>
      </div>

      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         
		 <?php
			   include('sidebar.php');
			   
			   ?>
		 
		 
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
	<?php 
                 
    $query = "SELECT * FROM student"; 
       $result = mysqli_query($conn, $query); 
      
    if ($result) 
    { 
        // it return number of rows in the table. 
        $row_users = mysqli_num_rows($result); 
          
    }           
    ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h6><strong><?php echo $row_users;?></strong></h6>

                <p><strong>No. of Students </strong></p>
              </div>
              <div class="icon">
                <i class=""></i>
              </div>
              <a href="#" class="small-box-footer"></a>            </div>
          </div>
          <!-- ./col -->
		 <?php 
                 
    $query = "SELECT * FROM programs "; 
       $result = mysqli_query($conn, $query); 
      
    if ($result) 
    { 
        // it return number of rows in the table. 
        $programs = mysqli_num_rows($result); 
          
    }           
    ?>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h6><?php echo $programs; ?></h6>

                <p><strong>No. of programs </strong></p>
              </div>
              <div class="icon">
                <i class=""></i>
              </div>
              <a href="#" class="small-box-footer"></a>            </div>
          </div>
          <?php 
                 
    $query = "SELECT * FROM departments "; 
       $result = mysqli_query($conn, $query); 
      
    if ($result) 
    { 
        // it return number of rows in the table. 
        $dept = mysqli_num_rows($result); 
          
    }           
    ?>
        
           <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h6><strong><?php echo $dept;?></strong></h6>

                <p><strong>No. of Departments </strong></p>
              </div>
              <div class="icon">
                <i class=""></i>
              </div>
              <a href="#" class="small-box-footer"></a>            </div>
          </div>
          <?php 
                 
    $query = "SELECT * FROM applications "; 
       $result = mysqli_query($conn, $query); 
      
    if ($result) 
    { 
        // it return number of rows in the table. 
        $apl = mysqli_num_rows($result); 
          
    }           
    ?>
           <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h6><?php echo $apl; ?></h6>

                <p><strong>No. of transfers </strong></p>
              </div>
              <div class="icon">
                <i class=""></i>
              </div>
              <a href="#" class="small-box-footer"></a>            </div>
          </div>
           <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <p>&nbsp;</p>
          <table width="1161" border="0" align="center">
            <tr>
              <td width="1155"><div class="card">
                <div class="card-header">
                  <h2>Transfer Applications</h2>
                  <h3 class="card-title">&nbsp;</h3>
                  
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table width="85%" align="center" class="table table-bordered table-striped" id="example1">
                    <thead>
                      <tr> <th width="3%">#</th>
                        <th width="13%">Student name</th>
                        <th width="13%">Registration No</th>
                        <th width="13%"> Course from</th>
                        <th width="13%">Course to</th>
                        <th width="9%">Clusters</th>
                        <th width="9%">Status</th>
                       
                        
                        <th width="16%">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                                    <?php 
                                          $sql7 = "SELECT * FROM applications order by id ASC";
                                           $result = $conn->query($sql7);
                    $cnt=1;
                                           while($row = $result->fetch_assoc()) { 
                                            $student_id = $row['student_id'];
                       ?>
                      <tr class="gradeX">
            <td height="47"><div align="center"><?php echo $cnt; ?></div></td>
                        <td><div align="center"><?php echo $row['fullname']; ?></div></td>
                        <td><div align="center"><?php echo $row['regno']; ?></div></td>
                       
             <td><div align="center"><?php echo $row['course_from']; ?></div></td>
             <td><div align="center"><?php echo $row['course_to']; ?></div></td>
             <td><div align="center"><?php echo $row['clusters']; ?></div></td>
                        
                      
                        <td><?php if(($row['status'])==((1)))
{ ?>
                          <span class="badge badge-primary">Approved</span>
                          <?php } elseif (($row['status'])==((3))) { ?>
                            <span class="badge badge-danger">Declined</span>
                          <?php }else{?>
                          <span class="badge badge-warning">Waiting approval</span>
                        <?php } ?></td>
                        <td><span class="style6">
                        
 
                         
<a href="approve.php?approve=<?php echo $row['id'];?>" ><span class="btn-outline-info btn-sm" >Approve</span></a>
                         
                        
             <a href="decline.php?decline=<?php echo $row['id'];?>"><span class="btn-outline-danger btn-sm" style="margin-left: 7px;">Decline</span></a>

                     </span></td>
                      </tr>
                      <?php $cnt=$cnt+1;} ?>
                    </tbody>
                    <tfoot>
                    </tfoot>
                  </table>
                </div>
                <!-- /.card-body -->
              </div></td>
            </tr>
          </table>
          <p>
            <!-- /.card -->
          </p>
        </div>
          <!-- /.col -->
    </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <?php include('../footer.php');  ?>
    <div class="float-right d-none d-sm-inline-block">
      
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
</body>
</html>
