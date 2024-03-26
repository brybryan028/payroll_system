<?php

include "conn.php";

$id  = $_GET['id'];
$sql = "SELECT * FROM members WHERE id='".$id."'";

$query = mysqli_query($conn, $sql);

while ($data=mysqli_fetch_array($query)) { ?>

  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Member</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 20px;
      }

      a {
        display: block;
        margin-bottom: 10px;
        text-decoration: none;
        color: #007bff;
        font-size: 24px;
        text-align: center;
      }

      form {
        max-width: 400px;
        margin: 0 auto;
        background-color: #fff;
        padding: 80px;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      }

      label {
        display: block;
        margin-bottom: 5px;
      }

      input[type="text"],
      input[type="date"],
      input[type="submit"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
      }

      input[type="submit"] {
        background-color: #007bff;
        color: #fff;
        cursor: pointer;
        transition: background-color 0.3s ease;
      }

      input[type="submit"]:hover {
        background-color: #0056b3;
      }
    </style>
  </head>
  <body>
    <a href="index.php">Dashboard</a>
    <a href="member.php">Member List</a>
    <a href="input_member.php">Input New Member</a>
    <form action="update_member.php" method="POST">
      <label>Id</label>
      <input type="text" name="id" value="<?php echo $data['id'];?>">
      <label>Name</label>
      <input type="text" name="name" value="<?php echo $data['name'];?>">
      <label>Phone Number</label>
      <input type="text" name="phone_number" value="<?php echo $data['phone_number'];?>">
      <label>Start Date</label>
      <input type="date" name="start_date" value="<?php echo $data['start_date'];?>">
      <label>End Date</label>
      <input type="date" name="end_date" value="<?php echo $data['end_date'];?>">
      <input type="submit" value="Submit">
    </form>
  </body>
  </html>

<?php } ?>