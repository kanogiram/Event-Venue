<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "venue_db");

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include "navbar.php"; ?>

<div class="container">
    <h1>Admin Dashboard</h1>

    <h2>All Bookings</h2>
