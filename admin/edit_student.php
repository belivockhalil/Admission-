<?php
session_start();
error_reporting(0);
include('../connect.php');
if(strlen($_SESSION['admin-username'])=="")
    {   
    header("Location: login.php"); 
    }
    else{
	}
	$username=$_SESSION['admin-username'];
	 $sql = "select * from admin where username='$username'"; 
$result = $conn->query($sql);
$row= mysqli_fetch_array($result);
      ?>

      <?php

 
              
if(isset($_GET['id']))
{
$id=intval($_GET['id']);

  $update = "SELECT * FROM student WHERE id= '$id'";
  $result = $conn->query($update);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $fullname = $row['fullname'];
        $regno = $row['regno'];
        $sex = $row['sex'];
        $dob = $row['dob'];
        $cluster = $row['cluster_points'];
        $idno = $row['idnumber'];
        $dept = $row['dept'];
        $program = $row['program'];
        $admdate  = $row['date_admission'];
       
                
                
    }
}

}
?>

<?php
date_default_timezone_set('Africa/Nairobi');
 $current_date = date('Y-m-d');

if(isset($_POST["btnsubmit"]))
{
$id = mysqli_real_escape_string($conn,$_POST['id']);

$fullname = mysqli_real_escape_string($conn,$_POST['fullname']);
$sex = mysqli_real_escape_string($conn,$_POST['sex']);
$dob = mysqli_real_escape_string($conn,$_POST['dob']);
$regno = mysqli_real_escape_string($conn,$_POST['regno']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$idno = mysqli_real_escape_string($conn,$_POST['idnumber']);
$dob = mysqli_real_escape_string($conn,$_POST['dob']);
$clusters = mysqli_real_escape_string($conn,$_POST['cluster_point']);
$dept = mysqli_real_escape_string($conn,$_POST['dept']);
$program = mysqli_real_escape_string($conn,$_POST['program']);
$adm_date = mysqli_real_escape_string($conn,$_POST['date_admission']);
$photo='upload/default.jpg';





 $sql = "UPDATE student set fullname='".$fullname."', regno='".$regno."', email='".$email."',idnumber='".$idno."',dob='".$dob."', sex='".$sex."', dept='".$dept."', program='".$program."', date_admission='".$adm_date."',photo='".$photo.", cluster_points='".$clusters."'      where id = '".$id."' " ;
 
 if ($conn->query($sql) === TRUE) {

header("Location: http://localhost/admission/admin/user-record.php"); 
    }else { 
?>
<script>
alert('Problem Occured , Try Again');

</script>
<?php
}

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Applications Records|Online Student Admission system</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  
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
      <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon" />

  <script type="text/javascript">
		function deldata(fullname){
if(confirm("ARE YOU SURE YOU WISH TO DELETE " + " " + fullname+ " " + " FROM THE LIST?"))
{
return  true;
}
else {return false;
}
	 
}

</script>

 
  <style type="text/css">
<!--
.style6 {font-size: 12px}
-->
  </style>


   
  <!-- Modal -->
 

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

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../upload/no_image.jpg" alt="User Image" width="188" height="181" class="img-circle elevation-2">        </div>
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
            <h1 class="m-0 text-dark">&nbsp;</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Programs' Record</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="modal-header tit-up">
      
        <h4 class="modal-title">Edit student </h4>
      </div>
      <div class="modal-body customer-box">
        <!-- Nav tabs -->
       <form role="form" class="form-horizontal" method= "POST" action="">
              <div class="form-group">
                <div class="col-sm-12">
                  <input class="form-control" id="email1" placeholder="Enter fullname" type="text" name="fullname" value="<?php echo $fullname;?>" required>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12">
                  <select class="form-control" value="<?php echo $sex ;?>" name="sex" aria-label="Default select example">
  <option selected>Select gender</option>
  <option value="male" >male</option>
  <option value="female">female</option>
  
</select>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12">
                  <input class="form-control"  id="exampleInputPassword1" placeholder="Enter Registration no" type="text" name="regno" value="<?php echo $regno; ?>" required>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12">
                  <input class="form-control" value="<?php echo $idno;?>" id="exampleInputPassword1" placeholder="Enter Id number" type="text" name="idnumber" required>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-12">
                  <input class="form-control" id="exampleInputPassword1" placeholder="Enter Date of birth"  value="<?php echo $dob;?>"type="date" name="dob" required>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12">
                  <input class="form-control" id="exampleInputPassword1" placeholder="Enter clusters" type="text" value="<?php echo $cluster;?>" name="cluster_point" required>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12">
                  <select class="form-control" value="<?php echo $dept;?>" name="dept" aria-label="Default select example">
 <option >Select Department</option>

                  <?php
                  $sql = "SELECT * FROM departments";
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                   // output data of each row
                     while($row = $result->fetch_assoc()) {
                  echo "<option value='".$row["name"]."' >".$row["name"]."</option>";
                       }
                        }
                  ?>

  
  
</select>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12">
                  <select class="form-control" value="<?php echo $program;?>" name="program" aria-label="Default select example">
 <option >Select Program</option>

                  <?php
                  $sql = "SELECT * FROM programs";
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                   // output data of each row
                     while($row = $result->fetch_assoc()) {
                  echo "<option value='".$row["pname"]."' >".$row["pname"]."</option>";
                       }
                        }
                  ?>
  
</select>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12">
                  <input class="form-control" id="exampleInputPassword1" placeholder="Enter Date of Admission" value="<?php echo $admdate ;?>" type="date" name="date_admission" required>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-10">
                  <button type="submit" name="btnsubmit" class="btn btn-primary">Submit</button>
                </div>
              </div>
            </form>
       
      </div>
    </div>

          <p>
            <!-- /.card -->
          </p>
        </div>
          <!-- /.col -->
    </div>
        <!-- /.row -->
  </div>
      <!-- /.container-fluid --><!-- /.content -->
</div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      
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
<!-- Page specific script -->
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
