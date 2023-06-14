<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mygarda";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Proses pendaftaran jika ada data yang dikirim melalui form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ID_Layanan = $_POST['layanan'];
    $Nama = $_POST['nama'];
    $Alamat = $_POST['alamat'];
    $No_Telepon = $_POST['telepon'];

    // Validasi nomor telepon
    if (!is_numeric($No_Telepon)) {
        echo "Nomor telepon harus berupa angka.";
        exit();
    }

    // Pastikan semua field diisi
    if (empty($ID_Layanan) || empty($Nama) || empty($Alamat) || empty($No_Telepon)) {
        echo "Semua field harus diisi.";
        exit();
    }

    // Persiapkan pernyataan SQL untuk memasukkan data ke tabel "pelanggan"
    $stmt = $conn->prepare("INSERT INTO pelanggan (ID_Layanan, Nama, Alamat, No_Telepon) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $ID_Layanan, $Nama, $Alamat, $No_Telepon);

    // Jalankan pernyataan SQL
    if ($stmt->execute()) {
        // Ambil ID_Pelanggan yang baru ditambahkan
        $ID_Pelanggan = $stmt->insert_id;

        // Persiapkan pernyataan SQL untuk memasukkan data ke tabel "antrian"
        $stmt_antrian = $conn->prepare("INSERT INTO antrian (ID_Pelanggan) VALUES (?)");
        $stmt_antrian->bind_param("s", $ID_Pelanggan);

        // Jalankan pernyataan SQL untuk memasukkan data ke tabel "antrian"
        if ($stmt_antrian->execute()) {
            // Pendaftaran berhasil, arahkan ke halaman CRUD Admin.php
            header("Location: CRUD Admin.php");
            exit();
        } else {
            // Terjadi kesalahan saat memasukkan data ke tabel "antrian"
            echo "Error: " . $stmt_antrian->error;
        }

        // Tutup pernyataan SQL untuk memasukkan data ke tabel "antrian"
        $stmt_antrian->close();
    } else {
        // Terjadi kesalahan saat memasukkan data ke tabel "pelanggan"
        echo "Error: " . $stmt->error;
    }

    // Tutup pernyataan SQL untuk memasukkan data ke tabel "pelanggan"
    $stmt->close();
}

// Ambil data dari tabel layanan
$sql = "SELECT * FROM layanan";
$result = $conn->query($sql);

// Tutup koneksi
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order | MyGarda</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 10px;
        }

        select,
        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            margin-bottom: 15px;
        }

        textarea {
            resize: vertical;
        }

        .btn-submit {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #4caf50;
            color: #fff;
            text-align: center;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .btn-submit:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Pemesanan</h1>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <label for="layanan">Layanan:</label>
            <select name="layanan" id="layanan">
                <option value="">Pilih Layanan</option>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['ID_Layanan'] . "'>" . $row['Jenis_Layanan'] . "</option>";
                    }
                }
                ?>
            </select>

            <label for="nama">Nama:</label>
            <input type="text" name="nama" id="nama" required>

            <label for="alamat">Alamat:</label>
            <textarea name="alamat" id="alamat" rows="3" required></textarea>

            <label for="telepon">Nomor Telepon:</label>
            <input type="text" name="telepon" id="telepon" required>

            <input type="submit" class="btn-submit" value="Daftar">
        </form>
    </div>
</body>
</html>
