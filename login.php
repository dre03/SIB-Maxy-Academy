<?php
require_once 'koneksi.php'; // File functions.php berisi fungsi-fungsi bantuan

session_start();

if (isset($_SESSION["username"])) {
    header("Location: homepage.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validasi form
    if (empty($username) || empty($password)) {
        echo "<script>alert('Password dan Username harus diisi.'); </script>";
        exit();
    }

    // Koneksi ke database
    $conn = db_connect();

    // Ambil data dari database
    $sql = "SELECT * FROM users WHERE username=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            $_SESSION["username"] = $username;
			 echo "<script>alert('Login berhasil. Selamat datang, " . $username . "');</script>";
            header("Location: homepage.php");
            exit();
        } else {
            echo "<script>
            	alert('Password salah');
            </script>";
        }
    } else {
        echo "<script>
        	alert('Username tidak ditemukan.');
        </script>";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="assets/images/homespot.png" type="image/x-icon">
	<title>Login</title>

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

						<h5 class="text-dark fw-bold mb-4">Sign In</h5>
						<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
							<div class="mb-3">
								<label for="username" class="mb-1">Username</label>
								<input type="username" name="username" class="form-control"
									placeholder="Masukan username" required autofocus>
							</div>
							<div class="mb-3">
								<label for="password" class="mb-1">Password</label>
								<input type="password" name="password" class="form-control"
									placeholder="Masukkan password" required>
							</div>
							<button class="btn btn-primary d-block w-100" type="submit">Sign In</button>
							<p class="mb-0 mt-2 text-secondary text-center">
								Belum Memiliki Akun? <a href="register.php"
									class="text-decoration-underline text-primary">Daftar</a>
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
