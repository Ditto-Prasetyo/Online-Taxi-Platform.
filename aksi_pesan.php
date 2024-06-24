<?php
session_start();
include "connection.php";

if (isset($_POST['pickup_location']) && isset($_POST['dropoff_location']) && isset($_POST['pickup_time'])) {
    $name = $_SESSION['name'];
    $pickup_location = $_POST['pickup_location'];
    $dropoff_location = $_POST['dropoff_location'];
    $pickup_time = $_POST['pickup_time'];

    $sql = "INSERT INTO orders (name, pickup_location, dropoff_location, pickup_time, status) VALUES ('$name', '$pickup_location', '$dropoff_location', '$pickup_time', 'Menunggu')";
    if (mysqli_query($koneksi, $sql)) {
        header("location: pesan.php");
    } else {
        echo "Gagal melakukan pemesanan: " . mysqli_error($koneksi);
    }
} else {
    echo "Silakan isi form pemesanan.";
}

mysqli_close($koneksi);
?>
