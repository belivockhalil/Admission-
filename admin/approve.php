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
      

if (isset($_GET['approve'])) {

//aprove application
$stat = 1;
 $sql44 = "UPDATE applications set status='".$stat."'  where id = '".$_GET['approve']."' " ;
  $conn->query($sql44);

 $id = $_GET['approve'];
 $status = 1;
    
// //query application data
 
   $sql1 = "SELECT * FROM applications WHERE id ='$id' AND status = '$status'";

    $result = $conn->query($sql1);
    if ($result->num_rows > 0) {
     // output data of each row
       while($row = $result->fetch_assoc()) {
     $course_to = $row['course_to'];
     $student_id = $row['student_id'];
     $status = $row['status'];

         }
          }
   
    $sql3 = "SELECT * FROM programs WHERE pname = '$course_to' " ;
    $result = $conn->query($sql3);
    if ($result->num_rows > 0) {
     // output data of each row
       while($row = $result->fetch_assoc()) {
     $dept = $row['dept'];
     

         }
          }
         // echo $dept;
  $sql4 = "UPDATE student set dept='".$dept."' ,program='".$course_to."' where id = '".$student_id."' " ;
  $conn->query($sql4);





header("Location: ./applications.php"); 

 }

?>