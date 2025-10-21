
<?php
include "config.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = md5($_POST['password']); // Gunakan md5 untuk contoh (lebih baik pakai password_hash)

    $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_username'] = $username;
    header("Location: dashboard.php");
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Admin</title>
    <style>
            body { font-family: Arial; background: #f4f4f4; }
            .login-box {
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
            .login-box h2 {
                text-align: center;
                margin-bottom: 8px;
                color: #333;
            }
            .login-form {
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
                border: 1.5px solid #4CAF50;
            }
            button {
                width: 100%;
                padding: 11px;
                background: #4CAF50;
                border: none;
                color: white;
                border-radius: 6px;
                font-size: 16px;
                cursor: pointer;
                margin-top: 12px;
                transition: background 0.2s;
            }
            button:hover { background: #45a049; }
            .error { color: red; text-align: center; margin-bottom: 0; }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Login Admin</h2>
        <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>
        <form method="post" class="login-form">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Masukkan username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Masukkan password" required>
            </div>
            <button type="submit" href="dashboard.php">Login</button>
        </form>
            <div style="text-align:center; margin-top:10px;">
                <a href="reset_password.php">Lupa Password?</a>
            </div>
    </div>
</body>
</html>
