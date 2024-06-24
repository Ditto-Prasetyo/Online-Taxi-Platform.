<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ubah_platnomor = $_POST['plat_nomor'];
    $ubah_merk = $_POST['merk'];
    $ubah_model = $_POST['model'];
    $ubah_status = $_POST['status'];
    $id_taxi = $_POST['id_hapus'];

    // Ubah user dari database
    $sql_ubah_user = "UPDATE taxi SET plat_nomor = '$ubah_platnomor', merk = '$ubah_merk', model = '$ubah_model', status = '$ubah_status' WHERE id_taxi = '$id_taxi'";
    if (mysqli_query($koneksi, $sql_ubah_user)) {
        echo "<script>alert('taxi berhasil dibuah!'); window.location.href='manage_taxi.php';</script>";
    } else {
        // Gagal Mengubah  user
        echo "<script>alert(Gagal mengubah taxi); window.location.href='manage_taxi.php';</script>";
    }

    $koneksi->close();
}
?>