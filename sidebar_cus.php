<!-- <?php
$toggle_active = 'class="active"';
$toggle_active_dashboard = '';
$toggle_active_pesan = '';
$toggle_active_riwayatpemesanan = '';


if ($_SESSION['page'] === 'dashboard') {
    $toggle_active_dashboard = $toggle_active;
    $toggle_active_pesan = '';
    $toggle_active_riwayatpemesanan = '';
} else if ($_SESSION['page'] === 'pesan') {
    $toggle_active_dashboard = '';
    $toggle_active_pesan = $toggle_active;
    $toggle_active_riwayatpemesanan = '';
} else if ($_SESSION['page'] === 'riwayatpemesanan') {
    $toggle_active_dashboard = '';
    $toggle_active_pesan = '';
    $toggle_active_riwayatpemesanan = $toggle_active;
}
?> -->

<?php
include 'Connection.php';
$q = "SELECT * FROM foto WHERE id_customer = '" . $_SESSION['id_customer'] . "'";
$result = $koneksi->query($q);

$row = $result->fetch_assoc();

if ($result && $result->num_rows > 0) {
    $nama_file = $row['file'];
} else {
    $nama_file = null;
}
?>

<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                        <img alt="image" class="img-circle" src="img/<?php echo $nama_file; ?>" />
                    </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear"> <span class="block m-t-xs"> <strong
                                    class="font-bold"><?php echo $_SESSION['name'] ?></strong>
                            </span> <span class="text-muted text-xs block"> <?php echo $_SESSION['role'] ?><b
                                    class="caret"></b></span>
                        </span>
                        </span> <span class="text-muted text-xs block">Logging as :
                            <?php echo $_SESSION['email'] ?><b class="caret"></b></span> </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="profile.php">Profile</a></li>
                        <li class="divider"></li>
                        <li><a href="login.php">Keluar</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    OTP
                </div>
            </li>
            <li <>
                <a href="home_cust.php"><i class="fa fa-home"></i> <span class="nav-label">Home</span></a>
            </li>
            <li >
                <a href="pesan.php"><i class="fa fa-archive"></i> <span class="nav-label">Pesan</span></a>
            </li>
            <li >
                <a href="riwayat_pemesanan.php"><i class="fa fa-slideshare"></i> <span class="nav-label">Riwayat Pemesanan</span></a>
            </li>
            <li><a href="feedback.php"><i class="fa fa-calendar"></i> <span class="nav-label">Feedback</span></a>

        </ul>
    </div>
</nav>