<?php
session_start();
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($koneksi, $_POST['name']);
    $rating = intval($_POST['rating']);
    $comments = mysqli_real_escape_string($koneksi, $_POST['comments']);

    $sql = "INSERT INTO feedback (name, rating, comments) VALUES ('$name', $rating, '$comments')";

    if (mysqli_query($koneksi, $sql)) {
        echo "<script>alert('Feedback berhasil dikirim!'); window.location.href='feedback.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }

    mysqli_close($koneksi);
}
?>

