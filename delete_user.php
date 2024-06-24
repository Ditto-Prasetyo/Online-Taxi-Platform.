<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_hapus = $_POST['id_hapus'];

    // Hapus user dari database
    $sql_delete_user = "DELETE FROM registrasi_customer WHERE id_customer= $id_hapus";
    if (mysqli_query($koneksi, $sql_delete_user)) {
        echo "<script>alert('user berhasil dihapus!'); window.location.href='manage_users.php';</script>";
    } else {
        // Gagal menghapus user
        echo "<script>alert(Gagal menghapus user); window.location.href='manage_users.php';</script>";
    }

    $koneksi->close();
}
?>