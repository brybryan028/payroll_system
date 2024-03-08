<?php
/*include 'db_connect.php'; // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $employee_id = $_POST['employee_id'];
    
    // Fetch employee details
    $sql = "SELECT * FROM employees WHERE id = $employee_id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    
    // Calculate total salary
    $total_salary = $row['gaji_pokok'] + $row['bonus_kinerja'] + $row['uang_makan'] + $row['tunjangan'] + $row['pulsa'] + $row['bensin'] + $row['operasi'] + $row['grooming'] + $row['jaga_malam'] + $row['pet_taxi'] + $row['asisten'] + $row['emergency'] + $row['lain_lain'] - $row['cash_bond'] - $row['potongan'];
    
    // Generate pay slip
    echo "Nama: " . $row['nama'] . "<br>";
    echo "Gaji Pokok: RP" . $row['gaji_pokok'] . "<br>";
    echo "Bonus Kinerja: RP" . $row['bonus_kinerja'] . "<br>";
    echo "Uang Makan: RP" . $row['uang_makan'] . "<br>";
    echo "Tunjangan: RP" . $row['tunjangan'] . "<br>";
    echo "Pulsa: RP" . $row['pulsa'] . "<br>";
    echo "Bensin: RP" . $row['bensin'] . "<br>";
    echo "Operasi: RP" . $row['operasi'] . "<br>";
    echo "Grooming: RP" . $row['grooming'] . "<br>";
    echo "Jaga Malam: RP" . $row['jaga_malam'] . "<br>";
    echo "Pet Taxi: RP" . $row['pet_taxi'] . "<br>";
    echo "Asisten: RP" . $row['asisten'] . "<br>";
    echo "Emergency: RP" . $row['emergency'] . "<br>";
    echo "Lain lain: RP" . $row['lain_lain'] . "<br>";
    echo "Cash Bond: RP" . $row['cash_bond'] . "<br>";
    echo "Potongan: RP" . $row['potongan'] . "<br>";

    // Similar for other fields
    echo "Total Salary: RP" . $total_salary . "<br>";
}
$conn->close();*/

/*
    <h2>Generate Pay Slip</h2>
    <form action="generate_pay_slip.php" method="post">
        Employee ID: <input type="text" name="employee_id"><br>
        <input type="submit" value="Generate Pay Slip">
    </form>
    */

/* <!DOCTYPE html>
<html>
<head>
    <title>Employee List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        h2 {
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        a {
            text-decoration: none;
            color: #007bff;
        }
        a:hover {
            color: #0056b3;
        }
        
        
    </style>
</head>
<body>
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
        include 'db_connect.php'; // Include database connection

        // Fetch all employee records
        $sql = "SELECT * FROM employees";
        $result = $conn->query($sql);

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
                    <td><a href="edit_employee.php?id=<?php echo $row['id']; ?>">Edit</a></td>
                </tr>
                <?php
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
    </table>
    <h2>Generate Pay Slip</h2>
    <form action="generate_pay_slip.php" method="post">
        Employee ID: <input type="text" name="employee_id"><br>
        <input type="submit" value="Generate Pay Slip">
    </form>
</body>
</html>*/

/* <!DOCTYPE html>
<html>
<head>
    <title>Edit Employee Information</title>
</head>
<body>
<a href="http://localhost/payroll_system/add_employee.php">Add Employee Information</a> <br>
<a href="http://localhost/payroll_system/edit_employee.php">Edit Employee Information</a> <br>
<a href="http://localhost/payroll_system/display_employee.php">Display Employee Information</a> <br>
    <h2>Edit Employee Information</h2>
    <form action="edit_employee.php" method="get">
        Enter Employee ID to Edit: <input type="text" name="id"><br>
        <input type="submit" value="Submit">
    </form>
    <a href="http://localhost/payroll_system/display_employee.php">Display Employee</a>
    <?php
    // Display the employee details if available
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
        include 'db_connect.php'; // Include database connection
        $employee_id = $_GET['id'];
        // Fetch employee details
        $sql = "SELECT * FROM employees WHERE id = $employee_id";
        $result = $conn->query($sql);
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>
            <h2>Edit Employee ID: <?php echo $row['id']; ?></h2>
            <form action="edit_employee.php" method="post">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                Nama: <input type="text" name="nama" value="<?php echo $row['nama']; ?>"><br>
                Gaji Pokok: <input type="text" name="gaji_pokok" value="<?php echo $row['gaji_pokok']; ?>"><br>
                Bonus Kinerja: <input type="text" name="bonus_kinerja" value="<?php echo $row['bonus_kinerja']; ?>"><br>
                Uang Makan: <input type="text" name="uang_makan" value="<?php echo $row['uang_makan']; ?>"><br>
                Tunjangan: <input type="text" name="tunjangan" value="<?php echo $row['tunjangan']; ?>"><br>
                Pulsa: <input type="text" name="pulsa" value="<?php echo $row['pulsa']; ?>"><br>
                Bensin: <input type="text" name="bensin" value="<?php echo $row['bensin']; ?>"><br>
                Operasi: <input type="text" name="operasi" value="<?php echo $row['operasi']; ?>"><br>
                Grooming: <input type="text" name="grooming" value="<?php echo $row['grooming']; ?>"><br>
                Jaga Malam: <input type="text" name="jaga_malam" value="<?php echo $row['jaga_malam']; ?>"><br>
                Pet Taxi: <input type="text" name="pet_taxi" value="<?php echo $row['pet_taxi']; ?>"><br>
                Asisten: <input type="text" name="asisten" value="<?php echo $row['asisten']; ?>"><br>
                Emergency: <input type="text" name="emergency" value="<?php echo $row['emergency']; ?>"><br>
                Lain lain: <input type="text" name="lain_lain" value="<?php echo $row['lain_lain']; ?>"><br>
                Cash Bond: <input type="text" name="cash_bond" value="<?php echo $row['cash_bond']; ?>"><br>
                Potongan: <input type="text" name="potongan" value="<?php echo $row['potongan']; ?>"><br>
                <!-- Add fields for other allowances -->
                <input type="submit" value="Update Information">
            </form>
            <?php
        } else {
            echo "No employee found with ID: $employee_id";
        }
        $conn->close();
    }
    ?>
</body>
</html>*/
?>
