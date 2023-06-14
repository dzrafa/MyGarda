<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mygarda";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Ambil data antrian dari tabel "antrian"
$sql = "SELECT ID_Antrian, Nomor_Antrian, Status_Antrian, Waktu_Perkiraan_Pelayanan FROM antrian";
$result = mysqli_query($conn, $sql);

// Format data dalam bentuk array asosiatif
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

// Mengirimkan respons dalam format JSON
header('Content-Type: application/json');
echo json_encode($data);

// Menutup koneksi ke database
mysqli_close($conn);
?>
