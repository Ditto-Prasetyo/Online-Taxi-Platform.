<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ubah_rating = $_POST['rating'];
    $ubah_komentar = $_POST['comments'];
    $id_feedback = $_POST['id_hapus'];

    // Ubah user dari database
    $sql_ubah_user = "UPDATE feedback SET rating = '$ubah_rating', comments = '$ubah_komentar' WHERE id_feedback = '$id_feedback'";
    if (mysqli_query($koneksi, $sql_ubah_user)) {
        echo "<script>alert('Komentar berhasil diubah!'); window.location.href='manage_feedback.php';</script>";
    } else {
        // Gagal Mengubah  user
        echo "<script>alert(Gagal mengubah komentar); window.location.href='manage_feedback.php';</script>";
    }

    $koneksi->close();
}
?>