<?php
session_start();
require '../../../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role']; // Simpan peran pengguna di session

        // Arahkan berdasarkan peran
        if ($user['role'] === 'admin') {
            header('Location: admin/admin_dashboard.php'); // Halaman admin
        } else {
            header('Location: user/user_dashboard.php'); // Halaman pengguna
        }
        exit;
    } else {
        $_SESSION['error'] = "Invalid email or password.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      

           <link rel="stylesheet"
    href="../../views/layouts/layout_style/style_header.css">
    
        <link rel="stylesheet"
    href="../../views/layouts/layout_style/style-login-regis.css">
    <title>Login</title>
</head>
<body>
    <?php include '../../../resources/views/layouts/header.php'; ?> <!--
    Menyertakan navbar -->
    <div class="container-login">
        <h2>Login</h2>
        <?php if ($errorMessage): ?>
            <div class="error"><?= htmlspecialchars($errorMessage); ?></div>
        <?php endif; ?>
        <form method="POST" action="">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit">Login</button>
        </form>
        <div class="register-link">
            <p>Belum punya akun? <a href="register.php">Registrasi di sini</a></p>
        </div>
    </div>
</body>
</html>

