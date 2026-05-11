<?php 
include '../koneksi.php';

$user_id = $_SESSION['user_id'];
$query = mysqli_query($conn, "SELECT * FROM users WHERE id = '$user_id'");
$u = mysqli_fetch_assoc($query);
?>

<?php
$id_user = $_SESSION['user_id'];
echo "ID Kamu: " . $id_user;

function hitungTotal($conn, $id_user, $jenis) {
    $sql = "SELECT SUM(jumlah) as total FROM latihan WHERE id_user = '$id_user' AND jenis_latihan = '$jenis'";
    $res = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($res);
    return $data['total'] ?? 0;
}

$total_pushup = hitungTotal($conn, $id_user, 'push_up');
$total_situp  = hitungTotal($conn, $id_user, 'sit_up');
$total_pullup = hitungTotal($conn, $id_user, 'pull_up');
$total_squat  = hitungTotal($conn, $id_user, 'squat');
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Workout Home</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div class="dashboard-container">
        <div class="sidebar">
            <h1 class="side-logo">WORKOUT <span>HOME</span></h1>
            <nav class="menu">
                <a href="beranda.php" class="active">Beranda</a>
                <a href="tambah.php">Catat Latihan</a>
                <a href="riwayat.php">Riwayat Saya</a>
                <a href="baca_artikel.php">Tips Kesehatan</a>
                <a href="program_latihan.php">Program Coach</a>
                <a href="../logout.php" class="logout-btn">Logout</a>
            </nav>
        </div>

        <div class="content-wrapper">
   <div class="stats-side-grid">
        <div class="card-workout pushup">
            <h4>Push Up</h4>
            <p><?php echo $total_pushup; ?> <span>reps</span></p>
        </div>
        <div class="card-workout situp">
            <h4>Sit Up</h4>
            <p><?php echo $total_situp; ?> <span>reps</span></p>
        </div>
        <div class="card-workout pullup">
            <h4>Pull Up</h4>
            <p><?php echo $total_pullup; ?> <span>reps</span></p>
        </div>
        <div class="card-workout squat">
            <h4>Squat</h4>
            <p><?php echo $total_squat; ?> <span>reps</span></p>
        </div>
    </div>
</div>

        <main class="main-content">
            <img src="karakter.png" alt="Character" class="character-img">
        </main>
    </div>
</body>
</html>
