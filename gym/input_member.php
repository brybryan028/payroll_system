<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Input Member</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 20px;
    }

    a {
      display: block;
      text-decoration: none;
      color: #007bff;
      text-align: center;
      font-size: 24px;
      padding: 15px;
    }

    a:hover {
      text-decoration: underline;
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
    input[type="number"],
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
  <a href="member.php">Members List</a>
  <form action="input_member2.php" method="POST">
    <label>Name</label>
    <input type="text" name="name" placeholder="Input name here">
    <label>Phone Number</label>
    <input type="number" name="phone_number" placeholder="Input phone number here">
    <label>Start Date</label>
    <input type="date" name="start_date">
    <label>End Date</label>
    <input type="date" name="end_date">
    <input type="submit" value="Submit">
  </form>
</body>
</html>