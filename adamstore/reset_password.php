<?php
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if ($new_password !== $confirm_password) {
        $error = "Password baru dan konfirmasi tidak sama!";
    } else {
        $password_hashed = md5($new_password); // Lebih baik gunakan password_hash di produksi
        $sql = "UPDATE admin SET password='$password_hashed' WHERE username='$username'";
        if ($conn->query($sql) === TRUE) {
            $success = "Password berhasil direset. Silakan login.";
        } else {
            $error = "Gagal mereset password. Username tidak ditemukan.";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Reset Password Admin</title>
    <style>
        body { font-family: Arial; background: #f4f4f4; }
        .reset-box {
            width: 340px;
            padding: 32px 24px 24px 24px;
            background: #f9fafb;
            margin: 80px auto;
            border-radius: 14px;
            box-shadow: 0 2px 18px rgba(0,0,0,0.10);
            display: flex;
            flex-direction: column;
            gap: 18px;
        }
        .reset-box h2 {
            text-align: center;
            margin-bottom: 8px;
            color: #333;
        }
        .reset-form {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }
        .form-group {
            display: flex;
            flex-direction: column;
            gap: 3px;
        }
        label {
            font-size: 14px;
            color: #444;
            margin-bottom: 2px;
        }
        input {
            width: 100%;
            padding: 12px 14px;
            border: 1.5px solid #e0e0e0;
            border-radius: 14px;
            font-size: 15px;
            background: #fff;
            margin: 0;
            box-sizing: border-box;
            box-shadow: none;
            outline: none;
            transition: border 0.2s;
        }
        input:focus {
            border: 1.5px solid #2196F3;
        }
        button {
            width: 100%;
            padding: 11px;
            background: #2196F3;
            border: none;
            color: white;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 12px;
            transition: background 0.2s;
        }
        button:hover { background: #1976D2; }
        .error { color: red; text-align: center; margin-bottom: 0; }
        .success { color: green; text-align: center; margin-bottom: 0; }
    </style>
</head>
<body>
    <div class="reset-box">
        <h2>Reset Password Admin</h2>
        <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>
        <?php if(isset($success)) echo "<p class='success'>$success</p>"; ?>
        <form method="post" class="reset-form">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Masukkan username" required>
            </div>
            <div class="form-group">
                <label for="new_password">Password Baru</label>
                <input type="password" id="new_password" name="new_password" placeholder="Password baru" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Konfirmasi Password</label>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Konfirmasi password" required>
            </div>
            <button type="submit">Reset Password</button>
        </form>
        <div style="text-align:center; margin-top:10px;">
            <a href="admin.php">Kembali ke Login</a>
        </div>
    </div>
</body>
</html>
