<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_hapus = $_POST['id_hapus'];

    // Hapus user dari database
    $sql_delete_feedback = "DELETE FROM feedback WHERE id_feedback= $id_hapus";
    if (mysqli_query($koneksi, $sql_delete_feedback)) {
        echo "<script>alert('feedback berhasil dihapus!'); window.location.href='manage_feedback.php';</script>";
    } else {
        // Gagal menghapus user
        echo "<script>alert(Gagal menghapus feedback); window.location.href='manage_feedback.php';</script>";
    }

    $koneksi->close();
}
?>