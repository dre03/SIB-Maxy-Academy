<?php
include('koneksi.php');

// Cek apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tangkap data dari form
    $nama = $_POST['nama'];
    $usia = $_POST['usia'];
    $alamat = $_POST['alamat'];
    $pekerjaan = $_POST['pekerjaan'];

    // Query untuk menambahkan data ke database
    $query = "INSERT INTO penduduk (nama, usia, alamat, pekerjaan) VALUES ('$nama', '$usia', '$alamat', '$pekerjaan')";
    
    // Jalankan query
    if(mysqli_query($koneksi, $query)) {
        // Redirect kembali ke halaman utama setelah berhasil menambahkan data
        header("Location: .");
        exit;
    } else {
        // Tampilkan pesan error jika query gagal dieksekusi
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/images/logo.png" type="image/x-icon">
    <title>Spreadsheet</title>

    <link rel="stylesheet" href="assets/vendors/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/boxicons/css/boxicons.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <nav class="navbar py-4 bg-soft-blue">
        <div class="container justify-content-between">
            <a href="." class="logo">
                <img src="assets/images/logo.png" alt="NewsOnlen">
                <span>Penduduk-App</span>
            </a>
        </div>
    </nav>

    <section class="bg-soft-blue">
        <div class="container">
            <div class="d-flex justify-content-between">
                <div class="d-flex align-items-center justify-content-start mb-3">
                    <form action="" method="GET" class="d-flex gap-3">
                        <input type="text" name="keyword" class="form-control" placeholder="Cari...">
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </form>
                </div>
                <div class="d-flex align-items-center justify-content-end gap-2 mb-3">
                    <a href="tambah-penduduk.html" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#tambahData">Tambah Data</a>
                    <a href="export.php?type=xls" class="btn btn-success">Export Excel (XLS)</a>
                    <a href="export.php?type=xlsx" class="btn btn-success">Export Excel (XLSX)</a>
                    <a href="export.php?type=csv" class="btn btn-warning">Export CSV</a>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr class="text-center">
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Usia</th>
                                    <th>Alamat</th>
                                    <th>Pekerjaan</th>
                                    <!-- <th>Aksi</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include('koneksi.php');
                                
                                // Query untuk menampilkan data penduduk
                                $query = "SELECT * FROM penduduk";
                                $result = mysqli_query($koneksi, $query);

                                // Tentukan kata kunci pencarian
                                $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

                                // Query untuk menampilkan data penduduk sesuai dengan kata kunci pencarian
                                $query = "SELECT * FROM penduduk WHERE
                                            nama LIKE '%$keyword%' OR
                                            usia LIKE '%$keyword%' OR
                                            alamat LIKE '%$keyword%' OR
                                            pekerjaan LIKE '%$keyword%'";

                                $result = mysqli_query($koneksi, $query);

                                // Periksa apakah ada data
                                if (mysqli_num_rows($result) > 0) {
                                    // Lakukan iterasi dan tampilkan data
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr class='align-middle text-center'>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['nama'] . "</td>";
                                        echo "<td>" . $row['usia'] . "</td>";
                                        echo "<td>" . $row['alamat'] . "</td>";
                                        echo "<td>" . $row['pekerjaan'] . "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='6' class='text-center'>Tidak ada data penduduk.</td></tr>";
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="tambahData" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="tambahData">Tambah Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="" class="row g-3 needs-validation" novalidate>
                        <div class="col-md-6 position-relative">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="col-md-6 position-relative">
                            <label for="usia" class="form-label">Usia</label>
                            <input type="number" class="form-control" id="usia" name="usia" required>
                        </div>
                        <div class="col-md-6 position-relative">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" required>
                        </div>
                        <div class="col-md-6 position-relative">
                            <label for="pekerjaan" class="form-label">Pekerjaan</label>
                            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" required>
                        </div>
                        <div class="col-12 d-flex justify-content-center">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer class="py-5">
        <div class="container">
            <div class="d-flex flex-column flex-md-row align-items-center justify-content-between gap-3">
                <p class="mb-0 fs-7 text-secondary">
                    &copy; 2024 Andre Apriayana
                </p>
                <a href="https://mayx.academy" class="mb-0 fs-7 link">
                    2024 Maxy Academy
                </a>
            </div>
        </div>
    </footer>

    <script src="assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
