<?php
session_start();
include '../koneksi.php';
$query = mysqli_query($conn, "SELECT * FROM artikel ORDER BY tanggal DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Baca Artikel</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<div class="dashboard-container">
    <div class="sidebar">
        <h1 class="side-logo">WORKOUT <span>HOME</span></h1>
        <div class="menu">
            <a href="beranda.php">Beranda</a>
            <a href="tambah.php">Catat Latihan</a>
            <a href="riwayat.php">Riwayat Saya</a>
            <a href="baca_artikel.php" class="active">Tips Kesehatan</a>
            <a href="program_latihan.php">Program Coach</a>
            <a href="../logout.php">Logout</a>
        </div>
    </div>

    <div class="main-content">
        <h1>Tips Kesehatan</h1>
        
        <div class="artikel-list">
            <?php while($row = mysqli_fetch_assoc($query)) : ?>
            <div class="box-artikel">
                <small><?= $row['tanggal']; ?></small>
                <h3><?= $row['judul']; ?></h3>
                <p><?= nl2br($row['isi']); ?></p>
            </div>
            <?php endwhile; ?>
        </div>
    </div>

</div>

</body>
</html>