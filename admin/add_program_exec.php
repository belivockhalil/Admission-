<?php
session_start();
// error_reporting(1);
include('../connect.php');

 date_default_timezone_set('Africa/Nairobi');
 $current_date = date('Y-m-d');

if(isset($_POST["btnsubmit"]))
{

$pname = mysqli_real_escape_string($conn,$_POST['pname']);
$cluster = mysqli_real_escape_string($conn,$_POST['cluster_point']);
$dept = mysqli_real_escape_string($conn,$_POST['dept']);
$student = mysqli_real_escape_string($conn,$_POST['no_of_students']);



//check if program already exist
$sql_u = "SELECT * FROM programs WHERE pname ='$pname'";
$res_u = mysqli_query($conn, $sql_u);
if (mysqli_num_rows($res_u) > 0) {
$msg_error = "program  already exist";
header("Location: ./programs.php"); 

}


else {
	
$sql = "INSERT INTO programs (pname,dept,cluster_points,no_of_students)VALUES( '$pname','$dept','$cluster','$student')";
 
 // $insert = mysqli_query($conn,"INSERT INTO clusters(program_name,cluster_points)VALUES('".$pname."','".$cluster."')")or die (mysqli_error());

 if ($conn->query($sql) === TRUE) {

header("Location: ./programs.php"); 
    }else { 
?>
<script>
alert('Problem Occured , Try Again');

</script>
<?php
}
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

