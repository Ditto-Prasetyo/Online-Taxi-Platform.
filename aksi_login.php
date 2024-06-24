<?php
session_start();
include "connection.php";

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $op = $_GET['op'] ?? '';

    if ($op === "in") {
        // Query untuk customer
        $sql_customer = "SELECT * FROM registrasi_customer WHERE email = '$email' AND password = '$password'";
        $result_customer = mysqli_query($koneksi, $sql_customer);

        // Query untuk admin
        $sql_admin = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
        $result_admin = mysqli_query($koneksi, $sql_admin);

        if (mysqli_num_rows($result_customer) > 0) {
            // Jika user adalah customer
            $row_customer = mysqli_fetch_assoc($result_customer);
            $_SESSION['id_customer'] = $row_customer['id_customer'];
            $_SESSION['name'] = $row_customer['name'];
            $_SESSION['email'] = $row_customer['email'];
            $_SESSION['number'] = $row_customer['number'];
            $_SESSION['address'] = $row_customer['address'];
            $_SESSION['asalkota'] = $row_customer['asalkota'];
            $_SESSION['postalcode'] = $row_customer['postalcode'];
            $_SESSION['role'] = "customer";
            $_SESSION['authenticated'] = true;

            // Redirect ke halaman home customer
            header('location: home_cus.php');

        } elseif (mysqli_num_rows($result_admin) > 0) {
            // Jika user adalah admin
            $row_admin = mysqli_fetch_assoc($result_admin);
            $_SESSION['id_admin'] = $row_admin['id_admin'];
            $_SESSION['name'] = $row_admin['name'];
            $_SESSION['email'] = $row_admin['email'];
            $_SESSION['number'] = $row_admin['number'];
            $_SESSION['asalkota'] = $row_admin['asalkota'];
            $_SESSION['role'] = "admin";
            $_SESSION['role_tugas'] = $row_admin['role_tugas'];
            $_SESSION['authenticated'] = true;

            // Redirect ke halaman home admin
            header('location: admin.php');

        } else {
            // Jika kredensial salah
            echo "<script>alert('Email atau password salah!'); window.location.href='login.php';</script>";
        }

    } elseif ($op === "out") {
        // Proses logout
        session_unset();
        session_destroy();
        echo "<script>alert('Anda telah logout! Silakan login kembali.'); window.location.href='login.php';</script>";
        exit;
    }
} else {
    // Jika form login tidak diisi
    // echo "<script>alert('Silakan isi form login!'); window.location.href='login.php';</script>";
}
?>