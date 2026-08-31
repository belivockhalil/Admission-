<?php
session_start();
error_reporting(0);
include('../connect.php');

if(strlen($_SESSION['uemail'])=="")
    {   
    header("Location: login.php"); 
    }
    else{
	}
      
$email = $_SESSION["uemail"];
//Get Date
date_default_timezone_set('Africa/Lagos');
$current_date = date('Y-m-d');


$sql = "select * from student where email='$email'"; 
$result = $conn->query($sql);
$rowaccess = mysqli_fetch_array($result);

?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Profile|Online Student Admission system</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon" />
</head>

<body>
    <div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img src="../<?php echo $rowaccess['photo'];  ?>" alt="image" width="142" height="153" class="img-circle" />
                             </span>
  
   
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"><span class="text-muted text-xs block"><?php echo $rowaccess['email'];  ?> <b class="caret"></b></span> </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
  </div>	
   
			   <?php
			   include('sidebar.php');
			   
			   ?>
			   
	       </ul>

        </div>
    </nav>

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Welcome to DASHBOARD</span>
                </li>
                <li class="dropdown">
                   
                    


                <li>
                    <a href="logout.php">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
               
            </ul>

        </nav>
        </div>

        <div class="wrapper wrapper-content">
            <div class="row animated fadeInRight">
                
                <div class="col-md-8">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h3>Transfer Application Information</h3>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#">Config option 1</a>
                                    </li>
                                    <li><a href="#">Config option 2</a>
                                    </li>
                                </ul>
                                
                            </div>
                        </div>
                        <div class="ibox-content">

                            <div>
                                <div class="feed-activity-list" style="height:240px;">

                     <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                              <h5><span class="label lbl label-primary pull-right">Chances</span>
</h5>
 <?php
                     $student_id = $rowaccess['id'];
                  $sql1 = "SELECT * FROM applications WHERE student_id= '$student_id'";
                  $result = $conn->query($sql1);
                  if ($result->num_rows > 0) {
                   // output data of each row
                     while($row = $result->fetch_assoc()) {
                 $program = $row['course_to'];
                 
                 
                       }
                        }

  
                  $sql2 = "SELECT * FROM programs WHERE pname= '$program'";
                  $result = $conn->query($sql2);
                  if ($result->num_rows > 0) {
                   // output data of each row
                     while($row = $result->fetch_assoc()) {
                 $clusters = $row['cluster_points'];
                 $required = $row['no_of_students'];
             }
         }
                 $sql22 = "SELECT * FROM student WHERE program= '$program'";
                  $result = $conn->query($sql22);
                  if ($result->num_rows > 0) {
                  $rowcount = mysqli_num_rows( $result );
         }

        



         $clusterp = $rowaccess['cluster_points'];
         $chances = '';

         if ($clusterp >= $clusters && $required > $rowcount) {
             // code...
           $res1 = mysqli_query($conn,"SELECT sum(clusters)  FROM applications WHERE course_to='$program'")or die(mysqli_error());

                while($row=mysqli_fetch_array($res1)){

                    $all = $row['sum(clusters)'];
                }

              $stclusters =  $rowaccess['cluster_points'];

                $percent = $stclusters / $all;
                $pct = $percent * 100;
                $chances = $pct.'%';

         }elseif($clusterp < $clusters){
            $chances = '0% Your clusters are below the required clusters';
         }elseif($clusterp >= $clusters && $required <= $rowcount){
             $chances = 'Course is already full';
         }else{
            $chances = 'No Application';
         }
                    
                    // echo $chances;
                    // die();

         
                  ?>
                          
                            </div>
                            <div class="ibox-content">
                                <h3 class="no-margins"><?php echo $chances;  ?></h3>
                                
                          </div>
                        </div>
                    </div>
                     <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                              <h5><span class="label lbl label-secondary pull-right">Your Cluster points</span>
</h5>
                          
                            </div>
                            <div class="ibox-content">
                                <h3 class="no-margins"><?php echo $rowaccess['cluster_points'];  ?></h3>
                          </div>
                        </div>
                    </div>
                     <?php
                     $student_id = $rowaccess['id'];
                  $sql1 = "SELECT * FROM applications WHERE student_id= '$student_id'";
                  $result = $conn->query($sql1);
                  if ($result->num_rows > 0) {
                   // output data of each row
                     while($row = $result->fetch_assoc()) {
                 $program = $row['course_to'];
                 
                 
                       }
                        }

  
                  $sql2 = "SELECT * FROM programs WHERE pname= '$program'";
                  $result = $conn->query($sql2);
                  if ($result->num_rows > 0) {
                   // output data of each row
                     while($row = $result->fetch_assoc()) {
                 $clusters = $row['cluster_points'];
                 $required = $row['no_of_students'];
             }
         }

                    
                  
                  ?>
                     <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                              <h5><span class="label label-info pull-right lbl">Clusters Required</span>
</h5>
                          
                            </div>
                            <div class="ibox-content">
                                <h3 class="no-margins"><?php echo $clusters;  ?></h3>
                          </div>
                        </div>
                    </div>
                    <style type="text/css">
                        .lbl{
                            font-size: 16px;
                        }
                    </style>
                    
                                     <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                              <h5><span class="label lbl label-secondary pull-right"> Transfer Status</span>
</h5>
                            </div>
                            <div class="ibox-content">

                                     <?php
                  $sql = "SELECT * FROM applications";
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                   // output data of each row
                     while($row = $result->fetch_assoc()) {
                 $status = $row['status'];
                 
                 
                       }
                        }
                  ?>

                                <h3 class="no-margins"><?php if($status == 4)
{ ?>
 <h4 style="color:orange">Transfer Pending..</h4>
               <?php }
                elseif ($status==3) {
                    ?>
                     <h4 style="color:red;">Course Transfer declined</h4>
                 <?php }elseif($status ==1 ) {?>
     <h4 style="color:green">Congrats, Transfer success</h4>

                         <?php }elseif ($status==5) {?>
                              <h4 style="color:red;">Course Transfer declined the program is already full</h4>
                             
                       <?php  }else{?>

 <h4 style="color:black">You have no transfer application</h4>
                       <?php   } ?> 


</h3>
                                <small> </small> 
                          </div>
                        </div>
                    </div>
                    


									
									
         

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        

        </div>
        </div>



    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- Peity -->
    <script src="js/plugins/peity/jquery.peity.min.js"></script>

    <!-- Peity -->
    <script src="js/demo/peity-demo.js"></script>

</body>

</html>
