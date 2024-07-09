<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Bebas</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        
        table {
            width: 50%;
            border-collapse: collapse;
        }
        
        table, th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: left;
        }
        
        th {
            background-color: #f2f2f2;
        }
        h2 {
            text-align: center;
            color: #020000;
            margin-bottom: 20px;
        }
        .message {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Formulir Masukkan Nilai</h2>
    <table>
        <form action="" method="post">
            <tr>
                <th><label for="name">Nama:</label></th>
                <td><input type="text" id="name" name="name" required></td>
            </tr>
            <tr>
                <th><label for="nim">NIM:</label></th>
                <td><input type="text" id="nim" name="nim" maxlength="10" required></td>
            </tr>
            <tr>
                <th><label for="email">Email:</label></th>
                <td><input type="email" id="email" name="email" required></td>
            </tr>
            <tr>
                <th><label for="nilai">Masukkan Nilai (opsional):</label></th>
                <td><input type="number" id="nilai" name="nilai"></td>
            </tr>
            <tr>
                <th><label for="tanggal">Tanggal (dd/mm/yyyy):</label></th>
                <td><input type="text" id="tanggal" name="tanggal" pattern="\d{1,2}/\d{1,2}/\d{4}" placeholder="dd/mm/yyyy"></td>
            </tr>
            <tr>
                <th><label for="komentar">Komentar:</label></th>
                <td><textarea id="komentar" name="komentar" rows="4" cols="50"></textarea></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:center;"><input type="submit" value="Kirim"></td>
            </tr>
        </form>
    </table>

    <div class="message">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['nim'])) {
            die("Harap lengkapi nama, email, dan NIM untuk melanjutkan.");
        }
        
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $nilai = isset($_POST['nilai']) ? $_POST['nilai'] : null;
        $tanggal = htmlspecialchars($_POST['tanggal']);
        $nim = htmlspecialchars($_POST['nim']);
        $komentar = htmlspecialchars($_POST['komentar']);
        
        // Menentukan status kelulusan
        $status = ($nilai !== null && $nilai > 75) ? 'Lulus' : 'Tidak Lulus';
        
        // Tampilkan data
        echo "<div class='result'>";
        echo "<h2>Data yang Anda Masukkan:</h2>";
        echo "<strong>Nama: </strong>" . htmlspecialchars($name) . "<br>";
        echo "<strong>NIM: </strong>" . htmlspecialchars($nim) . "<br>";
        echo "<strong>Email: </strong>" . htmlspecialchars($email) . "<br>";
        echo "<strong>Nilai: </strong>" . ($nilai !== null ? htmlspecialchars($nilai) : 'Tidak ada nilai yang dimasukkan') . "<br>";
        echo "<strong>Status: </strong>" . htmlspecialchars($status) . "<br>";
        echo "<strong>Tanggal: </strong>" . htmlspecialchars($tanggal) . "<br>";
        echo "<strong>Komentar: </strong>" . htmlspecialchars($komentar) . "<br>";
        echo "</div>";
    } else {
        echo "<h2>Formulir belum dikirim!</h2>";
    }
    ?>
    </div>
</div>
</body>
</html>