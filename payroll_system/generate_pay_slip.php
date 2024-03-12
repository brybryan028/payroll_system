<!DOCTYPE html>
<html>
<head>
    <title>Pay Slip</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 10px;
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
        h3 {
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }
        em {
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
        .company-logo {
            display: flex; /* Make the container a flexbox */
            justify-content: center; /* Align elements horizontally in the center */
            align-items: center;
        }
    </style>
</head>
<body>
    <div class="pay-slip">
    <img class="company-logo" src="upload/waras_satwa_logo.png">
        <h3>Slip Gaji Waras Satwa</h3>
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
            
            // Calculate total penghasilan
            $penghasilan = $row['gaji_pokok'] + $row['bonus_kinerja'] + $row['uang_makan'] + $row['tunjangan'] + $row['pulsa'] + $row['bensin'] + $row['operasi'] + $row['grooming'] + $row['jaga_malam'] + $row['pet_taxi'] + $row['asisten'] + $row['emergency'] + $row['lain_lain'];

            // Calculate total potongan
            $potongan = $row['cash_bond'] - $row['potongan'];

            // Generate pay slip
            echo "<p>Nama: " . $row['nama'] . "</p>";
            echo "Tanggal: ";
            echo date("d-m-Y");
            echo "<br>__________________________________________________________________<br>";
            echo "<p style='margin-top: 10px;'>1. Penghasilan";
            if ($row['gaji_pokok'] == '0') {   
            } else {
            echo "<p>Gaji Pokok: RP " . number_format($row['gaji_pokok'], 0) . "</p>";
            }
            if ($row['bonus_kinerja'] == '0') {   
            } else {
            echo "<p>Bonus Kinerja: RP " . number_format($row['bonus_kinerja'], 0) . "</p>";
            }
            if ($row['uang_makan'] == '0') {   
            } else {
            echo "<p>Uang Makan: RP " . number_format($row['uang_makan'], 0) . "</p>";
            }
            if ($row['tunjangan'] == '0') {   
            } else {
            echo "<p>Tunjangan: RP " . number_format($row['tunjangan'], 0) . "</p>";
            }
            if ($row['pulsa'] == '0') {   
            } else {
            echo "<p>Pulsa: RP " . number_format($row['pulsa'], 0). "</p>";
            }
            if ($row['bensin'] == '0') {   
            } else {
            echo "<p>Bensin: RP " . number_format($row['bensin'], 0) . "</p>";
            }
            if ($row['operasi'] == '0') {   
            } else {
            echo "<p>Operasi: RP " . number_format($row['operasi'], 0) . "</p>";
            }
            if ($row['grooming'] == '0') {   
            } else {
            echo "<p>Grooming: RP " . number_format($row['grooming'], 0) . "</p>";
            }
            if ($row['jaga_malam'] == '0') {   
            } else {
            echo "<p>Jaga Malam: RP " . number_format($row['jaga_malam'], 0) . "</p>";
            }
            if ($row['pet_taxi'] == '0') {   
            } else {
            echo "<p>Pet Taxi: RP " . number_format($row['pet_taxi'], 0) . "</p>";
            }
            if ($row['asisten'] == '0') {   
            } else {
            echo "<p>Asisten: RP " . number_format($row['asisten'], 0) . "</p>";
            }
            if ($row['emergency'] == '0') {   
            } else {
            echo "<p>Emergency: RP " . number_format($row['emergency'], 0) . "</p>";
            }
            if ($row['lain_lain'] == '0') {   
            } else {
            echo "<p style='margin-bottom: 20px;'>Lain lain: RP " . number_format($row['lain_lain'], 0) . "</p>";
            }
            echo "<strong>TOTAL PENGHASILAN: RP " . number_format($penghasilan, 0) . "</strong>";
            if ($row['cash_bond'] === '0' && $row['potongan'] === 0) {
            } else {
            echo "<p style='margin-top: 20px;'>2. Potongan<br></p>";
            }
            if ($row['cash_bond'] == '0') {   
            } else {
            echo "<p>Cash Bond: RP " . number_format($row['cash_bond'], 0) . "</p>";
            }
            if ($row['potongan'] == '0') {   
            } else {
            echo "<p style='margin-bottom: 20px;'>Potongan: RP   " . number_format($row['potongan'], 0) . "</p>";
            }
            echo "<strong>TOTAL POTONGAN: RP " . number_format($potongan, 0) . "<br></strong>";

            // Similar for other fields
            echo "<p style='margin-top: 20px; font-weight: bold;'>TOTAL GAJI: RP " . number_format($total_salary, 0) . "</strong>";
            echo "<p style='text-align: center;'> This is a computer-generated document. No signature is required";
        }
        $conn->close();
        ?>
    </div>
    <div class="print-button">
            <button onclick="window.print()">Print Pay Slip</button>
        </div>
</body>
</html>
