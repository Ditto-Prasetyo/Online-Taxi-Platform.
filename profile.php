<!DOCTYPE html>
<html>

<?php
session_start();
$_SESSION['page'] = "profile";
if (!isset($_SESSION['authenticated']) && $_SESSION['role'] == 'customer') {
    header("location: login.php");
    exit;
}
include "connection.php";

// Ambil NIM dari session atau query parameter
$id_customer = $_SESSION['id_customer'];

// Query untuk mengambil data mahasiswa
$sql = "SELECT * FROM registrasi_customer WHERE id_customer = '" . $id_customer . "'";
$result = mysqli_query($koneksi, $sql);

$q = "SELECT * FROM foto WHERE id_customer = '" . $_SESSION['id_customer'] . "'";
$result2 = $koneksi->query($q);
$rows = $result2->fetch_assoc();

if ($result && $result2->num_rows > 0) {
    $nama_file = $rows['file'];
} else {
    $nama_file = null;
}

while ($row = mysqli_fetch_assoc($result)) {
    $data_name = $row['name'];
    $data_email = $row['email'];
    $data_nomor = $row['number'];
    $data_address = $row['address'];
    $data_asalkota = $row['asalkota'];
    $data_postalcode = $row['postalcode'];
    $nomor_uruts = $id_customer;
    $id_hapus = $nomor_uruts;
}


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
    $toggle_active_profile = $toggle_active;
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
    <title>Customer Profile</title>
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

<body>
    <div class="wrapper">
        <div class="sidebar" data-color="orange">
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
                    <li <?php echo $toggle_active_dashboard; ?>>
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
                        <a class="navbar-brand" href="pesan.php">Pesan</a>
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
                                <a class="nav-link" href="probile.php">
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
            <div class="panel-header panel-header-sm"></div>
            <div class="content">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="title" style="text-align:center">Profile</h5>
                            </div>
                            <div class="card-body">
                                <!-- <?php
                                if (isset($_SESSION['message'])) {
                                    echo "<div class='alert alert-success'>" . $_SESSION['message'] . "</div>";
                                    unset($_SESSION['message']);
                                }
                                if (isset($_SESSION['error'])) {
                                    echo "<div class='alert alert-danger'>" . $_SESSION['error'] . "</div>";
                                    unset($_SESSION['error']);
                                }
                                ?> -->
                                <form method="POST" action="">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Full Name</label>
                                                <input type="text" class="form-control" name="name"
                                                    value="<?php echo $data_name; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Email address</label>
                                                <input type="email" class="form-control" name="email"
                                                    value="<?php echo $data_email; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Number</label>
                                                <input type="text" class="form-control" name="number"
                                                    value="<?php echo $data_nomor; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control" name="address"
                                                    value="<?php echo $data_address; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Asal Kota</label>
                                                <input type="text" class="form-control" name="asalkota"
                                                    value="<?php echo $data_asalkota; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Postal Code</label>
                                                <input type="number" class="form-control" name="postalcode"
                                                    value="<?php echo $data_postalcode; ?>" readonly>
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
                                            <form id="formprofileArtikel" method="post" action="Ubah_profile_cus.php"
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
                                                        <label for="profile">Alamat Anda</label>
                                                        <input type="text" class="form-control" id="address"
                                                            name="address"
                                                            placeholder="<?php echo $data_address; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="profile">Kota Asal Anda</label>
                                                        <input type="text" class="form-control" id="asalkota"
                                                            name="asalkota"
                                                            placeholder="<?php echo $data_asalkota; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="profile">Kode Pos Anda</label>
                                                        <input type="text" class="form-control" id="postalcode"
                                                            name="postalcode"
                                                            placeholder="<?php echo $data_postalcode; ?>" required>
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
                                        <img class="avatar border-gray" src="img/Tax.png" alt="...">
                                        <h5 class="title"><?php echo $data_name; ?></h5>
                                    </a>
                                    <p class="description">
                                        Email : <?php echo $data_email; ?>
                                    </p>
                                </div>
                                <p class="description text-center">
                                    Asal Kota : <?php echo $data_asalkota; ?> <br>
                                    Alamat : <?php echo $data_address; ?> <br>
                                    Nomor Telepon : <?php echo $data_nomor; ?> <br>
                                    Kode Pos : <?php echo $data_postalcode; ?>
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