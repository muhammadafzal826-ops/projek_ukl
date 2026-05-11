<?php
session_start();
include '../koneksi.php';
if ($_SESSION['role'] != 'user') { header("Location: ../index.php"); exit; }

$query = mysqli_query($conn, "SELECT * FROM program_latihan");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Program Coach - Workout Home</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<div class="dashboard-container">
    <div class="sidebar">
        <h1 class="side-logo">WORKOUT <span>HOME</span></h1>
        <nav class="menu">
        <a href="beranda.php">Beranda</a>
        <a href="tambah.php">Catat Latihan</a>
        <a href="riwayat.php">Riwayat Saya</a>
        <a href="baca_artikel.php">Tips Kesehatan</a>
        <a href="program_latihan.php" class="active">Program Coach</a>
        <a href="../logout.php" class="logout-btn">Logout</a>
    </div>

    <div class="main-content">
    <h1>Program Latihan dari Coach</h1>
    <p>Pilih program yang sesuai dengan tujuanmu hari ini!</p>

    <div class="table-container">
        <table class="program-table">
            <thead>
                <tr>
                    <th>Judul Program</th>
                    <th>Deskripsi Latihan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($query)) : ?>
                <tr>
                    <td class="judul-col"><?= $row['judul_program']; ?></td>
                    <td class="deskripsi-col"><?= nl2br($row['deskripsi']); ?></td>
                    <td class="aksi-col">
                        <a href="tambah.php?pesan=mengikuti&nama=<?= urlencode($row['judul_program']); ?>" class="btn-ikut-table">
                            Mulai Latihan
                        </a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
</div>

</body>
</html>