<?php
session_start();

if (isset($_POST['logout'])) {
    // Hapus sesi dan arahkan ke halaman login
    session_unset();
    session_destroy();
    header("location: login.php");
}

if (isset($_SESSION['username'])) {
    // Jika pengguna sudah login, tampilkan tombol "Log Out"
    echo '<form method="POST" action=""><input type="submit" name="logout" value="Log Out"></form>';
    header("location: logout.php");
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    require('connection.php');

    $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['username'] = $username;
        header("location: ../index.php");
    } else {
        $error = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style/loginstyle.css">
</head>
<body>
    <div class="login">
        <h2>Login</h2>
        <?php if (isset($error)) { echo $error; } ?>
        <form method="POST" action="">
            <div class="input-container">
                <input type="text" name="username" placeholder="Username" required><br>
                <input type="password" name="password" placeholder="Password" required><br>
            </div>
            <input type="submit" name="login" value="Login" class="login-button">
        </form>


    <p>Belum punya akun? <a href="register.php">Register</a></p>
    </div>
</body>
</html>
