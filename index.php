<?php
include 'conn.php';

$sql = 'SELECT * FROM mahasiswa';
$result = $koneksi->query($sql);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="col-lg-8 mx-auto mb-4 text-center">
                    <h2 class="mb-4 fw-bold">Aplikasi CRUD Mahasiswa</h2>
                    <h6>Dimas Aryo Wardoyo <span class="badge text-dark">23.11.5755</span></h6>
                </div>

                <div class="card shadow-sm border-0">
                    <div class="card-header bg-light d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Daftar Mahasiswa</h5>
                        <a href="tambah.php" class="btn btn-warning btn-sm">+ Tambah Data</a>
                    </div>

                    <div class="card-body">
                        <p class="text-muted">Kelola data mahasiswa dengan
                            mudah.</p>

                        <table class="table table-bordered table-striped mt-3">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" class="text-center">No</th>
                                    <th scope="col" class="text-center">Nama</th>
                                    <th scope="col" class="text-center">Jenis Kelamin</th>
                                    <th scope="col" class="text-center">Hobi</th>
                                    <th scope="col" class="text-center">Alamat</th>
                                    <th scope="col" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<tr>';
                                        echo "<td>$no</td>";
                                        echo "<td>{$row['nama_lengkap']}</td>";
                                        echo "<td>{$row['jenis_kelamin']}</td>";
                                        echo "<td>{$row['hobi']}</td>";
                                        echo "<td>{$row['alamat']}</td>";
                                        echo "<td>
                                                                                                                                                                                                                <a href='edit.php?id={$row['id']}' class='btn btn-sm btn-primary me-1'>Edit</a>
                                                                                                                                                                                                                <a href='hapus.php?id={$row['id']}' class='btn btn-sm btn-danger' onclick=\"return confirm('Yakin ingin menghapus?')\">Hapus</a>
                                                                                                                                                                                                              </td>";
                                        echo '</tr>';
                                        $no++;
                                    }
                                } else {
                                    echo "<tr><td colspan='6' class='text-center text-muted'>Belum ada data</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
