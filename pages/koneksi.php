<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "pos_shop";

$con = mysqli_connect($hostname, $username, $password, $database);

if (!$con) {
    die("Koneksi gagal: ". mysqli_connect_error());
}
// echo "Koneksi Berhasil";
?>