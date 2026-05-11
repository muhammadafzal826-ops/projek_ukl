<?php
session_start();
include '../koneksi.php';
if ($_SESSION['role'] != 'admin') { header("Location: ../index.php"); exit; }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="dashboard-container">
    <div class="sidebar">
        <h2>WORKOUT <span>HOME</span></h2>
        <a href="dashboard.php" class="active">Beranda</a>
        <a href="kel_user.php">Mengelola User</a>
        <a href="kel_program.php">Mengelola Program</a>
        <a href="kel_artikel.php">Mengelola Artikel</a>
        <a href="../logout.php" class="logout-btn">Logout</a>
    </div>

    <div class="main-content">
        <h1>Selamat Datang, Admin</h1>
        <div class="box-form">
            <p>Gunakan menu di samping untuk mengelola data website Workout Home.</p>
        </div>
    </div>
</div>

</body>
</html>