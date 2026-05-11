<?php
session_start();
include '../koneksi.php';
if ($_SESSION['role'] != 'admin') { header("Location: ../index.php"); exit; }

$query = mysqli_query($conn, "SELECT * FROM artikel ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kelola Artikel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="dashboard-container">
    <div class="sidebar">
        <h2>WORKOUT <span>HOME</span></h2>
        <a href="dashboard.php">Beranda</a>
        <a href="kel_user.php">Mengelola User</a>
        <a href="kel_program.php">Mengelola Program</a>
        <a href="kel_artikel.php" class="active">Mengelola Artikel</a>
        <a href="../logout.php" class="logout-btn">Logout</a>
    </div>

    <div class="main-content">
        <h1>Tambah Artikel</h1>
        <div class="box-form">
            <form action="tambah_artikel.php" method="POST">
                <label>Judul Artikel</label>
                <input type="text" name="judul" required>
                <label>Isi Artikel</label>
                <textarea name="isi" rows="5" required></textarea>
                <button type="submit">Publish</button>
            </form>
        </div>

        <h1>Daftar Artikel</h1>
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
                    <td><?php echo $row['judul']; ?></td>
                    <td>
                        <a href="hapus_artikel.php?id=<?php echo $row['id']; ?>" class="btn-remove" onclick="return confirm('Yakin hapus program ini?')">Hapus</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>