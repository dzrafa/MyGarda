<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$id = $_POST['id'];
$Status = $_POST['Status_Antrian'];
$Waktu_Perkiraan = $_POST['Waktu_Perkiraan_Pelayanan'];

 
// update data ke database
mysqli_query($conn,"UPDATE antrian SET `Waktu_Perkiraan_Pelayanan`='$Waktu_Perkiraan',`Status_Antrian`='$Status' WHERE ID_Antrian='$id'");
 
// mengalihkan halaman kembali ke CRUD Admin.php
header("location:CRUD Admin.php");
 
?>