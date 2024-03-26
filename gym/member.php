<?php

include "conn.php";

$currentdate = date('Y-m-d');

if (isset($_GET['search'])) {
  $search = $_GET['search'];

$sql = "SELECT * FROM members WHERE name LIKE '%$search%' OR phone_number LIKE '%$search%'";
} else {
  $sql  = "SELECT * FROM members"; }

$query = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Members</title>
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
      margin-bottom: 20px;
    }

    input[type="text"],
    button {
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      margin-right: 10px;
    }

    button {
      background-color: #007bff;
      color: #fff;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    button:hover {
      background-color: #0056b3;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th, td {
      padding: 10px;
      border: 1px solid #ccc;
    }

    th {
      background-color: #007bff;
      color: #fff;
    }

    tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    tr:hover {
      background-color: #e9ecef;
    }
  </style>
</head>
<body>
  <a href="index.php">Dashboard</a><br>
  <a href="input_member.php">Input New Member</a><br>
  <form action="" method="GET">
    <input type="text" name="search" placeholder="Search by Name or Phone Number">
    <button type="Submit">Search</button>
  </form>
  <table>
    <thead>
      <tr>
        <th>Name</th>
        <th>Phone Number</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Status</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      <?php while  ($data=mysqli_fetch_array($query)) { ?>
      <?php 
        $status = '';
        if ($currentdate >= $data['start_date'] && $currentdate <= $data['end_date']) {
          $status = 'Active';
        } elseif ($currentdate > $data['end_date']) {
          $status = "Expired";
        }
        ?>
        <tr>
          <td><?php echo $data['name'];?></td>
          <td><?php echo $data['phone_number'];?></td>
          <td><?php echo date('d/m/Y', strtotime($data['start_date']));?></td>
          <td><?php echo date('d/m/Y', strtotime($data['end_date']));?></td>
          <td><?php echo $status; ?></td>
          <td><a href="edit_member.php?id=<?php echo $data['id'];?>">EDIT</a></td>
          <td><a href="delete_member.php?id=<?php echo $data['id'];?>">DELETE</a></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</body>
</html>