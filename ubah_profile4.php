<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ubah_nama4 = $_POST['name'];
    $ubah_email4 = $_POST['email'];
    $ubah_number4 = $_POST['number'];
    $ubah_asalkota4 = $_POST['asalkota'];
    $id_profile4 = $_POST['id_hapus'];

    // Ubah user dari database
    $sql_ubah_user4 = "UPDATE admin SET name = '$ubah_nama4', email = '$ubah_email4', number = '$ubah_number4', asalkota = '$ubah_asalkota4' WHERE id_admin = '$id_profile4'";
    if (mysqli_query($koneksi, $sql_ubah_user4)) {
        echo "<script>alert('Profile anda berhasil diubah!'); window.location.href='profileAdmin4.php';</script>";
    } else {
        // Gagal Mengubah  user
        echo "<script>alert(Gagal mengubah profile anda!); window.location.href='profileAdmin4.php';</script>";
    }

    $koneksi->close();
}
?>