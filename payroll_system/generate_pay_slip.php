<!DOCTYPE html>
<html>
<head>
    <title>Pay Slip</title>
    <link rel="icon" type="image/png" href="upload/logo.png">
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
        .flex-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }
        .flex-item-left {
            flex-basis: 50%; /* Take up 50% of the space */
            font-size: 17px;
        }
        .flex-item-right {
            flex-basis: 50%;
            text-align: right; /* Align text to the right */
            font-size: 17px;
        }
        @media print {
            body {
                margin: 0; /* Remove default margin */
                padding: 0; /* Remove default padding */
                font-size: 12px; /* Adjust font size for printing */
            }
            table {
                font-size: 10px; /* Adjust table font size for printing */
            }
            /* Hide non-essential elements */
            a, form {
                display: none;
            }
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
            $potongan = $row['cash_bond'] + $row['potongan'];

            // Generate pay slip
            echo '<p>Nama: ' . $row['nama'] . "</p>";
            echo '<p>Tanggal: ';
            echo date("d-m-Y"); }
            ?>
            <hr style="border: 1px solid #ccc; margin: 20px 0;">
            <p style='margin-top: 10px; text-decoration: underline; font-weight: bold;'>1. Penghasilan</p>
            <?php if ($penghasilan == 0) { ?>
                <p class="flex-item-left"style='margin-bottom: 12px; font-weight: bold; color: red;'>TIDAK ADA PENGHASILAN</p>
            <?php } ?>
            <!-- Gaji Pokok -->
            <?php if ($row['gaji_pokok'] != '0') { ?>
                <div class="flex-container">
                    <div class="flex-item-left">Gaji Pokok:</div>
                    <div class="flex-item-right">Rp <?php echo number_format($row['gaji_pokok'], 0); ?></div>
                </div>
            <?php } ?>
            <!-- Bonus Kinerja -->
            <?php if ($row['bonus_kinerja'] != '0') { ?>
                <div class="flex-container">
                    <div class="flex-item-left">Bonus Kinerja:</div>
                    <div class="flex-item-right">Rp <?php echo number_format($row['bonus_kinerja'], 0); ?></div>
                </div>
            <?php } ?>
            <!-- Uang Makan -->
            <?php if ($row['uang_makan'] != '0') { ?>
                <div class="flex-container">
                    <div class="flex-item-left">Uang Makan:</div>
                    <div class="flex-item-right">Rp <?php echo number_format($row['uang_makan'], 0); ?></div>
                </div>
            <?php } ?>
            <!-- Tunjangan -->
            <?php if ($row['tunjangan'] != '0') { ?>
                <div class="flex-container">
                    <div class="flex-item-left">Tunjangan:</div>
                    <div class="flex-item-right">Rp <?php echo number_format($row['tunjangan'], 0); ?></div>
                </div>
            <?php } ?>
            <!-- Pulsa -->
            <?php if ($row['pulsa'] != '0') { ?>
                <div class="flex-container">
                    <div class="flex-item-left">Pulsa:</div>
                    <div class="flex-item-right">Rp <?php echo number_format($row['pulsa'], 0); ?></div>
                </div>
            <?php } ?>
            <!-- Bensin -->
            <?php if ($row['bensin'] != '0') { ?>
                <div class="flex-container">
                    <div class="flex-item-left">Bensin:</div>
                    <div class="flex-item-right">Rp <?php echo number_format($row['bensin'], 0); ?></div>
                </div>
            <?php } ?>
            <!-- Operasi -->
            <?php if ($row['operasi'] != '0') { ?>
                <div class="flex-container">
                    <div class="flex-item-left">Operasi:</div>
                    <div class="flex-item-right">Rp <?php echo number_format($row['operasi'], 0); ?></div>
                </div>
            <?php } ?>
            <!-- Grooming -->
            <?php if ($row['grooming'] != '0') { ?>
                <div class="flex-container">
                    <div class="flex-item-left">Grooming:</div>
                    <div class="flex-item-right">Rp <?php echo number_format($row['grooming'], 0); ?></div>
                </div>
            <?php } ?>
            <!-- Jaga Malam -->
            <?php if ($row['jaga_malam'] != '0') { ?>
                <div class="flex-container">
                    <div class="flex-item-left">Jaga Malam:</div>
                    <div class="flex-item-right">Rp <?php echo number_format($row['jaga_malam'], 0); ?></div>
                </div>
            <?php } ?>
            <!-- Pet Taxi -->
            <?php if ($row['pet_taxi'] != '0') { ?>
                <div class="flex-container">
                    <div class="flex-item-left">Pet Taxi:</div>
                    <div class="flex-item-right">Rp <?php echo number_format($row['pet_taxi'], 0); ?></div>
                </div>
            <?php } ?>
            <!-- Asisten -->
            <?php if ($row['asisten'] != '0') { ?>
                <div class="flex-container">
                    <div class="flex-item-left">Asisten:</div>
                    <div class="flex-item-right">Rp <?php echo number_format($row['asisten'], 0); ?></div>
                </div>
            <?php } ?>
            <!-- Emergency -->
            <?php if ($row['emergency'] != '0') { ?>
                <div class="flex-container">
                    <div class="flex-item-left">Emergency:</div>
                    <div class="flex-item-right">Rp <?php echo number_format($row['emergency'], 0); ?></div>
                </div>
            <?php } ?>
            <!-- Lain-Lain -->
            <?php if ($row['lain_lain'] != '0') { ?>
                <div class="flex-container">
                    <div class="flex-item-left">Lain-lain:</div>
                    <div class="flex-item-right">Rp <?php echo number_format($row['lain_lain'], 0); ?></div>
                </div>
            <?php } ?>
            <!-- TOTAL PENGHASILAN -->
                <div class="flex-container">
                    <div class="flex-item-left" style="font-weight: bold; font-size: 20px;">TOTAL PENGHASILAN:</div>
                    <div class="flex-item-right" style="font-weight: bold; font-size: 20px;">Rp <?php echo number_format($penghasilan, 0);?></div>
                </div>

            <p style='margin-top: 10px; text-decoration: underline; font-weight: bold;'>2. Potongan</p>
            <?php if ($potongan == 0) { ?>
                <p class="flex-item-left"style='margin-bottom: 12px; font-weight: bold; color: red;'>TIDAK ADA POTONGAN</p>
            <?php } ?>
            <!-- Cash Bond -->
            <?php if ($row['cash_bond'] != '0') { ?>
                <div class="flex-container">
                    <div class="flex-item-left">Cash Bond:</div>
                    <div class="flex-item-right">Rp <?php echo number_format($row['cash_bond'], 0); ?></div>
                </div>
            <?php } ?>
            <!-- Potongan -->
            <?php if ($row['potongan'] != '0') { ?>
                <div class="flex-container">
                    <div class="flex-item-left">Potongan:</div>
                    <div class="flex-item-right">Rp <?php echo number_format($row['potongan'], 0); ?></div>
                </div>
            <?php } ?>
            <!-- TOTAL POTONGAN -->
            <div class="flex-container">
                    <div class="flex-item-left" style="font-weight: bold; font-size: 20px;">TOTAL POTONGAN:</div>
                    <div class="flex-item-right" style="font-weight: bold; font-size: 20px;">Rp <?php echo number_format($potongan, 0);?></div>
                </div>
            <!-- TOTAL GAJI -->
            <div class="flex-container">
                    <div class="flex-item-left" style="font-weight: bold; font-size: 20px;">TOTAL GAJI:</div>
                    <div class="flex-item-right" style="font-weight: bold; font-size: 20px;">Rp <?php echo number_format($total_salary, 0);?></div>
                </div>
 
            <p style='text-align: center;'> This is a computer-generated document. No signature is required</p>
    </div>
    <div class="print-button">
            <button onclick="window.print()">Print Pay Slip</button>
        </div>
</body>
</html>