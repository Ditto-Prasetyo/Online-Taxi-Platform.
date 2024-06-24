<?php
session_start();

if ($_SESSION['role'] === "admin" && $_SESSION['role_tugas'] === "Bagian_User") {
    header("location: home.php");
} else if ($_SESSION['role'] === "admin" && $_SESSION['role_tugas'] === "Bagian_taksi") {
    header("location: home2.php");
} else if ($_SESSION['role'] === "admin" && $_SESSION['role_tugas'] === "Bagian_order") {
    header("location: home1.php");
} else if ($_SESSION['role'] === "admin" && $_SESSION['role_tugas'] === "Bagian_atur_taksi") {
    header("location: home3.php");
} else if ($_SESSION['role'] === "admin" && $_SESSION['role_tugas'] === "Bagian_atur_feedback") {
    header('location: home4.php');
}
?>