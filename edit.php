<?php
include 'conn.php';

$id = $_GET['id'];
$data = $koneksi->query("SELECT * FROM mahasiswa WHERE id = $id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama_lengkap'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $hobi = isset($_POST['hobi']) ? implode(',', $_POST['hobi']) : '';
    $alamat = $_POST['alamat'];

    $sql = "UPDATE mahasiswa SET nama_lengkap='$nama', jenis_kelamin='$jenis_kelamin', hobi='$hobi', alamat='$alamat' WHERE id=$id";
    if ($koneksi->query($sql) === true) {
        header('Location: index.php');
        exit();
    } else {
        echo 'Gagal mengupdate data: ' . $koneksi->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-3 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-5">
                <div class="card shadow">
                    <div class="card-header">
                        <h5 class="text-center fw-bold">Edit Data Mahasiswa</h5>
                    </div>
                    <div class="card-body">
                        <p class="text-muted">Edit data mahasiswa sesukai hati kalian.</p>

                        <form method="post">
                            <div class="mb-3">
                                <label>Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" class="form-control"
                                    value="<?= $data['nama_lengkap'] ?>" required>
                            </div>
                            <div class="mb-3">
                                <label>Jenis Kelamin</label><br>
                                <input type="radio" name="jenis_kelamin" value="Laki-laki"
                                    <?= $data['jenis_kelamin'] == 'Laki-laki' ? 'checked' : '' ?>> Laki-laki
                                <input type="radio" name="jenis_kelamin" value="Perempuan"
                                    <?= $data['jenis_kelamin'] == 'Perempuan' ? 'checked' : '' ?>> Perempuan
                            </div>
                            <div class="mb-3">
                                <label>Hobi</label><br>
                                <?php
                                $listHobi = ['Membaca', 'Menulis', 'Olahraga', 'Musik'];
                                $hobiTerpilih = explode(',', $data['hobi']);
                                foreach ($listHobi as $hobi) {
                                    $checked = in_array($hobi, $hobiTerpilih) ? 'checked' : '';
                                    echo "<input type='checkbox' name='hobi[]' value='$hobi' $checked> $hobi ";
                                }
                                ?>
                            </div>
                            <div class="mb-3">
                                <label>Alamat</label>
                                <textarea name="alamat" class="form-control" required><?= $data['alamat'] ?></textarea>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
