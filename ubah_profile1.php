<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ubah_nama1 = $_POST['name'];
    $ubah_email1 = $_POST['email'];
    $ubah_number1 = $_POST['number'];
    $ubah_asalkota1 = $_POST['asalkota'];
    $id_profile1 = $_POST['id_hapus'];

    // Ubah user dari database
    $sql_ubah_user1 = "UPDATE admin SET name = '$ubah_nama1', email = '$ubah_email1', number = '$ubah_number1', asalkota = '$ubah_asalkota1' WHERE id_admin = '$id_profile1'";
    if (mysqli_query($koneksi, $sql_ubah_user1)) {
        echo "<script>alert('Profile anda berhasil diubah!'); window.location.href='profileAdmin1.php';</script>";
    } else {
        // Gagal Mengubah  user
        echo "<script>alert(Gagal mengubah profile anda!); window.location.href='profileAdmin1.php';</script>";
    }

    $koneksi->close();
}
?>