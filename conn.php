<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "crud_mhs_5755";

$koneksi = new mysqli($host, $user, $password, $database);

// Cek koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>