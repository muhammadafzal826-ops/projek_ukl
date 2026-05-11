<?php 
include '../koneksi.php'; 

if (isset($_POST['simpan'])) {
    $user_id = $_SESSION['user_id'];
    $nama = mysqli_real_escape_string($conn, $_POST['nama_aktivitas']);
    $repetisi = $_POST['repetisi'];
    $tanggal = $_POST['tanggal'];

    $query = "INSERT INTO workouts (user_id, nama_aktivitas, repetisi, tanggal) VALUES ('$user_id', '$nama', '$repetisi', $tanggal)";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Aktivitas Berhasil Dicatat!'); window.location='riwayat.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Aktivitas - Workout Home</title>
    <link rel="stylesheet" href="../style.css">
</head>
<div class="dashboard-container">
    <div class="sidebar">
        <h1 class="side-logo">WORKOUT <span>HOME</span></h1>
        <nav class="menu">
            <a href="beranda.php">Beranda</a>
            <a href="tambah.php" class="active">Catat Latihan</a>
            <a href="riwayat.php">Riwayat Saya</a>
            <a href="baca_artikel.php">Tips Kesehatan</a>
            <a href="program_latihan.php">Program Coach</a>
            <a href="../logout.php" class="logout-btn">Logout</a>
        </nav>
    </div>

    <main class="main-content">
        <div class="auth-card">
            <form action="" method="POST" class="card-body">
                <label>Jenis Olahraga</label>
                <input type="text" name="nama_aktivitas" placeholder="Contoh: Push Up, Pull up, Squat, Sit Up" required>
                
                <label>Jumlah Repetisi</label>
                <input type="number" name="repetisi" placeholder="Masukkan jumlah (misal: 15)" required>
                
                <label>Tanggal</label>
                <input type="date" name="tanggal" placeholder="Masukkan tanggal" required>
                

                <button type="submit" name="simpan" class="btn-primary">SIMPAN AKTIVITAS</button>
            </form>
        </div>
    </main>
</div>
</html>