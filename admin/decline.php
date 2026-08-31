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
      

if (isset($_GET['decline'])) {

 $stat = 3;
 $sql6 = "UPDATE applications set status='".$stat."'  where id = '".$_GET['decline']."' " ;
  $conn->query($sql6);
   # code...
 } 

 header("Location: ./applications.php"); 

 ?>
