<?php
session_start();
$_SESSION['page'] = "MengaturTaksi";
if (!isset($_SESSION['authenticated']) && $_SESSION['role'] == 'admin') {
    header("location: login.php");
    exit;
}

include "connection.php";

// Ambil daftar taksi dari database
$sql = "SELECT * FROM taxi";
$result = mysqli_query($koneksi, $sql);
$nomor_uruts = 1;

// Inisialisasi array untuk menyimpan daftar taksi
$daftar_taksi = [];
if (mysqli_num_rows($result) > 0) {
    
    while ($row = mysqli_fetch_assoc($result)) {
        $nomor_uruts++;
        $id_hapus = $row['id_taxi'];
        $daftar_taksi[] = $row;
    }
}

// Jika terdapat permintaan untuk mengubah status taksi
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_status'])) {
    $id_taxi = $_POST['id_taxi'];
    $new_status = $_POST['status'];

    // Update status taksi di database
    $sql = "UPDATE taxi SET status='$new_status' WHERE id_taxi='$id_taxi'";
    if (mysqli_query($koneksi, $sql)) {
        // Redirect kembali ke halaman ini setelah update
        header("location: list_taxi.php");
        exit;
    } else {
        echo "Gagal mengupdate status taksi: " . mysqli_error($koneksi);
    }
}
$toggle_active = 'class="active"';
$toggle_active_home2 = '';
$toggle_active_profileAdmin2 = '';
$toggle_active_MengaturTaksi = '';



if ($_SESSION['page'] === 'home2') {
    $toggle_active_home2 = '';
    $toggle_active_profileAdmin2 = '';
    $toggle_active_TambahTaksi = '';
} else if ($_SESSION['page'] === 'profileAdmin2') {
    $toggle_active_home2 = '';
    $toggle_active_profileAdmin2 = '';
    $toggle_active_MengaturTaksi = '';

} else if ($_SESSION['page'] === 'MengaturTaksi') {
    $toggle_active_home2 = '';
    $toggle_active_profileAdmin2 = '';
    $toggle_active_MengaturTaksi = $toggle_active;
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
                    <li <?php echo $toggle_active_home2; ?>>
                        <a href="home2.php">
                            <i class="now-ui-icons design_app"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li <?php echo $toggle_active_profileAdmin2; ?>>
                        <a href="profileAdmin2.php">
                            <i class="now-ui-icons business_badge"></i>
                            <p>Profil Admin</p>
                        </a>
                    </li>
                    <li <?php echo $toggle_active_MengaturTaksi; ?>>
                        <a href="manage_taxi.php">
                            <i class="now-ui-icons ui-1_calendar-60"></i>
                            <p>Mengatur Taksi</p>
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
                        <a class="navbar-brand" href="manage_taxi.php">Admin Taxi Management</a>
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
                                <a class="nav-link" href="profileAdmin2.php">
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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title" style="text-align: center;">Daftar Taksi</h5>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Plat Nomor</th>
                                        <th>Merk</th>
                                        <th>Model</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($daftar_taksi as $taksi): ?>
                                        <tr>
                                            <td><?php echo $nomor_uruts++;?></td>
                                            <td><?php echo $taksi['plat_nomor']; ?></td>
                                            <td><?php echo $taksi['merk']; ?></td>
                                            <td><?php echo $taksi['model']; ?></td>
                                            <td>
                                                <!-- Form untuk mengubah status taksi -->
                                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
                                                    method="POST">
                                                    <input type="hidden" name="id_taxi"
                                                        value="<?php echo $taksi['id_taxi']; ?>">
                                                    <select name="status" class="form-control">
                                                        <option value="Available" <?php if ($taksi['status'] == 'Available')
                                                            echo 'selected'; ?>>Available</option>
                                                        <option value="Unavailable" <?php if ($taksi['status'] == 'Unavailable')
                                                            echo 'selected'; ?>>Unavailable</option>
                                                    </select>
                                                    <input type="hidden" name="update_status" value="1">
                                                </form>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-xs btn-warning" name="btn_ubah"
                                                    data-toggle="modal"
                                                    data-target="#UbahTaxiModal<?php echo $nomor_uruts; ?>">Ubah</button>
                                                <button type="button" class="btn btn-xs btn-danger" name="btn_hapus"
                                                    data-toggle="modal"
                                                    data-target="#hapusTaxiModal<?php echo $nomor_uruts; ?>">Hapus</button>
                                                <button type="button" class="btn btn-xs btn-success" name="btn_kirim"
                                                    data-toggle="modal"
                                                    data-target="#kirimTaxiModal<?php echo $nomor_uruts; ?>">Kirim</button>

                                                <!-- Modal ubah -->
                                                <div class="modal fade" id="UbahTaxiModal<?php echo $nomor_uruts; ?>"
                                                    tabindex="-1" role="dialog" aria-labelledby="UbahTaxiModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h3 class="modal-title" id="UbahTaxiModalLabel"
                                                                    style="text-align: center;">Ubah
                                                                    Taxi</h3>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form id="formTaxiArtikel" method="post" action="Ubah_taxi.php"
                                                                enctype="multipart/form-data">
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="judul">Plat Nomor</label>
                                                                        <input type="text" class="form-control" id="plat_nomor"
                                                                            name="plat_nomor" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="Taxi">Merek</label>
                                                                        <input type="text" class="form-control" id="merk"
                                                                            name="merk" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="Taxi">Model</label>
                                                                        <input type="text" class="form-control" id="model"
                                                                            name="model" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="Taxi">Status</label>
                                                                        <select class="form-control" id="status"
                                                                            name="status" required>
                                                                            <option value="Available">Available</option>
                                                                            <option value="Unvailable">Unavailable</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <input type="hidden" name="id_hapus"
                                                                        value="<?php echo $id_hapus; ?>">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Tutup</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Simpan</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal Hapus -->
                                                <div class="modal fade" id="hapusTaxiModal<?php echo $nomor_uruts; ?>"
                                                    tabindex="-1" role="dialog" aria-labelledby="hapusTaxiModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h3 class="modal-title" id="hapusTaxiModalLabel"
                                                                    style="text-align: center;">
                                                                    Konfirmasi Hapus</h3>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Apakah anda yakin ingin menghapus Taxi Model
                                                                "<?php echo $taksi['merk']; ?>" ini?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form method="post" action="hapus_taxi.php">
                                                                    <input type="hidden" name="id_hapus"
                                                                        value="<?php echo $id_hapus; ?>">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Batal</button>
                                                                    <button type="submit"
                                                                        class="btn btn-danger">Hapus</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
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