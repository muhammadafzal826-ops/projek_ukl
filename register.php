<?php 
include 'koneksi.php'; 

$pesan = "";

if (isset($_POST['register'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];
    $confirm  = $_POST['confirm_password'];

    $cek_user = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
    
    if (mysqli_num_rows($cek_user) > 0) {
        $pesan = "Username sudah terdaftar!";
    } else {
        if ($password === $confirm) {

            $password_secure = password_hash($password, PASSWORD_DEFAULT);
            

            $query = "INSERT INTO users (username, password) VALUES ('$username', '$password_secure')";
            
            if (mysqli_query($conn, $query)) {
                echo "<script>alert('Registrasi Berhasil! Silakan Login.'); window.location='index.php';</script>";
            } else {
                $pesan = "Terjadi kesalahan sistem.";
            }
        } else {
            $pesan = "Konfirmasi password tidak cocok!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register - Workout Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h1 class="main-title">WORKOUT <span>HOME</span></h1>

        <form action="" method="POST" class="auth-card">
            <div class="card-header">
                <span class="dots">•••</span>
                <span class="title">Register</span>
            </div>
            <div class="card-body">
                <?php if($pesan != ""): ?>
                    <p style="color: #ff4e4e; font-size: 13px; margin-bottom: 10px; text-align: center;">
                        <?= $pesan; ?>
                    </p>
                <?php endif; ?>

                <label>Username</label>
                <input type="text" name="username" required placeholder="Pilih username">
                
                <label>Password</label>
                <input type="password" name="password" required placeholder="Buat password">

                <label>Konfirmasi Password</label>
                <input type="password" name="confirm_password" required placeholder="Ulangi password">
                
                <button type="submit" name="register" class="btn-primary">Daftar</button> <p class="footer-text">
                    Sudah punya akun? <a href="index.php">Login</a>
                </p>
            </div>
        </form>
    </div>

</body>
</html>