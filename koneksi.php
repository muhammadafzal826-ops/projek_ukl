<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "workout_home_db";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>