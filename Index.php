<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Tugas PHP</title>
</head>
<body>
    <h2>Form Input Tugas PHP</h2>
    <form action="" method="POST">
        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama" required><br><br>

        <label for="tanggal_lahir">Tanggal Lahir:</label><br>
        <input type="date" id="tanggal_lahir" name="tanggal_lahir" required><br><br>

        <label for="pekerjaan">Pekerjaan:</label><br>
        <select id="pekerjaan" name="pekerjaan">
            <option value="Manager">Manager</option>
            <option value="Programmer">Programmer</option>
            <option value="Guru">Guru</option>
            <option value="Dokter">Dokter</option>
        </select><br><br>

        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    if(isset($_POST['submit'])){
        $nama = $_POST['nama'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $pekerjaan = $_POST['pekerjaan'];
        
        // Menghitung umur
        $tanggal_lahir_obj = new DateTime($tanggal_lahir);
        $hari_ini = new DateTime();
        $umur = $hari_ini->diff($tanggal_lahir_obj)->y;
        
        // Menentukan gaji berdasarkan pekerjaan
        $gaji = 0;
        switch($pekerjaan) {
            case 'Manager':
                $gaji = 15000000;
                break;
            case 'Programmer':
                $gaji = 10000000;
                break;
            case 'Guru':
                $gaji = 8000000;
                break;
            case 'Dokter':
                $gaji = 20000000;
                break;
        }

        // Menampilkan hasil
        echo "<h3>Output:</h3>";
        echo "Nama: " . htmlspecialchars($nama) . "<br>";
        echo "Umur: " . $umur . " tahun<br>";
        echo "Pekerjaan: " . $pekerjaan . "<br>";
        echo "Gaji: Rp " . number_format($gaji, 0, ',', '.') . "<br>";
    }
    ?>
</body>
</html>