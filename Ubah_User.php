<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ubah_nama = $_POST['name'];
    $ubah_email = $_POST['email'];
    $ubah_address = $_POST['address'];
    $ubah_number = $_POST['number'];
    $ubah_asalkota = $_POST['asalkota'];
    $ubah_postalcode = $_POST['postalcode'];
    $id_customer = $_POST['id_hapus'];

    // Ubah user dari database
    $sql_ubah_user = "UPDATE registrasi_customer SET name = '$ubah_nama', email = '$ubah_email', number = '$ubah_number', asalkota = '$ubah_asalkota', postalcode = '$ubah_postalcode' WHERE id_customer = '$id_customer'";
    if (mysqli_query($koneksi, $sql_ubah_user)) {
        echo "<script>alert('user berhasil dibuah!'); window.location.href='manage_users.php';</script>";
    } else {
        // Gagal Mengubah  user
        echo "<script>alert(Gagal mengubah user); window.location.href='manage_users.php';</script>";
    }

    $koneksi->close();
}
?>