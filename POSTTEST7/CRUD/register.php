<?php
session_start();

if (isset($_SESSION['username'])) {
    header("location: register.php");
}

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    require('connection.php');

    $query = "INSERT INTO user (username, password, email) VALUES ('$username', '$password', '$email')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $_SESSION['username'] = $username;
        header("location: login.php");
    } else {
        $error = "Registration failed!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="style/registerstyle.css">
</head>
<body>
    <div class="register">
        <h2>Register</h2>
        <?php if (isset($error)) { echo $error; } ?>
        <form method="POST" action="">
            <div class="input-container">
                <input type="text" name="username" placeholder="Username" required class="input-field"><br>
                <input type="password" name="password" placeholder="Password" required class="input-field"><br>
                <input type="email" name="email" placeholder="Email" required class="input-field"><br>
            </div>
            <input type="submit" name="register" value="Register" class="register-button">
        </form>

        <p>Sudah punya akun? <a href="login.php">Login</a></p>
    </div>
</body>
</html>
