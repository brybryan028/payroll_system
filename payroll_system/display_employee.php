<?php
include 'db_connect.php'; // Include database connection

// Delete employee record if ID is provided
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    
    // Delete employee record from the database
    $sql_delete = "DELETE FROM employees WHERE id = $delete_id";
    if ($conn->query($sql_delete) === TRUE) {
        echo "Employee record deleted successfully";
    } else {
        echo "Error deleting employee record: " . $conn->error;
    }
}

// Fetch all employee records
$sql = "SELECT * FROM employees";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        a {
            display: inline-block;
            margin-bottom: 10px;
            color: #007bff;
            text-decoration: none;
            padding: 5px 10px;
            border: 1px solid #007bff;
            border-radius: 5px;
        }
        a:hover {
            background-color: #007bff;
            color: #fff;
        }
        h2 {
            color: #333;
            margin-top: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        tr:hover {
            background-color: #f2f2f2;
        }
        form {
            margin-top: 20px;
        }
        input[type="number"] {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            padding: 8px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<a href="http://localhost/payroll_system/add_employee.php">Add Employee Information</a> <br>
<a href="http://localhost/payroll_system/display_employee.php">Display Employee Information</a> <br>
    <h2>Employee List</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Gaji Pokok</th>
            <th>Bonus Kinerja</th>
            <th>Uang Makan</th>
            <th>Tunjangan</th>
            <th>Pulsa</th>
            <th>Bensin</th>
            <th>Operasi</th>
            <th>Grooming</th>
            <th>Jaga Malam</th>
            <th>Pet Taxi</th>
            <th>Asisten</th>
            <th>Emergency</th>
            <th>Lain-lain</th>
            <th>Cash Bond</th>
            <th>Potongan</th>
            <th>Action</th>
        </tr>
        <?php
        if ($result && $result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['gaji_pokok']; ?></td>
                    <td><?php echo $row['bonus_kinerja']; ?></td>
                    <td><?php echo $row['uang_makan']; ?></td>
                    <td><?php echo $row['tunjangan']; ?></td>
                    <td><?php echo $row['pulsa']; ?></td>
                    <td><?php echo $row['bensin']; ?></td>
                    <td><?php echo $row['operasi']; ?></td>
                    <td><?php echo $row['grooming']; ?></td>
                    <td><?php echo $row['jaga_malam']; ?></td>
                    <td><?php echo $row['pet_taxi']; ?></td>
                    <td><?php echo $row['asisten']; ?></td>
                    <td><?php echo $row['emergency']; ?></td>
                    <td><?php echo $row['lain_lain']; ?></td>
                    <td><?php echo $row['cash_bond']; ?></td>
                    <td><?php echo $row['potongan']; ?></td>
                    <td>
                        <a href="edit_employee.php?id=<?php echo $row['id']; ?>">Edit</a> | 
                        <a href="?delete_id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this employee record?')">Delete</a>
                    </td>
                </tr>
                <?php
            }
        } else {
            echo "0 results";
        }
        ?>
    </table>
    <h2>Generate Pay Slip</h2>
    <form action="generate_pay_slip.php" method="post">
        Employee ID: <input type="number" name="employee_id"><br>
        <input type="submit" value="Generate Pay Slip">
    </form>
</body>
</html>