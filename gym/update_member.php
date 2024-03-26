<?php 

include "conn.php";

$id           =$_POST['id'];
$name         =$_POST['name'];
$phonenumber  =$_POST['phone_number'];
$startdate    =$_POST['start_date'];
$enddate      =$_POST['end_date'];

$sql = "UPDATE `members` SET `name`='".$name."', `phone_number`='".$phonenumber."', `start_date`='".$startdate."', `end_date`='".$enddate."' WHERE id='".$id."'";
$query = mysqli_query($conn, $sql);

if ($query) {
  header("Location:member.php");
} else 
  echo '<script>alert("Failed to Update Member");</script>';

?>