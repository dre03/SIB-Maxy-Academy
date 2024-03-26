<?php
require_once 'koneksi.php'; // File functions.php berisi fungsi-fungsi bantuan

session_start();

if (isset($_SESSION["username"])) {
    header("Location: homepage.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validasi form
    if (empty($username) || empty($nama) || empty($email) || empty($password) || empty($confirm_password)) {
        echo "<script>alert('Semua kolom harus diisi.');</script>";
    } elseif ($password != $confirm_password) {
        echo "<script>alert('Password dan konfirmasi password tidak cocok.');</script>";
    } else {
        // Koneksi ke database
        $conn = db_connect();

        // Cek apakah username sudah ada
        $sql_username_check = "SELECT * FROM users WHERE username=?";
        $stmt_username_check = mysqli_prepare($conn, $sql_username_check);
        mysqli_stmt_bind_param($stmt_username_check, "s", $username);
        mysqli_stmt_execute($stmt_username_check);
        $result_username_check = mysqli_stmt_get_result($stmt_username_check);

        // Cek apakah email sudah ada
        $sql_email_check = "SELECT * FROM users WHERE email=?";
        $stmt_email_check = mysqli_prepare($conn, $sql_email_check);
        mysqli_stmt_bind_param($stmt_email_check, "s", $email);
        mysqli_stmt_execute($stmt_email_check);
        $result_email_check = mysqli_stmt_get_result($stmt_email_check);

        if (mysqli_num_rows($result_username_check) > 0) {
            echo "<script>alert('Username sudah digunakan. Silakan gunakan username lain.');</script>";
        } elseif (mysqli_num_rows($result_email_check) > 0) {
            echo "<script>alert('Email sudah digunakan. Silakan gunakan email lain.');</script>";
        } else {
            // Hashing password menggunakan Argon2
            $hashed_password = password_hash($password, PASSWORD_ARGON2ID);

            // Insert data ke database
            $sql_insert = "INSERT INTO users (username, nama, email, password) VALUES (?, ?, ?, ?)";
            $stmt_insert = mysqli_prepare($conn, $sql_insert);
            mysqli_stmt_bind_param($stmt_insert, "ssss", $username, $nama, $email, $hashed_password);

            if (mysqli_stmt_execute($stmt_insert)) {
                echo "<script>alert('Akun berhasil dibuat. Silakan login.');</script>";
            } else {
                echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
            }

            mysqli_stmt_close($stmt_insert);
        }

        mysqli_close($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/images/logo.png" type="image/x-icon">
    <title>Daftar</title>

    <link rel="stylesheet" href="assets/vendors/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/boxicons/css/boxicons.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="bg-soft-blue">
    <div class="container">
        <div class="row align-items-center justify-content-center py-5" style="min-height: 100vh">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <a href="." class="logo mb-4">
                            <img src="assets/images/homespot.png" alt="Logo">
                            <span>Homespot</span>
                        </a>

                        <h5 class="text-dark fw-bold mb-4">Sign Up</h5>
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <div class="mb-3">
                                <label for="username" class="mb-1">Username</label>
                                <input type="text" name="username" class="form-control" placeholder="Masukan username"
                                    required autofocus>
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="mb-1">Nama</label>
                                <input type="text" name="nama" class="form-control" placeholder="Masukan nama" required
                                    autofocus>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="mb-1">Alamat Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Masukan email"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="mb-1">Password</label>
                                <input type="password" name="password" class="form-control"
                                    placeholder="Masukkan password" required>
                            </div>
                            <div class="mb-3">
                                <label for="confirm_password" class="mb-1">Konfirmasi Password</label>
                                <input type="password" name="confirm_password" class="form-control"
                                    placeholder="Konfirmasi password" required>
                            </div>
                            <button class="btn btn-primary d-block w-100" type="submit">Sign Up</button>
                            <p class="mb-0 mt-2 text-secondary text-center">
                                Sudah Memiliki Akun? <a href="login.php"
                                    class="text-decoration-underline text-primary">Masuk</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
