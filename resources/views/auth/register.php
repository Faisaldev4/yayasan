<?php
session_start();
require '../../../config/database.php'; // Pastikan Anda menghubungkan ke database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Cek apakah sudah ada admin yang terdaftar
    $stmt = $pdo->query("SELECT COUNT(*) FROM users WHERE role = 'admin'");
    $adminCount = $stmt->fetchColumn();

    if ($adminCount > 0) {
        // Jika sudah ada admin, semua pendaftaran baru akan menjadi user
        $role = 'user';
    } else {
        // Jika belum ada admin, maka pengguna yang mendaftar akan menjadi admin
        $role = 'admin';
    }

    // Cek apakah email sudah terdaftar
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->rowCount() > 0) {
        $_SESSION['error'] = "Email already registered.";
    } else {
        // Hash password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Simpan pengguna baru ke database
        $stmt = $pdo->prepare("INSERT INTO users (email, password, role) VALUES (?, ?, ?)");
        if ($stmt->execute([$email, $hashedPassword, $role])) {
            $_SESSION['success'] = "Registration successful. You can now log in.";
            header('Location: login.php');
            exit;
        } else {
            $_SESSION['error'] = "Registration failed. Please try again.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
        <link rel="stylesheet"
    href="../../views/layouts/layout_style/style_header.css">
        <link rel="stylesheet"
    href="../../views/layouts/layout_style/style-login-regis.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
</head>
<body>

    <?php include '../../../resources/views/layouts/header.php'; ?> <!-- Menyertakan navbar -->

<div class="container-regis">
        <h2>Register</h2>
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
            <div class="form-group">
                <label for="confirm_password">Konfirmasi Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>
            <button type="submit">Register</button>
        </form>
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>
</body>
</html>