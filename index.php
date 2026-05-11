<?php include 'koneksi.php'; 
        if (isset($_POST['login'])) {
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $password = $_POST['password'];

            $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
            
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
                if (password_verify($password, $row['password'])) {
                    $_SESSION['login'] = true;
                    $_SESSION['user_id'] = $row['id'];
                    $_SESSION['role'] = $row['role'];
                    $_SESSION['username'] = $row['username'];

                    if ($row['role'] == 'admin') {
                        header("Location: admin/dashboard.php");
                    } else {
                        header("Location: user/beranda.php");
                    }
                    exit;
                }
            }
            $error = true;
        }
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Workout Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h1 class="main-title">WORKOUT <span>HOME</span></h1>
        <form action="" method="POST" class="auth-card">
            <div class="card-header">
                <span class="title">Login</span>
            </div>
            <div class="card-body">                
                <label>Username</label>
                <input type="text" name="username" placeholder="Masukkan username" required>
                
                <label>Password</label>
                <input type="password" name="password" placeholder="••••••" required>
                
                <button type="submit" name="login" class="btn-primary">Mulai</button>

                <?php if(isset($error)): ?>
                    <p style="color: #ff4e4e; font-size: 12px; margin-bottom: 10px; text-align: center; font-weight: bold;">
                        Username/Password Salah!
                    </p>
                <?php endif; ?>

                <p class="footer-text">
                    Belum punya akun? <a href="register.php">Register</a>
                </p>
            </div>
        </form>
    </div>

</body>
</html>