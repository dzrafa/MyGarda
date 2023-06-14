<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data id yang di kirim dari url
$id = $_GET['id'];
 
 
// menghapus data dari database
mysqli_query($conn,"DELETE FROM antrian WHERE ID_Antrian='$id'");
 
// mengalihkan halaman kembali ke CRUD Admin.php
header("location:CRUD Admin.php");
 
?>