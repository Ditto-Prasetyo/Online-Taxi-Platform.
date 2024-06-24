<?php
session_start();
$_SESSION['page'] = "ManagementTaksi";
if (!isset($_SESSION['authenticated']) && $_SESSION['role'] == 'admin') {
    header("location: login.php");
    exit;
}

include "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $plat_nomor = $_POST['plat_nomor'] ?? '';
    $merk = $_POST['merk'] ?? '';
    $model = $_POST['model'] ?? '';

    if ($plat_nomor && $merk && $model) {
        $sql = "INSERT INTO taxi (plat_nomor, merk, model, status) VALUES ('$plat_nomor', '$merk', '$model', 'Available')";
        if (mysqli_query($koneksi, $sql)) {
            echo "<script>alert('Taksi Berhasil Ditambahkan!'); window.location.href='add_taxi.php';</script>";
        } else {
            echo "Gagal menambahkan taksi: " . mysqli_error($koneksi);
        }
    } else {
        echo "Semua bidang harus diisi. <a href=\"javascript: history.back()\">Kembali</a>";
    }
}
$toggle_active = 'class="active"';
$toggle_active_home3 = '';
$toggle_active_profileAdmin3 = '';
$toggle_active_ManagementTaksi = '';
$toggle_active_ListTaxi = '';


if ($_SESSION['page'] === 'home3') {
    $toggle_active_home3 = '';
    $toggle_active_profileAdmin3 = '';
    $toggle_active_ManagementTaksi = '';
    $toggle_active_ListTaxi = '';
} else if ($_SESSION['page'] === 'profileAdmin3') {
    $toggle_active_home3 = '';
    $toggle_active_profileAdmin3 = '';
    $toggle_active_ManagementTaksi = '';
    $toggle_active_ListTaxi = '';

} else if ($_SESSION['page'] === 'ManagementTaksi') {
    $toggle_active_home3 = '';
    $toggle_active_profileAdmin3 = '';
    $toggle_active_ManagementTaksi = $toggle_active;
    $toggle_active_ListTaxi = '';
} else if ($_SESSION['page'] === 'ListTaxi') {
    $toggle_active_home3 = '';
    $toggle_active_profileAdmin3 = '';
    $toggle_active_ManagementTaksi = '';
    $toggle_active_ListTaxi = '';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Admin Work</title>
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
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text logo-mini">
                    OTP
                </a>
                <a href="http://www.creative-tim.com" class="simple-text logo-normal"> hello
                    <?php echo $_SESSION['name'] ?> !
                </a>
            </div>
            <div class="sidebar-wrapper" id="sidebar-wrapper">
                <ul class="nav">
                    <li <?php echo $toggle_active_home3; ?>>
                        <a href="home3.php">
                            <i class="now-ui-icons design_app"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li <?php echo $toggle_active_profileAdmin3; ?>>
                        <a href="profileAdmin3.php">
                            <i class="now-ui-icons business_badge"></i>
                            <p>Profil Admin</p>
                        </a>
                    </li>
                    <li <?php echo $toggle_active_ManagementTaksi; ?>>
                        <a href="add_taxi.php">
                            <i class="now-ui-icons transportation_bus-front-12"></i>
                            <p>Management Taksi</p>
                        </a>
                    </li>
                    <li <?php echo $toggle_active_ListTaxi; ?>>
                        <a href="list_taxi.php">
                            <i class="now-ui-icons ui-1_simple-add"></i>
                            <p>List Taksi</p>
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
                        <a class="navbar-brand" href="profileAdmin3.php">Admin Add Taxi</a>
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
                                <a class="nav-link" href="profileAdmin3.php">
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
            <div class="panel-header panel-header-sm">
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="title" style="text-align: center;">Add Taxi</h5>
                            </div>
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                                <div class="form-group">
                                    <label for="plat_nomor">Plat Nomor</label>
                                    <input type="text" name="plat_nomor" class="form-control" id="plat_nomor" required>
                                </div>
                                <div class="form-group">
                                    <label for="merk">Merk Taksi</label>
                                    <input type="text" name="merk" class="form-control" id="merk" required>
                                </div>
                                <div class="form-group">
                                    <label for="model">Model Taksi</label>
                                    <input type="text" name="model" class="form-control" id="model" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Tambah Taksi</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class=" container-fluid ">
                    <nav>
                        <ul>
                            <li>
                                <a href="https://www.creative-tim.com">
                                    Creative Tim
                                </a>
                            </li>
                            <li>
                                <a href="http://presentation.creative-tim.com">
                                    About Us
                                </a>
                            </li>

                        </ul>
                    </nav>
                    <div class="copyright" id="copyright">
                        &copy;
                        <script>
                            document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
                        </script>, Copyright <a href="termsandpolicy.php" target="_blank">claim</a>
                        Online Taxi Platform Company</a>.
                    </div>
                </div>
            </footer>
        </div>
    </div>


    <script src="assets/js/core/jquery.min.js"></script>
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>
    <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chart JS -->
    <script src="assets/js/plugins/chartjs.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script>
    <!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
    <script src="assets/demo/demo.js"></script>
    <script>
        $(document).ready(function () {
            // Javascript method's body can be found in assets/js/demos.js
            demo.initDashboardPageCharts();
            $('#ordersTable').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true
            });
        });
    </script>
</body>

</html>