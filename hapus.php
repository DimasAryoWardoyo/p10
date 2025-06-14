<?php
include 'conn.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $koneksi->query("DELETE FROM mahasiswa WHERE id=$id");
}

header('Location: index.php');
exit();
