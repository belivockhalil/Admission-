 <?php

include('../connect.php');

$sql = "SELECT * FROM programs order by id ASC";
$result = $conn->query($sql);
$cnt=1;
while($row = $result->fetch_assoc()) { 

$cluster = $row['cluster_points'];
$program_id = $row['id'];

   $insert = mysqli_query($conn,"INSERT INTO clusters(program_id, cluster_points)VALUES('".$program_id."','".$cluster."')")or die (mysqli_error());

                      }
                      
?>