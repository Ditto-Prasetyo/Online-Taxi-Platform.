<?php
session_start();
$_SESSION['page'] = "feedback";
if (!isset($_SESSION['authenticated']) && $_SESSION['role'] == 'admin') {
    header("location: login.php");
    exit;
}
include "connection.php";

$sql = "SELECT id_taxi, merk, model FROM taxi WHERE status = 'Available'";
$result = $koneksi->query($sql);

// Simpan hasil query dalam array
$taxiOptions = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $taxiOptions[] = $row;
    }
} else {
    echo "Tidak ada mobil yang tersedia.";
}

$koneksi->close();

$toggle_active = 'class="active"';
$toggle_active_dashboard = '';
$toggle_active_pesan = '';
$toggle_active_riwayatpemesanan = '';
$toggle_active_profile = '';
$toggle_active_feedback = '';


if ($_SESSION['page'] === 'dashboard') {
    $toggle_active_dashboard = '';
    $toggle_active_pesan = '';
    $toggle_active_riwayatpemesanan = '';
    $toggle_active_profile = '';
    $toggle_active_feedback = '';
} else if ($_SESSION['page'] === 'pesan') {
    $toggle_active_dashboard = '';
    $toggle_active_pesan = '';
    $toggle_active_riwayatpemesanan = '';
    $toggle_active_profile = '';
    $toggle_active_feedback = '';
} else if ($_SESSION['page'] === 'riwayatpemesanan') {
    $toggle_active_dashboard = '';
    $toggle_active_pesan = '';
    $toggle_active_riwayatpemesanan = '';
    $toggle_active_profile = '';
    $toggle_active_feedback = '';
} else if ($_SESSION['page'] === 'profile') {
    $toggle_active_dashboard = '';
    $toggle_active_pesan = '';
    $toggle_active_riwayatpemesanan = '';
    $toggle_active_profile = '';
    $toggle_active_feedback = '';
} else if ($_SESSION['page'] === 'feedback') {
    $toggle_active_dashboard = '';
    $toggle_active_pesan = '';
    $toggle_active_riwayatpemesanan = '';
    $toggle_active_profile = '';
    $toggle_active_feedback = $toggle_active;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Customer Feedback</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="assets/demo/demo.css" rel="stylesheet" />
</head>
<body class="">
    <div class="wrapper ">
        <div class="sidebar" data-color="orange">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text logo-mini">
                    OTP
                </a>
                <a href="http://www.creative-tim.com" class="simple-text logo-normal">
                    hello <?php echo $_SESSION['name'] ?> !
                </a>
            </div>
            <div class="sidebar-wrapper" id="sidebar-wrapper">
                <ul class="nav">
                    <li class <?php echo $toggle_active_dashboard; ?>>
                        <a href="home_cus.php">
                            <i class="now-ui-icons design_app"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li <?php echo $toggle_active_pesan; ?>>
                        <a href="pesan.php">
                            <i class="now-ui-icons ui-1_email-85"></i>
                            <p>Pesan</p>
                        </a>
                    </li>
                    <li <?php echo $toggle_active_riwayatpemesanan; ?>>
                        <a href="riwayat_pemesanan.php">
                            <i class="now-ui-icons files_box"></i>
                            <p>Riwayat Pemesanan</p>
                        </a>
                    </li>
                    <li <?php echo $toggle_active_profile; ?>>
                        <a href="profile.php">
                            <i class="now-ui-icons users_single-02"></i>
                            <p>Profil</p>
                        </a>
                    </li>
                    <li <?php echo $toggle_active_feedback; ?>>
                        <a href="Feedback.php">
                            <i class="now-ui-icons ui-2_like"></i>
                            <p>Feedback</p>
                        </a>
                    </li>
                    <li>
                        <a href="login.php">
                            <i class="now-ui-icons ui-1_simple-remove"></i>
                            <p>Log out</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel" id="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                        <a class="navbar-brand" href="feedback.php">Feedback</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                        aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="profile.php">
                                    <i class="now-ui-icons users_single-02"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Account</span>
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="panel-header panel-header-sm"></div>
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="title" style="text-align: center">Feedback untuk Taxi Driver</h5>
                            </div>
                            <div class="card-body">
                                <form action="submit_feedback.php" method="POST" id="feedbackForm">
                                    <div class="form-group">
                                        <label for="name">Nama Pengguna: </label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="id_taxi">Pilih Taxi:</label>
                                        <select class="form-control" id="id_taxi" name="id_taxi" required>
                                            <option value="">Pilih Taxi</option>
                                            <?php foreach ($taxiOptions as $taxi): ?>
                                                <option value="<?php echo $taxi['id_taxi']; ?>"><?php echo $taxi['merk'] . ' ' . $taxi['model']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="rating">Rating:</label>
                                        <select class="form-control" id="rating" name="rating" required>
                                            <option value="">Pilih Rating</option>
                                            <option value="1">1 - Sangat Buruk</option>
                                            <option value="2">2 - Buruk</option>
                                            <option value="3">3 - Cukup</option>
                                            <option value="4">4 - Baik</option>
                                            <option value="5">5 - Sangat Baik</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="comments">Komentar:</label>
                                        <textarea class="form-control" id="comments" name="comments" rows="4" placeholder="Tulis komentar Anda di sini..." required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Kirim Feedback</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <nav>
                        <ul>
                            <li>
                                <a href="https://www.creative-tim.com">Creative Tim</a>
                            </li>
                            <li>
                                <a href="http://presentation.creative-tim.com">About Us</a>
                            </li>
                        </ul>
                    </nav>
                    <div class="copyright" id="copyright">
                        &copy;
                        <script>
                            document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
                        </script>, Copyright <a href="termsandpolicy.php" target="_blank">claim</a>
                        Online Taxi Platform Company.
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="assets/js/core/jquery.min.js"></script>
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>
    <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <script src="assets/js/plugins/chartjs.min.js"></script>
    <script src="assets/js/plugins/bootstrap-notify.js"></script>
    <script src="assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script>
    <script src="assets/demo/demo.js"></script>
</body>
</html>
