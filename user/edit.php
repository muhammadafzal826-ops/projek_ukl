<?php 
session_start();
include '../koneksi.php'; 

if (!isset($_SESSION['login'])) { header("Location: ../index.php"); exit; }


$id = $_GET['id'];


$result = mysqli_query($conn, "SELECT * FROM workouts WHERE id = '$id'");
$data = mysqli_fetch_assoc($result);


if (isset($_POST['update'])) {
    $nama_aktivitas = $_POST['nama_aktivitas'];
    $repetisi = $_POST['repetisi'];

    $sql = "UPDATE workouts SET nama_aktivitas = '$nama_aktivitas', repetisi = '$repetisi' WHERE id = '$id'";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        echo "<script>alert('Data berhasil diperbarui!'); window.location='riwayat.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data!');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Aktivitas</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="dashboard-container">
        <aside class="sidebar">
            <h1 class="side-logo">WORKOUT <span>HOME</span></h1>
            <nav class="menu">
                <a href="beranda.php">Beranda</a>
                <a href="tambah.php">Catat Latihan</a>
                <a href="riwayat.php">Riwayat Saya</a>
                <a href="baca_artikel.php">Tips Kesehatan</a>
                <a href="program_latihan.php">Program Coach</a>
                <a href="../logout.php" class="logout-btn">Logout</a>
            </nav>
        </aside>

        <main class="main-content">
            <div class="auth-card">
                <div class="card-header">
                    <span class="dots">•••</span>
                    <span class="title">EDIT AKTIVITAS</span>
                </div>
                <form action="" method="POST" class="card-body">
                    <div class="input-group">
                        <label>Jenis Olahraga</label>
                        <input type="text" name="nama_aktivitas" value="<?= $data['nama_aktivitas']; ?>" required>
                    </div>
                    
                    <div class="input-group">
                        <label>Jumlah Repetisi</label>
                        <input type="number" name="repetisi" value="<?= $data['repetisi']; ?>" required>
                    </div>
                    
                    <button type="submit" name="update" class="btn-primary">UPDATE DATA</button>
                    <a href="riwayat.php" style="color: #ccc; text-align: center; margin-top: 15px; text-decoration: none; font-size: 0.8rem;">Batal</a>
                </form>
            </div>
            
            <img src="../karakter.png" class="character-img" style="opacity: 0.1; right: 5%;">
        </main>
    </div>
</body>
</html>