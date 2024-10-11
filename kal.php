<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator dengan Bintang Bilangan Prima</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f5;
            padding: 20px;
        }

        h1, h2 {
            text-align: center;
            color: #333;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            max-width: 400px;
            margin: 0 auto;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="number"], select, button {
            width: 95%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #28a745;
            color: white;
            font-weight: bold;
        }

        .bintang {
            text-align: center;
            font-family: monospace;
            white-space: pre;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Kalkulator Sederhana </h1>
    <form method="post">
        <label for="angka1">Masukkan angka pertama:</label>
        <input type="number" name="angka1" required>

        <label for="angka2">Masukkan angka kedua:</label>
        <input type="number" name="angka2" required>

        <label for="operator">Pilih Operator:</label>
        <select name="operator">
            <option value="tambah">Penjumlahan (+)</option>
            <option value="kurang">Pengurangan (-)</option>
            <option value="kali">Perkalian (*)</option>
            <option value="bagi">Pembagian (/)</option>
        </select>

        <button type="submit" name="hitung">Hitung</button>
    </form>

    <?php
    if (isset($_POST['hitung'])) {
        $angka1 = $_POST['angka1'];
        $angka2 = $_POST['angka2'];
        $operator = $_POST['operator'];
        $hasil = 0;

        // Operasi kalkulator
        switch ($operator) {
            case 'tambah':
                $hasil = $angka1 + $angka2;
                break;
            case 'kurang':
                $hasil = $angka1 - $angka2;
                break;
            case 'kali':
                $hasil = $angka1 * $angka2;
                break;
            case 'bagi':
                if ($angka2 != 0) {
                    $hasil = $angka1 / $angka2;
                } else {
                    echo "<h2>Pembagian dengan nol tidak diperbolehkan.</h2>";
                    exit;
                }
                break;
        }

        echo "<h2>Hasil: $hasil</h2>";
        tampilkanBintang($hasil);
    }

    // Fungsi untuk memeriksa apakah sebuah angka adalah bilangan prima
    function isPrime($num) {
        if ($num <= 1) return false;
        for ($i = 2; $i <= sqrt($num); $i++) {
            if ($num % $i == 0) return false;
        }
        return true;
    }

    // Fungsi untuk mendapatkan bilangan prima terdekat yang lebih besar atau sama dengan hasil
    function nextPrime($num) {
        while (!isPrime($num)) {
            $num++;
        }
        return $num;
    }

    // Fungsi untuk menampilkan bintang berdasarkan bilangan prima
    function tampilkanBintang($hasil) {
        $prima = nextPrime($hasil);
        echo "<div class='bintang'>";

        for ($i = 1; $i <= $prima; $i++) {
            echo str_repeat('*', $i) . "<br>";
        }

        echo "</div>";
    }
    ?>
</body>
</html>
