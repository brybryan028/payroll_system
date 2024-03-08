<!DOCTYPE html>
<html>
<head>
    <title>Pay Slip</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        .pay-slip {
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
            text-align: center;
        }
        p {
            margin-bottom: 10px;
        }
        .print-button {
            text-align: center;
            margin-top: 20px;
        }
        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="pay-slip">
        <h2>Pay Slip</h2>
        <?php
        include 'db_connect.php'; // Include database connection

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $employee_id = $_POST['employee_id'];

            // Fetch employee details
            $sql = "SELECT * FROM employees WHERE id = $employee_id";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();

            // Calculate total salary
            $total_salary = $row['gaji_pokok'] + $row['bonus_kinerja'] + $row['uang_makan'] + $row['tunjangan'] + $row['pulsa'] + $row['bensin'] + $row['operasi'] + $row['grooming'] + $row['jaga_malam'] + $row['pet_taxi'] + $row['asisten'] + $row['emergency'] + $row['lain_lain'] - $row['cash_bond'] - $row['potongan'];

            // Generate pay slip
            echo "<p>Nama: " . $row['nama'] . "</p>";
            echo "<p>Gaji Pokok: RP" . $row['gaji_pokok'] . "</p>";
            echo "<p>Bonus Kinerja: RP" . $row['bonus_kinerja'] . "</p>";
            echo "<p>Uang Makan: RP" . $row['uang_makan'] . "</p>";
            echo "<p>Tunjangan: RP" . $row['tunjangan'] . "</p>";
            echo "<p>Pulsa: RP" . $row['pulsa'] . "</p>";
            echo "<p>Bensin: RP" . $row['bensin'] . "</p>";
            echo "<p>Operasi: RP" . $row['operasi'] . "</p>";
            echo "<p>Grooming: RP" . $row['grooming'] . "</p>";
            echo "<p>Jaga Malam: RP" . $row['jaga_malam'] . "</p>";
            echo "<p>Pet Taxi: RP" . $row['pet_taxi'] . "</p>";
            echo "<p>Asisten: RP" . $row['asisten'] . "</p>";
            echo "<p>Emergency: RP" . $row['emergency'] . "</p>";
            echo "<p>Lain lain: RP" . $row['lain_lain'] . "</p>";
            echo "<p>Cash Bond: RP" . $row['cash_bond'] . "</p>";
            echo "<p>Potongan: RP" . $row['potongan'] . "</p>";

            // Similar for other fields
            echo "<p>Total Salary: RP" . $total_salary . "</p>";
        }
        $conn->close();
        ?>
    </div>
    <div class="print-button">
            <button onclick="window.print()">Print Pay Slip</button>
        </div>
</body>
</html>
