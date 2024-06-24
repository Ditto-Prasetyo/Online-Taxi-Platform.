<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ubah_nama3 = $_POST['name'];
    $ubah_email3 = $_POST['email'];
    $ubah_number3 = $_POST['number'];
    $ubah_asalkota3 = $_POST['asalkota'];
    $id_profile3 = $_POST['id_hapus'];

    // Ubah user dari database
    $sql_ubah_user3 = "UPDATE admin SET name = '$ubah_nama3', email = '$ubah_email3', number = '$ubah_number3', asalkota = '$ubah_asalkota3' WHERE id_admin = '$id_profile3'";
    if (mysqli_query($koneksi, $sql_ubah_user3)) {
        echo "<script>alert('Profile anda berhasil diubah!'); window.location.href='profileAdmin3.php';</script>";
    } else {
        // Gagal Mengubah  user
        echo "<script>alert(Gagal mengubah profile anda!); window.location.href='profileAdmin3.php';</script>";
    }

    $koneksi->close();
}
?>