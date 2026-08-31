<?php
session_start();
error_reporting(1);
include('../connect.php');

 date_default_timezone_set('Africa/Nairobi');
 $current_date = date('Y-m-d');

if(isset($_POST["btnsubmit"]))
{

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



//check if student number already exist
$sql_u = "SELECT * FROM student WHERE regno ='$regno'";
$res_u = mysqli_query($conn, $sql_u);
if (mysqli_num_rows($res_u) > 0) {
$msg_error = "Student  already exist";
header("Location: http://localhost/admission/admin/user-record.php"); 

}

else {
// echo $fullname ;
// echo $sex;
// echo $dob ;
// echo $regno ;
// echo $email ;
// echo $idno ;
// echo $dob ;
// echo $clusters ;
// echo $dept ;
// echo $program;
// echo $adm_date;
// die('here');

$sql = mysqli_query($conn,"INSERT INTO student(fullname,regno,email,idnumber,dob,sex,dept,program,date_admission,photo,cluster_points)VALUES('".$fullname."','".$regno."','".$email."','".$idno."','".$dob."','".$sex."','".$dept."','".$program."','".$adm_date."','".$photo."','".$clusters."')")or die (mysqli_error());
 
 
 
header("Location: http://localhost/admission/admin/user-record.php"); 

    
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

