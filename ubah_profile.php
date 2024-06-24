<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ubah_nama = $_POST['name'];
    $ubah_email = $_POST['email'];
    $ubah_number = $_POST['number'];
    $ubah_asalkota = $_POST['asalkota'];
    $id_profile = $_POST['id_hapus'];

    // Ubah user dari database
    $sql_ubah_user = "UPDATE admin SET name = '$ubah_nama', email = '$ubah_email', number = '$ubah_number', asalkota = '$ubah_asalkota' WHERE id_admin = '$id_profile'";
    if (mysqli_query($koneksi, $sql_ubah_user)) {
        echo "<script>alert('Profile anda berhasil diubah!'); window.location.href='profileAdmin.php';</script>";
    } else {
        // Gagal Mengubah  user
        echo "<script>alert(Gagal mengubah profile anda!); window.location.href='profileAdmin.php';</script>";
    }

    $koneksi->close();
}
?>