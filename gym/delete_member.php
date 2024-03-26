<?php

include "conn.php";

$id     =$_GET['id'];

$sql    ="DELETE FROM members WHERE id='".$id."'";
$query  =mysqli_query($conn, $sql);

if ($query) {
  header("Location:member.php");
} else
  echo '<script>alert("Failed to Delete Member");</script>';


?>