<?php
//Koneksi Database
$server = "localhost";
$user = "admin";
$password = "admin";
$database = "db_karyawan";

//Buat Koneksi
$conn = mysqli_connect($server, $user, $password, $database) or die(mysqli_error($conn));
?>