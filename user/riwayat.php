<?php 
session_start();
include '../koneksi.php'; 

if (!isset($_SESSION['login'])) { 
    header("Location: ../index.php"); 
    exit; 
}

$user_id = $_SESSION['user_id'];

$query = mysqli_query($conn, "SELECT * FROM workouts WHERE user_id = '$user_id' ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Riwayat Aktivitas</title>
    <link rel="stylesheet" href="../style.css">

</head>
<body>
    <div class="dashboard-container">
        <div class="sidebar">
            <h1 class="side-logo">WORKOUT <span>HOME</span></h1>
            <nav class="menu">
                <a href="beranda.php">Beranda</a>
                <a href="tambah.php">Catat Latihan</a>
                <a href="riwayat.php" class="active">Riwayat Saya</a>
                <a href="baca_artikel.php">Tips Kesehatan</a>
                <a href="program_latihan.php">Program Coach</a>
                <a href="../logout.php" class="logout-btn">Logout</a>
            </nav>
        </div>

        <main class="main-content">
            <div class="table-container">
                <h2>RIWAYAT LATIHAN</h2>
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Aktivitas</th>
                            <th>Repetisi</th>
                            <th>Tanggal</th>
                            <th>Aksi</th> </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        while($row = mysqli_fetch_assoc($query)) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row['nama_aktivitas']; ?></td>
                            <td><?= $row['repetisi']; ?> Reps</td>
                            <td><?= $row['tanggal']; ?></td>

                            <td>
                                <a href="edit.php?id=<?= $row['id']; ?>" class="btn-edit">Edit</a>
                                <a href="hapus.php?id=<?= $row['id']; ?>" class="btn-delete" onclick="return confirm('Yakin ingin menghapus aktivitas ini?')">Hapus</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>