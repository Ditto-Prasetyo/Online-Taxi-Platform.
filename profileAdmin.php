<!DOCTYPE html>
<html>

<?php
session_start();
$_SESSION['page'] = "profileAdmin";
if (!isset($_SESSION['authenticated']) && $_SESSION['role'] == 'admin') {
    header("location: login.php");
    exit;
}
include "connection.php";

// Ambil NIM dari session atau query parameter
$id_admin = $_SESSION['id_admin'];

// Query untuk mengambil data mahasiswa
$sql = "SELECT id_admin,name, email, number, asalkota FROM admin WHERE id_admin = '" . $id_admin . "'";
$result = mysqli_query($koneksi, $sql);

$q = "SELECT * FROM foto_admin WHERE id_admin = '" . $_SESSION['id_admin'] . "'";
$result2 = $koneksi->query($q);


while ($row = mysqli_fetch_assoc($result)) {
    $data_name = $row['name'];
    $data_email = $row['email'];
    $data_nomor = $row['number'];
    $data_asalkota = $row['asalkota'];
    $nomor_uruts = $id_admin;
    $id_hapus = $nomor_uruts;
}

include "connection.php";

$toggle_active = 'class="active"';
$toggle_active_home = '';
$toggle_active_profileAdmin = '';
$toggle_active_ManagementPengguna = '';


if ($_SESSION['page'] === 'home') {
    $toggle_active_home = '';
    $toggle_active_profileAdmin = '';
    $toggle_active_ManagementPengguna = '';
} else if ($_SESSION['page'] === 'profileAdmin') {
    $toggle_active_home = '';
    $toggle_active_profileAdmin = $toggle_active;
    $toggle_active_ManagementPengguna = '';
    ;
} else if ($_SESSION['page'] === 'ManagementPengguna') {
    $toggle_active_home = '';
    $toggle_active_profileAdmin = '';
    $toggle_active_ManagementPengguna = '';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Admin Profile</title>
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
                    <li <?php echo $toggle_active_home; ?>>
                        <a href="home.php">
                            <i class="now-ui-icons design_app"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li <?php echo $toggle_active_profileAdmin; ?>>
                        <a href="profileAdmin.php">
                            <i class="now-ui-icons business_badge"></i>
                            <p>Profil Admin</p>
                        </a>
                    </li>
                    <li <?php echo $toggle_active_ManagementPengguna; ?>>
                        <a href="manage_users.php">
                            <i class="now-ui-icons business_chart-bar-32"></i>
                            <p>Management Pengguna</p>
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
                        <a class="navbar-brand" href="profileAdmin.php">Admin Profile</a>
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
                                <a class="nav-link" href="profileAdmin.php">
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
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="title" style="text-align:center">Profile</h5>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="row">
                                        <div class="col-md-5 pr-1">
                                            <div class="form-group">
                                                <label>Admin's Full Name</label>
                                                <input type="text" class="form-control" placeholder="Your full name"
                                                    value="<?php echo $data_name; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6 pr-1">
                                            <div class="form-group">
                                                <label>Admin's Email</label>
                                                <input type="email" class="form-control" placeholder="Your Email"
                                                    value="<?php echo $data_email; ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Admin Number</label>
                                                <input type="text" class="form-control" placeholder="Your Number"
                                                    value="<?php echo $data_nomor; ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Admin's Hometown</label>
                                                <input type="text" class="form-control" placeholder="Your hometown"
                                                    value="<?php echo $data_asalkota; ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <button type="button" class="btn btn-xs btn-warning" name="btn_ubah" data-toggle="modal"
                                    data-target="#UbahprofileModal">Ubah</button>
                                <!-- Modal ubah -->
                                <div class="modal fade" id="UbahprofileModal" tabindex="-1" role="dialog"
                                    aria-labelledby="UbahprofileModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="UbahprofileModalLabel"
                                                    style="text-align: center;">Ubah
                                                    profile</h3>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form id="formprofileArtikel" method="post" action="Ubah_profile.php"
                                                enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="judul">Nama Anda</label>
                                                        <input type="text" class="form-control" id="name" name="name"
                                                            placeholder="<?php echo $data_name; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="profile">Email Anda</label>
                                                        <input type="text" class="form-control" id="email" name="email"
                                                            placeholder="<?php echo $data_email; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="profile">Nomor Anda</label>
                                                        <input type="text" class="form-control" id="number"
                                                            name="number"
                                                            placeholder="<?php echo $data_nomor; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="profile">Kota Asal Anda</label>
                                                        <input type="text" class="form-control" id="asalkota"
                                                            name="asalkota"
                                                            placeholder="<?php echo $data_asalkota; ?>" required>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="hidden" name="id_hapus"
                                                        value="<?php echo $id_hapus; ?>">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="image">
                                <img src="img/123.jpg">
                            </div>
                            <div class="card-body">
                                <div class="author">
                                    <a href="#">
                                        <img class="avatar border-gray" src="img/People1.png" alt="...">
                                        <h5 class="title"><?php echo $data_name; ?></h5>
                                    </a>
                                    <p class="description">
                                        Email : <?php echo $data_email; ?>
                                    </p>
                                </div>
                                <p class="description text-center">
                                    Asal Kota : <?php echo $data_asalkota; ?> <br>
                                    Nomor Telepon : <?php echo $data_nomor; ?>
                                </p>
                            </div>
                            <hr>
                            <div class="button-container">
                                <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                                    <i class="fab fa-facebook-f"></i>
                                </button>
                                <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                                    <i class="fab fa-twitter"></i>
                                </button>
                                <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                                    <i class="fab fa-google-plus-g"></i>
                                </button>
                            </div>
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