<?php
include 'db_connect.php'; // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
    
    $sql = "INSERT INTO employees (nama, gaji_pokok, bonus_kinerja, uang_makan, tunjangan, pulsa, bensin, operasi, grooming, jaga_malam, pet_taxi, asisten, emergency, lain_lain, cash_bond, potongan)
    VALUES ('$nama', '$gaji_pokok', '$bonus_kinerja', '$uang_makan', '$tunjangan', '$pulsa', '$bensin', '$operasi', '$grooming', '$jaga_malam', '$pet_taxi', '$asisten', '$emergency', '$lain_lain', '$cash_bond', '$potongan')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header("Location:display_employee.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
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
        }
        form {
            margin-top: 20px;
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
    </style>
</head>
<body>
<a href="http://localhost/payroll_system/index.php">Dashboard</a> <br>
<a href="http://localhost/payroll_system/add_employee.php">Add Employee Information</a> <br>
<a href="http://localhost/payroll_system/display_employee.php">Display Employee Information</a> <br>
<h2>Add Employee</h2>
    <form action="add_employee.php" method="post">
        Nama: <input type="text" name="nama"><br>
        Gaji Pokok: <input type="number" name="gaji_pokok"><br>
        Bonus Kinerja: <input type="number" name="bonus_kinerja"><br>
        Uang Makan: <input type="number" name="uang_makan"><br>
        Tunjangan: <input type="number" name="tunjangan"><br>
        Pulsa: <input type="number" name="pulsa"><br>
        Bensin: <input type="number" name="bensin"><br>
        Operasi: <input type="number" name="operasi"><br>
        Grooming: <input type="number" name="grooming"><br>
        Jaga Malam: <input type="number" name="jaga_malam"><br>
        Pet Taxi: <input type="number" name="pet_taxi"><br>
        Asisten: <input type="number" name="asisten"><br>
        Emergency: <input type="number" name="emergency"><br>
        Lain lain: <input type="number" name="lain_lain"><br>
        Cash Bond: <input type="number" name="cash_bond"><br>
        Potongan: <input type="number" name="potongan"><br>
        <input type="submit" value="Add Employee">
    </form>
</body>
</html>