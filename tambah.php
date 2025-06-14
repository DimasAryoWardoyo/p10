<?php
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama_lengkap'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $hobi = isset($_POST['hobi']) ? implode(',', $_POST['hobi']) : '';
    $alamat = $_POST['alamat'];

    $sql = "INSERT INTO mahasiswa (nama_lengkap, jenis_kelamin, hobi, alamat) 
            VALUES ('$nama', '$jenis_kelamin', '$hobi', '$alamat')";

    if ($koneksi->query($sql) === true) {
        header('Location: index.php');
        exit();
    } else {
        echo 'Gagal menyimpan data: ' . $koneksi->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tambah Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-3 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-5">
                <div class="card shadow">
                    <div class="card-header">
                        <h5 class="text-center fw-bold">Tambahkan Data Mahasiswa</h5>
                    </div>
                    <div class="card-body">
                        <p class="text-muted">Isi form berikut untuk menambahkan data mahasiswa baru.</p>
                        <form method="post">
                            <div class="mb-3">
                                <label>Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Jenis Kelamin</label><br>
                                <input type="radio" name="jenis_kelamin" value="Laki-laki" required> Laki-laki
                                <input type="radio" name="jenis_kelamin" value="Perempuan" required> Perempuan
                            </div>
                            <div class="mb-3">
                                <label>Hobi</label><br>
                                <?php
                                $listHobi = ['Membaca', 'Menulis', 'Olahraga', 'Musik'];
                                foreach ($listHobi as $hobi) {
                                    echo "<input type='checkbox' name='hobi[]' value='$hobi'> $hobi ";
                                }
                                ?>
                            </div>
                            <div class="mb-3">
                                <label>Alamat</label>
                                <textarea name="alamat" class="form-control" required></textarea>
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="index.php" class="btn btn-danger">Kembali</a>
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
