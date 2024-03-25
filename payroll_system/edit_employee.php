<?php
include 'db_connect.php'; // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $employee_id = $_GET['id'];
    
    // Fetch employee details
    $sql = "SELECT * FROM employees WHERE id = $employee_id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $employee_id = $_POST['id'];
    $nama = $_POST['nama'];
    $gaji_pokok = $_POST['gaji_pokok'];
    $bonus_kinerja = $_POST['bonus_kinerja'];
    $uang_makan = $_POST['uang_makan'];
    $tunjangan = $_POST['tunjangan'];
    $pulsa = $_POST['pulsa'];
    $bensin = $_POST['bensin'];
    $operasi = $_POST['operasi'];
    $grooming = $_POST['grooming'];
    $jaga_malam = $_POST['jaga_malam'];
    $pet_taxi = $_POST['pet_taxi'];
    $asisten = $_POST['asisten'];
    $emergency = $_POST['emergency'];
    $lain_lain = $_POST['lain_lain'];
    $cash_bond = $_POST['cash_bond'];
    $potongan = $_POST['potongan'];
    // Similar for other fields
    
    $sql = "UPDATE employees SET nama='$nama', gaji_pokok='$gaji_pokok', bonus_kinerja='$bonus_kinerja', uang_makan='$uang_makan', tunjangan='$tunjangan', pulsa='$pulsa', bensin='$bensin', operasi='$operasi', grooming='$grooming', jaga_malam='$jaga_malam', pet_taxi='$pet_taxi', asisten='$asisten', emergency='$emergency', lain_lain='$lain_lain', cash_bond='$cash_bond', potongan='$potongan' /* Add other fields here */ WHERE id=$employee_id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        header("Location:display_employee.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
$conn->close();

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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 10px;
            background-color: #f0f0f0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
            margin-bottom: 20px;
        }
        form {
            margin-top: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
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
<h2>Edit Employee ID: <?php echo $row['id']; ?></h2>
            <form action="edit_employee.php" method="post">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                Nama: <input type="text" name="nama" value="<?php echo $row['nama']; ?>"><br>
                Gaji Pokok: <input type="text" name="gaji_pokok" value="<?php echo number_format($row['gaji_pokok']); ?>"><br>
                Bonus Kinerja: <input type="text" name="bonus_kinerja" value="<?php echo number_format($row['bonus_kinerja']); ?>"><br>
                Uang Makan: <input type="text" name="uang_makan" value="<?php echo number_format($row['uang_makan']); ?>"><br>
                Tunjangan: <input type="text" name="tunjangan" value="<?php echo number_format($row['tunjangan']); ?>"><br>
                Pulsa: <input type="text" name="pulsa" value="<?php echo number_format($row['pulsa']); ?>"><br>
                Bensin: <input type="text" name="bensin" value="<?php echo number_format($row['bensin']); ?>"><br>
                Operasi: <input type="text" name="operasi" value="<?php echo number_format($row['operasi']); ?>"><br>
                Grooming: <input type="text" name="grooming" value="<?php echo number_format($row['grooming']); ?>"><br>
                Jaga Malam: <input type="text" name="jaga_malam" value="<?php echo number_format($row['jaga_malam']); ?>"><br>
                Pet Taxi: <input type="text" name="pet_taxi" value="<?php echo number_format($row['pet_taxi']); ?>"><br>
                Asisten: <input type="text" name="asisten" value="<?php echo number_format($row['asisten']); ?>"><br>
                Emergency: <input type="text" name="emergency" value="<?php echo number_format($row['emergency']); ?>"><br>
                Lain lain: <input type="text" name="lain_lain" value="<?php echo number_format($row['lain_lain']); ?>"><br>
                Cash Bond: <input type="text" name="cash_bond" value="<?php echo number_format($row['cash_bond']); ?>"><br>
                Potongan: <input type="text" name="potongan" value="<?php echo number_format($row['potongan']); ?>"><br>
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
</html>