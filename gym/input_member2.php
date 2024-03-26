<?php

include "conn.php";

$name         =$_POST['name'];
$phone_number =$_POST['phone_number'];
$start_date   =$_POST['start_date'];
$end_date     =$_POST['end_date'];

$sql    = "INSERT INTO members (`name`, `phone_number`, `start_date`, `end_date`) VALUES ('".$name."', '".$phone_number."', '".$start_date."', '".$end_date."')";
$query  =mysqli_query($conn, $sql);

if ($query) {
  echo "Successfull";
  header("Location:member.php");
} else
echo "Failed";

?>