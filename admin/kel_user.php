<?php
session_start();
include '../koneksi.php';
if ($_SESSION['role'] != 'admin') { header("Location: ../index.php"); exit; }

$query = mysqli_query($conn, "SELECT * FROM users WHERE role = 'user'");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kelola User - Admin</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="dashboard-container">
    <div class="sidebar">
        <h2>WORKOUT <span>HOME</span></h2>
        <a href="dashboard.php">Beranda</a>
        <a href="kel_user.php" class="active">Mengelola User</a>
        <a href="kel_program.php">Mengelola Program</a>
        <a href="kel_artikel.php">Mengelola Artikel</a>
        <a href="../logout.php" class="logout-btn">Logout</a>
    </div>

    <div class="main-content">
        <h1>Daftar Pengguna</h1>
        
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; while($row = mysqli_fetch_assoc($query)) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row['username']; ?></td>
                    <td><?= $row['role']; ?></td>
                    <td>
                        <a href="hapus_user.php?id=<?= $row['id']; ?>" class="btn-delete" onclick="return confirm('Hapus user ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>