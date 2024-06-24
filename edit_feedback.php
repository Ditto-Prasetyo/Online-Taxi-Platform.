<?php
session_start();
include "connection.php";
$_SESSION['page'] = "feedback";
// Mengecek apakah user sudah login dan memiliki role admin
if (!isset($_SESSION['authenticated']) || $_SESSION['role'] != 'admin') {
    header("location: login.php");
    exit;
}

$id_feedback = $_GET['id'];

// Jika form konfirmasi dikirim, hapus data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['confirm'])) {
        // Melakukan penghapusan feedback berdasarkan ID
        $query = "DELETE FROM feedback WHERE id_feedback='$id_feedback'";
        if (mysqli_query($koneksi, $query)) {
            // Redirect ke halaman manage_feedback.php setelah berhasil menghapus
            header("Location: manage_feedback.php");
            exit;
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
        }
    } else {
        // Jika penghapusan tidak dikonfirmasi, kembali ke halaman manage_feedback.php
        header("Location: manage_feedback.php");
        exit;
    }
} else {
    // Mengambil data feedback untuk ditampilkan di halaman konfirmasi
    $query = "SELECT * FROM feedback WHERE id_feedback='$id_feedback'";
    $result = mysqli_query($koneksi, $query);
    if (!$result || mysqli_num_rows($result) == 0) {
        echo "Feedback tidak ditemukan!";
        exit;
    }
    $feedback = mysqli_fetch_assoc($result);
}

$toggle_active = 'class="active"';
$toggle_active_home4 = '';
$toggle_active_profileAdmin4 = '';
$toggle_active_feedback = '';



if ($_SESSION['page'] === 'home4') {
    $toggle_active_home4 = '';
    $toggle_active_profileAdmin4 = '';
    $toggle_active_feedback = '';
} else if ($_SESSION['page'] === 'profileAdmin4') {
    $toggle_active_home4 = '';
    $toggle_active_profileAdmin4 = '';
    $toggle_active_feedback = '';

} else if ($_SESSION['page'] === 'feedback') {
    $toggle_active_home4 = '';
    $toggle_active_profileAdmin4 = '';
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
    <title>Admin Delete Feedback</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-color="orange">
            <div class="logo">
                <a href="#" class="simple-text logo-mini">OTP</a>
                <a href="#" class="simple-text logo-normal">hello, <?php echo $_SESSION['name']; ?> !</a>
            </div>
            <div class="sidebar-wrapper" id="sidebar-wrapper">
                <ul class="nav">
                    <li><a href="home4.php"><i class="now-ui-icons design_app"></i>
                            <p>Dashboard</p>
                        </a></li>
                    <li><a href="profileAdmin4.php"><i class="now-ui-icons business_badge"></i>
                            <p>Profil Admin</p>
                        </a></li>
                    <li class="active"><a href="manage_feedback.php"><i class="now-ui-icons shopping_delivery-fast"></i>
                            <p>Management Feedback</p>
                        </a></li>
                    <li><a href="logout.php"><i class="now-ui-icons ui-1_simple-remove"></i>
                            <p>Log out</p>
                        </a></li>
                </ul>
            </div>
        </div>
        <div class="main-panel" id="main-panel">
            <nav class="navbar navbar-expand-lg navbar-transparent bg-primary navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                        <a class="navbar-brand" href="#">Admin Feedback Management</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="profileAdmin4.php"><i
                                        class="now-ui-icons users_single-02"></i>
                                    <p><span class="d-lg-none d-md-block">Account</span></p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="panel-header panel-header-sm"></div>
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="title" style="text-align: center">Hapus Feedback</h5>
                            </div>
                            <div class="card-body">
                                <form action="delete_feedback.php?id=<?php echo $id_feedback; ?>" method="POST">
                                    <p>Apakah Anda yakin ingin menghapus feedback berikut?</p>
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>ID Feedback</th>
                                            <td><?php echo $feedback['id_feedback']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>ID Taxi</th>
                                            <td><?php echo $feedback['id_taxi']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>ID Customer</th>
                                            <td><?php echo $feedback['id_customer']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>ID Orders</th>
                                            <td><?php echo $feedback['id_orders']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Nama</th>
                                            <td><?php echo $feedback['name']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Rating</th>
                                            <td><?php echo $feedback['rating']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Komentar</th>
                                            <td><?php echo $feedback['comments']; ?></td>
                                        </tr>
                                    </table>
                                    <button type="submit" name="confirm" class="btn btn-danger">Hapus</button>
                                    <a href="manage_feedback.php" class="btn btn-secondary">Batal</a>
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
                            <li><a href="https://www.creative-tim.com">Creative Tim</a></li>
                            <li><a href="http://presentation.creative-tim.com">About Us</a></li>
                        </ul>
                    </nav>
                    <div class="copyright">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
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
    <script src="assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script>
</body>

</html>