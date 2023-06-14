<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$Nomor_Antrian = $_POST['Nomor_Antrian'];
$Waktu_Masuk = $_POST['Waktu_Masuk'];
$ID_Pelanggan = $_POST['ID_Pelanggan'];
 
// menginput data ke database
mysqli_query($conn,"INSERT INTO `antrian`(`ID_Antrian`, `Nomor_Antrian`, `Waktu_Masuk`, `ID_Pelanggan`) VALUES ('','$Nomor_Antrian','$Waktu_Masuk','$ID_Pelanggan')");
 
// mengalihkan halaman kembali ke CRUD Admin.php
header("location:CRUD Admin.php");
 
?>