<?php
session_start();
include '../koneksi.php';
if ($_SESSION['role'] != 'admin') { header("Location: ../index.php");exit;}

$query = mysqli_query($conn, "SELECT * FROM program_latihan ");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kelola Program</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="dashboard-container">
    <div class="sidebar">
        <h2>WORKOUT <span>HOME</span></h2>
        <a href="dashboard.php">Beranda</a>
        <a href="kel_user.php">Mengelola User</a>
        <a href="kel_program.php" class="active">Mengelola Program</a>
        <a href="kel_artikel.php">Mengelola Artikel</a>
        <a href="../logout.php" class="logout-btn">Logout</a>
    </div>

    <div class="main-content">
        <h1>Tambah Program Baru</h1>
        <div class="box-form">
            <form action="proses_tambah_program.php" method="POST">
                <label>Judul Program</label>
                <input type="text" name="judul_program" required>
                
                <label>Deskripsi Program</label>
                <textarea name="deskripsi" rows="5" required></textarea>
                
                <button type="submit">Simpan Program</button>
            </form>
        </div>

        <h1>Daftar Program</h1>
        <table>
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($query)) { ?>
                <tr>
                    <td><?php echo $row['judul_program']; ?></td>
                    <td>
                        <a href="hapus.php?id=<?php echo $row['id_program']; ?>" class="btn-remove" onclick="return confirm('Yakin hapus program ini?')">Hapus</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>