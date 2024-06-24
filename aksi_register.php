<?php
session_start();
include "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name']; 
    $password = $_POST['password']; 
    $email = $_POST['email'];
    $number = $_POST['number'];
    $address = $_POST['address'];
    $asalkota = $_POST['asalkota'];
    $postalcode = rand(1000, 9999);


// Hash the password before storing it in the database

$check_email_sql = "SELECT id_customer FROM registrasi_customer WHERE email = ?";
$check_email_stmt = $koneksi->prepare($check_email_sql);
$check_email_stmt->bind_param("s", $email);
$check_email_stmt->execute();
$check_email_stmt->store_result();

if ($check_email_stmt->num_rows > 0) {
    echo "Email sudah terdaftar.";
    $check_email_stmt->close();
    $koneksi->close();
    exit();
}
$check_email_stmt->close();

$sql = "INSERT INTO registrasi_customer (name, password, email, number, address, asalkota, postalcode) VALUES ('$name', '$password', '$email', '$number', '$address','$asalkota', '$postalcode')";
    $s = $koneksi->query($sql);
    if ($s) {
        echo "<script>alert('Anda berhasil registrasi!'); window.location.href='login.php';</script>";
    } else {
        echo "<script>alert('Ulangi Kembalii!');</script>" . mysqli_error($koneksi);
    }
} else {
    // Form registrasi belum diisi
    echo "Silakan isi form registrasi.";
    header("Location register.php");
}

mysqli_close($koneksi);