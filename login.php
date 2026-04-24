<?php
// BEGIN Member 2: Delfina Kukaj

session_start();

/* DATABASE CONNECTION */
$conn = mysqli_connect("localhost", "root", "", "venue_db");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['login'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    $user = mysqli_fetch_assoc($result);

    if (!$user) {
        $_SESSION['error'] = "Email not registered. Please sign up.";
        header("Location: login.php");
        exit();
    }

    if (!password_verify($password, $user['password'])) {
        $_SESSION['error'] = "Incorrect password.";
        header("Location: login.php");
        exit();
    }

    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_name'] = $user['name'];

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="form-container">
        <h2>Login</h2>

        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert-box">
                <?= $_SESSION['error'];
                unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>

        <form method="POST">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="login" class="btn primary-btn">Login</button>
        </form>

        <p>Don't have an account? <a href="register.php">Register</a></p>
    </div>

</body>
<!--END Member 2: Delfina Kukaj-->

</html>
