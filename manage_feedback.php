<?php
session_start();
$_SESSION['page'] = "feedback";
if (!isset($_SESSION['authenticated']) && $_SESSION['role'] == 'admin') {
    header("location: login.php");
    exit;
}
include "connection.php";

$nomor_uruts = 1;
$query = "SELECT * FROM feedback";
$result = mysqli_query($koneksi, $query);

if (!$result) {
    die("Query Error: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
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
    <title>Admin Feedback Management</title>
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
                    <li><a href="login.php"><i class="now-ui-icons ui-1_simple-remove"></i>
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
                                <h5 class="title" style="text-align: center">Feedback dari Customer</h5>
                            </div>
                            <div class="card-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nomor</th>
                                            <th>ID Taxi</th>
                                            <th>ID Customer</th>
                                            <th>ID Orders</th>
                                            <th>Nama</th>
                                            <th>Rating</th>
                                            <th>Komentar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (mysqli_num_rows($result) > 0) {
                                            $nomor_uruts = 0; // Inisialisasi nomor urut
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $nomor_uruts++;
                                                $id_hapus = $row['id_feedback'];
                                                ?>
                                                <tr>
                                                    <td><?php echo $nomor_uruts; ?></td>
                                                    <td><?php echo $row['id_taxi']; ?></td>
                                                    <td><?php echo $row['id_customer']; ?></td>
                                                    <td><?php echo $row['id_orders']; ?></td>
                                                    <td><?php echo $row['name']; ?></td>
                                                    <td><?php echo $row['rating']; ?></td>
                                                    <td><?php echo $row['comments']; ?></td>
                                                    <td>
                                                        <button type="button" class="btn btn-xs btn-warning" name="btn_ubah"
                                                            data-toggle="modal"
                                                            data-target="#UbahfeedbackModal<?php echo $nomor_uruts; ?>">Ubah</button>
                                                        <button type="button" class="btn btn-xs btn-danger" name="btn_hapus"
                                                            data-toggle="modal"
                                                            data-target="#hapusfeedbackModal<?php echo $nomor_uruts; ?>">Hapus</button>


                                                        <!-- Modal ubah -->
                                                        <div class="modal fade" id="UbahfeedbackModal<?php echo $nomor_uruts; ?>"
                                                            tabindex="-1" role="dialog" aria-labelledby="UbahfeedbackModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h3 class="modal-title" id="UbahfeedbackModalLabel"
                                                                            style="text-align: center;">Ubah
                                                                            feedback</h3>
                                                                        <button type="button" class="close" data-dismiss="modal"
                                                                            aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <form id="formfeedbackArtikel" method="post"
                                                                        action="Ubah_feedback.php" enctype="multipart/form-data">
                                                                        <div class="modal-body">
                                                                            <div class="form-group">
                                                                                <label for="judul">Nama</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="name" name="name" placeholder="<?php echo $row['name']; ?>" readonly>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="feedback">Rating</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="rating" name="rating" placeholder="<?php echo $row['rating'];?>" required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="feedback">Komentar</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="comments" name="comments" placeholder="<?php echo $row['comments']; ?>" required>
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
                                                        <div class="modal fade"
                                                            id="hapusfeedbackModal<?php echo $nomor_uruts; ?>" tabindex="-1"
                                                            role="dialog" aria-labelledby="hapusfeedbackModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h3 class="modal-title" id="hapusfeedbackModalLabel"
                                                                            style="text-align: center;">
                                                                            Konfirmasi Hapus</h3>
                                                                        <button type="button" class="close" data-dismiss="modal"
                                                                            aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        Apakah anda yakin ingin menghapus Komen dari
                                                                        "<?php echo $row['name']; ?>" ini?
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <form method="post" action="hapus_feedback.php">
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
                                                <?php
                                            }
                                        } else {
                                            ?>
                                            <tr>
                                                <td colspan='7' style='text-align: center;'>Tidak ada feedback ditemukan
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>

                                    </tbody>
                                </table>
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