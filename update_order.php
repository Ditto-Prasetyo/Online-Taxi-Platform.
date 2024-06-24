<?php
include 'connection.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Ambil nilai dari form
        $id_taxi = $_POST['id_taxi'];
        $id_order = $_POST['id_order'];

        $sql_order = "UPDATE orders SET id_taksi = '$id_taxi' WHERE id = '$id_order'";

        if (mysqli_query($koneksi, $sql_order)) {
            echo "<script>alert('Taksi berhasil diubah!'); window.location.href='manage_orders.php';</script>";
        } else {
            echo "Terjadi kesalahan saat memperbarui taksi: " . mysqli_error($koneksi);
        }
    } else {
        echo "Harap pilih taxi.";
    }


// Tutup koneksi database
mysqli_close($koneksi);
?>