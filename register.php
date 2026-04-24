<?php
// BEGIN Member 2: Delfina Kukaj 

session_start();

/* DATABASE CONNECTION */
$conn = mysqli_connect("localhost", "root", "", "venue_db");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['register'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // check if email exists
    $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");

    if (mysqli_num_rows($check) > 0) {
        $_SESSION['error'] = "Email already exists. Please login.";
        header("Location: register.php");
        exit();
    }

    $sql = "INSERT INTO users (name, email, password)
            VALUES ('$name', '$email', '$password')";

    if (mysqli_query($conn, $sql)) {

        // Fetch the newly created user to get their ID
        $newUser = mysqli_fetch_assoc(mysqli_query($conn, "SELECT id FROM users WHERE email='$email'"));
        $_SESSION['user_id'] = $newUser['id'];
        $_SESSION['user_name'] = $name;
        $_SESSION['success'] = "Registered successfully! Welcome $name";

        header("Location: index.php");
        exit();
    } else {
        $_SESSION['error'] = "Registration failed.";
        header("Location: register.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="form-container">
        <h2>Create Account</h2>

        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert-box">
                <?= $_SESSION['error'];
                unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>

        <form method="POST">
            <input type="text" name="name" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="register" class="btn primary-btn">Register</button>
        </form>

        <p>Already have an account? <a href="login.php">Login</a></p>
    </div>

</body>
<!--END Member 2: Delfina Kukaj-->

</html>
