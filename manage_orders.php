<?php
session_start();
$_SESSION['page'] = "LaporanPemesanan";
if (!isset($_SESSION['authenticated']) && $_SESSION['role'] == 'admin') {
    header("location: login.php");
    exit;
}

include "connection.php";

// Mengubah status pesanan
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['order_id']) && isset($_POST['status'])) {
    $order_id = intval($_POST['order_id']);
    $status = $_POST['status'];

    if ($status === 'Selesai') {
        // Get the taxi ID assigned to this order
        $sql = "SELECT id_taksi FROM orders WHERE id = $order_id";
        $result = mysqli_query($koneksi, $sql);
        $row = mysqli_fetch_assoc($result);
        $id_taksi = $row['id_taksi'];

        // Set the taxi as available
        $sql_taxi = "UPDATE taxis SET is_available = 1 WHERE taxi_id = '$id_taksi'";
        mysqli_query($koneksi, $sql_taxi);
    }

    $stmt = $koneksi->prepare("UPDATE orders SET status = ? WHERE id = ?");
    $stmt->bind_param("si", $status, $order_id);
    $stmt->execute();
    header("location: manage_orders.php");
    exit;
}

// Mengambil semua pesanan
$result = $koneksi->query("SELECT orders.*, registrasi_customer.name AS customer FROM orders JOIN registrasi_customer ON orders.name = registrasi_customer.name");


$sql2 = "SELECT id_taxi, merk, model FROM taxi WHERE status = 'Available'";
$result3 = $koneksi->query($sql2);



$toggle_active = 'class="active"';
$toggle_active_home1 = '';
$toggle_active_profileAdmin1 = '';
$toggle_active_LaporanPemesanan = '';


if ($_SESSION['page'] === 'home1') {
    $toggle_active_home1 = '';
    $toggle_active_profileAdmin1 = '';
    $toggle_active_LaporanPemesanan = '';
} else if ($_SESSION['page'] === 'profileAdmin1') {
    $toggle_active_home1 = '';
    $toggle_active_profileAdmin1 = '';
    $toggle_active_LaporanPemesanan = '';
} else if ($_SESSION['page'] === 'LaporanPemesanan') {
    $toggle_active_home1 = '';
    $toggle_active_profileAdmin1 = '';
    $toggle_active_LaporanPemesanan = $toggle_active;
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
                    <li <?php echo $toggle_active_home1; ?>>
                        <a href="home1.php">
                            <i class="now-ui-icons design_app"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li <?php echo $toggle_active_profileAdmin1; ?>>
                        <a href="profileAdmin1.php">
                            <i class="now-ui-icons business_badge"></i>
                            <p>Profil Admin</p>
                        </a>
                    </li>
                    <li <?php echo $toggle_active_LaporanPemesanan; ?>>
                        <a href="manage_orders.php">
                            <i class="now-ui-icons files_box"></i>
                            <p>Laporan Pemesanan</p>
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
                        <a class="navbar-brand" href="profileAdmin1.php">Admin Orders Management</a>
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
                                <a class="nav-link" href="profileAdmin1.php">
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
                                <h5 class="title" style="text-align: center;">Manage Order</h5>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Customer</th>
                                            <th>Pickup Location</th>
                                            <th>Dropoff Location</th>
                                            <th>Pickup Time</th>
                                            <th>Status</th>
                                            <th>Pilih Status</th>
                                            <th>Pilih Taxi</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($order = $result->fetch_assoc()): 
                                            $id_order = $order['id'];
                                            ?>
                                            <tr>
                                                <td><?php echo $order['id']; ?></td>
                                                <td><?php echo htmlspecialchars($order['customer']); ?></td>
                                                <td><?php echo htmlspecialchars($order['pickup_location']); ?></td>
                                                <td><?php echo htmlspecialchars($order['dropoff_location']); ?></td>
                                                <td><?php echo htmlspecialchars($order['pickup_time']); ?></td>
                                                <td><?php echo htmlspecialchars($order['status']); ?></td>
                                                <td>
                                                    <form method="POST" style="display:inline;">
                                                        <input type="hidden" name="order_id"
                                                            value="<?php echo $order['id']; ?>">
                                                        <select name="status" class="form-control">
                                                            <option value="Menunggu" <?php if ($order['status'] == 'Menunggu')
                                                                echo 'selected'; ?>>Menunggu</option>
                                                            <option value="Dalam Perjalanan" <?php if ($order['status'] == 'Dalam Perjalanan')
                                                                echo 'selected'; ?>>Dalam Perjalanan</option>
                                                            <option value="Selesai" <?php if ($order['status'] == 'Selesai')
                                                                echo 'selected'; ?>>Selesai</option>
                                                        </select>
                                                        <button type="submit" class="btn btn-primary mt-1">Update</button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form method="POST" action="update_order.php">
                                                        <div class="form-group">
                                                            <select class="form-control" id="id_taxi" name="id_taxi" required>
                                                                <option value="">Pilih Taxi</option>
                                                                <?php
                                                                $sql_taxi = "SELECT id_taxi, merk FROM taxi";
                                                                $result_taxi = mysqli_query($koneksi, $sql_taxi);
                                                                while ($row_taxi = mysqli_fetch_assoc($result_taxi)) {
                                                                    echo '<option value="' . $row_taxi['id_taxi'] . '">' . $row_taxi['merk'] . '</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                            <input type="hidden" name="id_order" value="<?php echo $id_order; ?>" />
                                                            <button type="submit"
                                                                class="btn btn-primary mt-1">Update</button>
                                                        </div>
                                                    </form>
                                                </td>

                                            </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
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