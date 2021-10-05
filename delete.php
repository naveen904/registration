<?php
include "conn.php";
$id = $_GET['id'];
echo $id;
$query = "DELETE from stud WHERE Id = '$id'";
  $data  = mysqli_query($conn, $query);
  if ($data) {
    // echo "successfully deleted";
    header("Location://localhost/Registration/table.php");
    exit;
  }else {
    echo "not deleted";}

  
?>