<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["logout"])) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/images/homespot.png" type="image/x-icon">
    <title>Homespot</title>

    <link rel="stylesheet" href="assets/vendors/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/boxicons/css/boxicons.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <nav class="navbar py-4 bg-soft-blue">
        <div class="container justify-content-between">
            <a href="." class="logo">
                <img src="assets/images/homespot.png" alt="NewsOnlen">
                <span>Homespot</span>
            </a>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <input type="submit" class="btn btn-primary" name="logout" value="Logout">
            </form>
        </div>
    </nav>

    <section class="bg-soft-blue">
        <div class="container">
            <h1 class="text-dark fw-bold">Selamat Datang, <?php echo $_SESSION["username"]; ?> </h1>
            <p class="mb-0 text-secondary">Rekomendasi pilihan kami untukmu. Dari rumah minimalis, ruko strategis,
                sampai apartemen modern semua tersedia.</p>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <a href="detail.html" class="article">
                        <img src="https://events.rumah123.com/wp-content/uploads/sites/38/2021/07/14133733/Kota-Baru-Parahyangan.jpg"
                            alt="Article 1" class="rounded-3 mb-3">
                        <h3>
                            Go Home Residence merupakan perumahan yang memiliki tempat strategis nyaman untuk keluarga
                        </h3>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="detail.html" class="article">
                        <img src="https://i0.wp.com/www.emporioarchitect.com/upload/portofolio/desain-rumah-modern-4-lantai-89180821-19889436180821101556-5.jpg"
                            alt="Article 1" class="rounded-3 mb-3">
                        <h3>
                            Hunian Strategis Berada di Pusat Kota Purwokerto untuk masyarakat dengan gaya hidup modern.
                        </h3>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="detail.html" class="article">
                        <img src="https://lh3.googleusercontent.com/lW9hTfH0XpMrOgji5KobE3vvV_0Hhhkh9hrlKEu-4MWf-dMnoiJ5QeLfh2ccbZ2lCF5dmDhPpMRBnubbSlKVfa3hv9uVyNu-HpNlDMlhdEpEFHVm2srtMkZx1E0QPwXMEV2Q7SuLrLsllJSHfF3h_cVHL7rjrDUH68L-SznCB6GWvaEs1NFKbWqSsUawDrrjB4soc60KnA"
                            alt="Article 1" class="rounded-3 mb-3">
                        <h3>
                            Graha Permata Wiradadi adalah persembahan dari ‘Graha Permata Group’ untuk masyarakat
                        </h3>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="detail.html" class="article">
                        <img src="https://static.wixstatic.com/media/a7d241_3670738216284b54a8bfbc59eb3abb49~mv2_d_2817_1891_s_2.jpg/v1/fit/w_1000%2Ch_1000%2Cal_c%2Cq_80,enc_auto/file.jpg"
                            alt="Article 1" class="rounded-3 mb-3">
                        <h3>
                            Rumah nyaman berkonsep jepang modern & minimalis. Free 1 Unit AC 1/2PK, 1 smartdoor lock.
                        </h3>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="detail.html" class="article">
                        <img src="https://i0.wp.com/www.emporioarchitect.com/img/blog/desain-rumah-mewah-dan-modern-terbaru-090222012759765111.jpg"
                            alt="Article 1" class="rounded-3 mb-3">
                        <h3>
                            Go Home Residence merupakan perumahan yang memiliki tempat strategis nyaman untuk keluarga
                        </h3>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <footer class="py-5">
        <div class="container">
            <div class="d-flex flex-column flex-md-row align-items-center justify-content-between gap-3">
                <p class="mb-0 fs-7 text-secondary">
                    &copy; 2024 Homespot <br>
                    Andre Apriyana
                </p>
                <a href="https://www.homespot.id" class="mb-0 fs-7 link">
                    Homespot / About
                </a>
            </div>
        </div>
    </footer>

    <script src="assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>