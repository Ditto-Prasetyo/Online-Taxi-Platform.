<?php
$host = "localhost"; // untuk host
$username = "root"; // untuk username
$password = ""; // untuk password
$database = "rpl"; // untuk nama database

$koneksi = mysqli_connect($host, $username, $password, $database);

if (!$koneksi) {
    echo "Server not connected";
}
?>