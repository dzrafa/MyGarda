<?php
// Ambil data formulir
$layanan = $_POST['layanan'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$telepon = $_POST['telepon'];

// Persiapkan pernyataan SQL
$stmt = $conn->prepare("INSERT INTO pelanggan (layanan, nama, email, telepon) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $layanan, $nama, $email, $telepon);

// Jalankan pernyataan SQL
if ($stmt->execute()) {
    // Data berhasil dimasukkan
    echo "Pendaftaran berhasil!";
} else {
    // Terjadi kesalahan saat memasukkan data
    echo "Error: " . $stmt->error;
}

// Tutup pernyataan dan koneksi database
$stmt->close();
$conn->close();
?>
