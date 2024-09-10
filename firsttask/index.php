<!DOCTYPE html>
<html>
<head>
    <title>Menampilkan Grade Dari Nilai</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            max-width: 400px;
            width: 100%;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            font-size: 14px;
            color: #555;
        }

        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0 20px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .button-group {
            display: flex;
            justify-content: space-between;
        }

        input[type="submit"], input[type="reset"] {
            background-color: #007BFF;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 48%;
        }

        input[type="submit"]:hover, input[type="reset"]:hover {
            background-color: #0056b3;
        }

        #output {
            margin-top: 20px;
            text-align: center;
            font-size: 16px;
        }

        p {
            color: red;
        }

        h3 {
            color: #28a745;
        }
        h4 {
            color: #808080
        }
    </style>
    <script>
        function resetOutput() {
            document.getElementById('output').innerHTML = '';
        }
    </script>
</head>
<body>

<div class="container">
    <h2>Formulir Menampilkan Grade Dari Nilai Rata Rata</h2>
    <h4>Silahkan Isi Formulir Sesuai Petunjuk</h4>
    <form action="" method="post" onreset="resetOutput()">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" required>

        <label for="nim">NIM:</label>
        <input type="number" name="nim" required>

        <label for="nilai">Nilai:</label>
        <input type="number" name="nilai" min="0" max="100" required>

        <div class="button-group">
            <input type="reset" value="Reset">
            <input type="submit" name="submit" value="Submit">
        </div>
    </form>

    <div id="output">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['nama']) && isset($_POST['nim']) && isset($_POST['nilai'])) {
                $nama = $_POST['nama'];
                $nim = $_POST['nim'];
                $nilai = $_POST['nilai'];

                if (!is_numeric($nim)) {
                    echo "<p>NIM harus berupa angka.</p>";
                } elseif (strlen($nim) != 10) {
                    echo "<p>NIM harus berjumlah 10 karakter.</p>";
                } else {
                    $grade = "";

                    if ($nilai >= 85 && $nilai <= 100) {
                        $grade = "A";
                    } elseif ($nilai >= 80 && $nilai < 85) {
                        $grade = "B+";
                    } elseif ($nilai >= 75 && $nilai < 80) {
                        $grade = "B";
                    } elseif ($nilai >= 70 && $nilai < 75) {
                        $grade = "B-";
                    } elseif ($nilai >= 65 && $nilai < 70) {
                        $grade = "C+";
                    } elseif ($nilai >= 60 && $nilai < 65) {
                        $grade = "C";
                    } elseif ($nilai >= 55 && $nilai < 60) {
                        $grade = "C-";
                    } elseif ($nilai >= 50 && $nilai < 55) {
                        $grade = "D+";
                    } elseif ($nilai >= 45 && $nilai < 50) {
                        $grade = "D";
                    } elseif ($nilai >= 0 && $nilai < 45) {
                        $grade = "D-";
                    } else {
                        echo "<p>Nilai harus di antara 0 dan 100.</p>";
                        exit;
                    }

                    echo "<h3>Selamat datang, $nama!</h3>";
                    echo "Nama: " . htmlspecialchars($nama) . "<br>";
                    echo "NIM: " . htmlspecialchars($nim) . "<br>";
                    echo "Nilai: " . htmlspecialchars($nilai) . "<br>";
                    echo "Grade: " . $grade . "<br>";
                }
            } else {
                echo "<p>Semua field harus diisi!</p>";
            }
        }
        ?>
    </div>
</div>

</body>
</html>
