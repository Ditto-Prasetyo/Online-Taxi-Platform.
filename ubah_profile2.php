<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ubah_nama2 = $_POST['name'];
    $ubah_email2 = $_POST['email'];
    $ubah_number2 = $_POST['number'];
    $ubah_asalkota2 = $_POST['asalkota'];
    $id_profile2 = $_POST['id_hapus'];

    // Ubah user dari database
    $sql_ubah_user2 = "UPDATE admin SET name = '$ubah_nama2', email = '$ubah_email2', number = '$ubah_number2', asalkota = '$ubah_asalkota2' WHERE id_admin = '$id_profile2'";
    if (mysqli_query($koneksi, $sql_ubah_user2)) {
        echo "<script>alert('Profile anda berhasil diubah!'); window.location.href='profileAdmin2.php';</script>";
    } else {
        // Gagal Mengubah  user
        echo "<script>alert(Gagal mengubah profile anda!); window.location.href='profileAdmin2.php';</script>";
    }

    $koneksi->close();
}
?>