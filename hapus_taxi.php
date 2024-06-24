<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_hapus = $_POST['id_hapus'];

    // Hapus user dari database
    $sql_delete_user = "DELETE FROM taxi WHERE id_taxi= $id_hapus";
    if (mysqli_query($koneksi, $sql_delete_user)) {
        echo "<script>alert('taxi berhasil dihapus!'); window.location.href='manage_taxi.php';</script>";
    } else {
        // Gagal menghapus user
        echo "<script>alert(Gagal menghapus taxi); window.location.href='manage_taxi.php';</script>";
    }

    $koneksi->close();
}
?>