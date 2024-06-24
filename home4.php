<?php
session_start();
$_SESSION['page'] = "home4";
if (!isset($_SESSION['authenticated']) && $_SESSION['role'] == 'admin') {
    header("location: login.php");
    exit;
}
include "connection.php";

$toggle_active = 'class="active"';
$toggle_active_home4 = '';
$toggle_active_profileAdmin4 = '';
$toggle_active_feedback = '';



if ($_SESSION['page'] === 'home4') {
    $toggle_active_home4 = $toggle_active;
    $toggle_active_profileAdmin4 = '';
    $toggle_active_feedback = '';
} else if ($_SESSION['page'] === 'profileAdmin4') {
    $toggle_active_home4 = '';
    $toggle_active_profileAdmin4 = '';
    $toggle_active_feedback = '';

} else if ($_SESSION['page'] === 'feedback') {
    $toggle_active_home4 = '';
    $toggle_active_profileAdmin4 = '';
    $toggle_active_feedback = '';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Admin Home</title>
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
                    <li <?php echo $toggle_active_home4; ?>>
                        <a href="home4.php">
                            <i class="now-ui-icons design_app"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li <?php echo $toggle_active_profileAdmin4; ?>>
                        <a href="profileAdmin4.php">
                            <i class="now-ui-icons business_badge"></i>
                            <p>Profil Admin</p>
                        </a>
                    </li>
                    <li <?php echo $toggle_active_feedback; ?>>
                        <a href="manage_feedback.php">
                            <i class="now-ui-icons shopping_delivery-fast"></i>
                            <p>Management Feedback</p>
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
                        <a class="navbar-brand" href="home4.php">Dashboard</a>
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
                                <a class="nav-link" href="profileAdmin4.php">
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
            <div class="panel-header panel-header-lg">
                <canvas id="bigDashboardChart"></canvas>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card card-chart">
                            <div class="card-header">
                                <h5 class="card-category">Pemesanan Tahun ini</h5>
                                <h4 class="card-title">Tahun 2024</h4>

                            </div>
                            <div class="card-body">
                                <div class="chart-area">
                                    <canvas id="lineChartExample"></canvas>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="now-ui-icons loader_refresh spin"></i> Just Updated
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card card-chart">
                            <div class="card-header">
                                <h5 class="card-category">Penambahan Feedback dari Pengguna</h5>
                                <h4 class="card-title">Tahun 2024</h4>

                            </div>
                            <div class="card-body">
                                <div class="chart-area">
                                    <canvas id="lineChartExampleWithNumbersAndGrid"></canvas>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="now-ui-icons loader_refresh spin"></i> Just Updated
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card  card-tasks">
                            <div class="card-header ">
                                <h5 class="card-category">Kegiatan Hari Ini</h5>
                                <h4 class="card-title">Sudahkah anda melakukan kegiatan berikut?</h4>
                            </div>
                            <div class="card-body ">
                                <div class="table-full-width table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="checkbox"
                                                                id="taskCheckbox1">
                                                            <span class="form-check-sign"></span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td class="text-left">Melihat profile anda?</td>
                                                <td class="td-actions text-right">
                                                    <button type="button" rel="tooltip" title=""
                                                        class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral"
                                                        data-original-title="Plus" id="plusButton1">
                                                        <i class="now-ui-icons ui-1_simple-add"></i>
                                                    </button>
                                                    <button type="button" rel="tooltip" title=""
                                                        class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral"
                                                        data-original-title="Remove">
                                                        <i class="now-ui-icons ui-1_simple-remove"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="checkbox"
                                                                id="taskCheckbox2">
                                                            <span class="form-check-sign"></span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td class="text-left">Mengatur dari Feedback Pengguna?</td>
                                                <td class="td-actions text-right">
                                                    <button type="button" rel="tooltip" title=""
                                                        class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral"
                                                        data-original-title="Plus" id="plusButton2">
                                                        <i class="now-ui-icons ui-1_simple-add"></i>
                                                    </button>
                                                    <button type="button" rel="tooltip" title=""
                                                        class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral"
                                                        data-original-title="Remove">
                                                        <i class="now-ui-icons ui-1_simple-remove"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
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
                                        Online Taxi Platform Company.
                                    </div>
                                </div>
                            </footer>
                        </div>
                    </div>
                    <!--   Core JS Files   -->
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

                        });
                    </script>
</body>

</html>