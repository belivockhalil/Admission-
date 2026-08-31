<?php
session_start();
error_reporting(1);
include('../connect.php');

 


if(strlen($_SESSION['uemail'])=="")
    {   
    header("Location: login.php"); 
    }
    else{
  }
      
$email = $_SESSION["uemail"];


date_default_timezone_set('Africa/Nairobi');
 $current_date = date('Y-m-d');

        
// $sql = "select * from student where email='$email'"; 

// $result = $conn->query($sql);
// $rowaccess = mysqli_fetch_array($result);

$sql = "select * from student where email='$email'"; 
$result = $conn->query($sql);
if ($result->num_rows > 0) {
 // output data of each row
   while($row = $result->fetch_assoc()) {
    $std_id = $row['id'];
    $cluster = $row['cluster_points'];
    $course = $row['program'];
    $reg = $row['regno'];
     }
      }

if(isset($_POST["btnsubmit"]))
{

$student_id = $std_id;
$clusters = $cluster;
$course_from = $course;
$regno = $reg;
$course_to = mysqli_real_escape_string($conn,$_POST['course_to']);;
$reason = mysqli_real_escape_string($conn,$_POST['reason']);;
$status = 4;


$sql3 = "SELECT * FROM programs WHERE pname = '$course_to' " ;
    $result = $conn->query($sql3);
    if ($result->num_rows > 0) {
     // output data of each row
       while($row = $result->fetch_assoc()) {
     $clusters_points = $row['cluster_points'];
     $required = $row['no_of_students'];


         }
          }

          // echo $clusters;
          // echo $clusters_points;
          // die();
$sql22 = "SELECT * FROM student WHERE program= '$course_to'";
      $result = $conn->query($sql22);
      if ($result->num_rows > 0) {
      $rowcount = mysqli_num_rows( $result );
    }

   // echo $required;
   // echo $rowcount;
   // die();
//status
//4 pending
//1 approved
//3 declined
//5 full



$stat = 3;
$st = 5;

if($clusters >= $clusters_points && $required > $rowcount){

$sql = "INSERT INTO applications (student_id,regno,clusters,course_from,course_to,reason,status)VALUES( '$student_id','$regno','$clusters','$course_from','$course_to','$reason','$status')";

 }elseif($clusters >= $clusters_points && $required <= $rowcount){
$sql = "INSERT INTO applications (student_id,regno,clusters,course_from,course_to,reason,status)VALUES( '$student_id','$regno','$clusters','$course_from','$course_to','$reason','$st')";

  }elseif($clusters < $clusters_points){
  $sql = "INSERT INTO applications (student_id,regno,clusters,course_from,course_to,reason,status)VALUES( '$student_id','$regno','$clusters','$course_from','$course_to','$reason','$stat')";

 }
 



 if ($conn->query($sql) === TRUE) {

header("Location: ./pending.php"); 
    }else { 
?>
<script>
alert('Problem Occured , Try Again');

</script>
<?php
}

}

?>


<title>Application Form| Online student admission system</title>
<?php if ($msg <> "") { ?>
  <style type="text/css">
<!--
.style1 {
	font-size: 12px;
	color: #FF0000;
}
-->
  </style>
  <div class="alert alert-dismissable alert-<?php echo $msgType; ?>">
    <button data-dismiss="alert" class="close" type="button">x</button>
    <p><?php echo $msg; ?></p>
  </div>
<?php } ?>
<p><h4><?php echo "<p> <font color=red font face='arial' size='3pt'>$msg_error</font> </p>"; ?></h4>  </p>
  <h4><?php echo "<p> <font color=green font face='arial' size='3pt'>$msg_success</font> </p>"; ?></h4>  </p>

